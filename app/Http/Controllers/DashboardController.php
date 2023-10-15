<?php

namespace App\Http\Controllers;

use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class DashboardController extends Controller {

    public function index(Request $request) {

        $CodeBasket=UserCode::where(['user_id'=>Auth::id()]);
        return view('pages.dashboard',compact('CodeBasket'));
        
    }


}   