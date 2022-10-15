<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('get')) return [];

        return [
            "first_name"        => "required|max:200|string",
            "last_name"         => "required|max:200|string",
            "email"             => "required|email",
            "phonenumber"       => "required|max:15|string",
            "company"           => "required|max:200|string",
            "gender"            => "required|integer|max:1",
            "credit_method"     => "required|integer|max:3",
            "card_number"       => "required|max:20|string",
            "expiration_date"   => "required|max:2",
            "expiration_year"   => "required|max:4",
            "cvn"               => "required|max:3",
            "amount"            => "required",
            "haha"            => "required",
        ];
    }

    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return new JsonResponse($errors, 422);
        }
    }
}
