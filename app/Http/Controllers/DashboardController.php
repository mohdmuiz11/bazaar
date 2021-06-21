<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::user()->hasRole('customer')) {
            return view('customerdash');
        }
        else if (Auth::user()->hasRole('supplier')) {
            return view('supplierdash');
        }
        else if (Auth::user()->hasRole('admin')) {
            return view('admindashboard');
        }
    }

    public function orders() {
        return view('customer.orders');
    }

    // not using this anymore
    // public function inventory() {
    //     return view('supplier.inventory');
    // }

    public function categoryindex(){
        return view('admin.index');
    }


}
