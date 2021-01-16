<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationCodesController extends Controller
{
    public function store()
    {
        return response()->json(['test-message' => 'store verification code']);
    }
}
