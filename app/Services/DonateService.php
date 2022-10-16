<?php

namespace App\Services;

class DonateService
{
    public static function getInput($request)
    {
        return [
            "first_name"        => $request->first_name,
            "last_name"         => $request->last_name,
            "email"             => $request->email,
            "phonenumber"       => $request->phonenumber,
            "company"           => $request->company,
            "gender"            => $request->gender,
            "credit_method"     => $request->credit_method,
            "card_number"       => $request->card_number,
            "expiration_date"   => $request->expiration_date,
            "expiration_year"   => $request->expiration_year,
            "amount"            => $request->amount,
        ];
    }
}