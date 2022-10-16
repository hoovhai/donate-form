<?php

namespace App\Repositories;

use App\Models\Donate;
use App\Services\DonateService;
use App\Contracts\DonateContract;

class DonateRepository implements DonateContract
{
    public function donate($request)
    {
        $inputs = DonateService::getInput($request);

        if (Donate::create($inputs)) {
            return response()->json(['status' => 200]);
        };

        return response()->json(['status' => 404]);
    }
}
