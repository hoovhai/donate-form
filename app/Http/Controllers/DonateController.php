<?php

namespace App\Http\Controllers;

use App\Contracts\DonateContract;
use App\Http\Requests\DonateRequest;

class DonateController extends Controller
{
    public function __construct(DonateContract $repo)
    {
        $this->repo = $repo;
    }

    public function donate(DonateRequest $request)
    {
        try {
            return $this->repo->donate($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
