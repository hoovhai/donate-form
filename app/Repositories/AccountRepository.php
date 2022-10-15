<?php

namespace App\Repositories;

use App\Models\Donate;
use App\Services\AccountService;
use App\Contracts\AccountContract;

class AccountRepository implements AccountContract
{
    public function donate($request)
    {
        if ($request->isMethod('get')) {
            return view('accounts.registration');
        }

        $inputs = AccountService::getInput($request);

        if (Donate::create($inputs)) {
            return response()->json(['status' => 200]);
        };

        return response()->json(['status' => 404]);
    }
}
