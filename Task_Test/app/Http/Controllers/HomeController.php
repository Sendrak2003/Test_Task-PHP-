<?php

namespace App\Http\Controllers;

use App\Http\Requests\createVacationRequest;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    private bool $isAdmin=false;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('auth/login');
    }
    public function createVacation()
    {

        $user = Auth::user();
        $isAdmin=$user->is_admin;
        if ($isAdmin)
        {
            return view("admin/createVacation");
        }
        return view("user/createVacation");

    }

    /**
     * @throws ValidationException
     */
    public function createVacationsSubmitAdmin(Request $request, createVacationRequest $validator)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $validatedData = $validator->validate($data);
        $user = Auth::user();
        $vacation = new Vacation;
        $vacation->user_id = $user->id;
        $vacation->start_date = $request->input('start_date');
        $vacation->end_date = $request->input('end_date');
        $vacation->is_valid =  (bool)$request->input('is_valid');
        $vacation->save();
        if ($this->isAdmin)
        {
            return redirect()->route('admin/home');
        }
        return redirect()->route('home');
    }
    public function index()
    {
        $user = Auth::user();
        $isAdmin=$user->is_admin;
        if ($isAdmin)
        {

            $vacations = Vacation::all();

            return view('admin/home', compact('vacations'));
        }
        $vacations = Vacation::select('id','start_date', 'end_date')->where('user_id', $user->id)->get();
        return view('user/home',  compact('vacations'));
    }
    public function edit($id)
    {
        $vacation = Vacation::find($id);
        $user = Auth::user();
        $isAdmin=$user->is_admin;
        if ($isAdmin)
        {
            return view('admin/editVacation', compact('vacation'));
        }
        return view('user/editVacation', compact('vacation'));
    }
    public function update(Request $request, $id,createVacationRequest $validator)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $validatedData = $validator->validate($data);
        $vacation = Vacation::find($id);
        $vacation->start_date = $request->input('start_date');
        $vacation->end_date = $request->input('end_date');
        $vacation->is_valid =  (bool)$request->input('is_valid');
        $vacation->save();
        if ($this->isAdmin)
        {
            return redirect()->route('admin/home');
        }
        return redirect()->route('home');
    }
}
