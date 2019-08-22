<?php

namespace App\Http\Controllers;

use App\Models\Kitchen_model;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){


        $kitchens = Kitchen_model::with('kitchenParams','colors','parametersModels','modules','types')->get();
        return view('layouts.front.site', compact('kitchens'));
    }
}
