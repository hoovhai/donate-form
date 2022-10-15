<?php

namespace App\Http\Controllers;

use App\Contracts\AccountContract;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    public function __construct(AccountContract $repo)
    {
        $this->repo = $repo;
    }

    public function donate(AccountRequest $request)
    {
        try {
            return $this->repo->donate($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
