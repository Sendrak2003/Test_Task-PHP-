<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class createVacationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @throws ValidationException
     */
    public function validate(array $data): array
    {
        $validator = Validator::make($data, [
            'start_date' => [
                'required',
                'date',
                'after_or_equal:' . Carbon::now()->format('Y-m-d'),
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
        ]);

        return $validator->validate();
    }

}
