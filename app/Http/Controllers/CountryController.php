<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Country::all());
    }
}
