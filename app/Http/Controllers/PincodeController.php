<?php

namespace App\Http\Controllers;
use App\Models\Pincode;
use Illuminate\Support\Facades\DB;

class PincodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        $pin_data = Pincode::cursorPaginate(10);
        return view('home', compact('pin_data'));
    }

    //
}
