<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;

class AdminController extends Controller
{
    // Fetch and display today, yesterday, this month, this year orders

    public function index(){
        // get today's orders
        $todayOrders = Order::whereDay('created_at', Carbon::today())->get();
        $yesterdayOrders = Order::whereDay('created_at', Carbon::yesterday())->get();
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->month)->get();
        $yearsOrders = Order::whereYear('created_at', Carbon::now()->year)->get();

        return view('admin.index')->with([
            'todaysOrders' => $todayOrders,
            'yesterdayOrders' => $yesterdayOrders,
            'monthOrders' => $monthOrders,
            'yearsOrders'  => $yearsOrders


        ]);
    }

    // Display the login form
    public function login(){
        if(!auth()->guard('admin')->check()){
            return view('admin.login');
        }
        return redirect->route('admin.index');
    }

    // Auth the admin
    public function auth(AuthAdminRequest $request){
        if($request->validated()){

            if(auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])){

                $request->session()->regenerate();
                return redirect->route('admin.index');

            }else{
                return redirect->route('admin.login')->with([
                    'error' => 'These credentials do not match our records'
                ]);

            }
        }
    }

    // Logout the admin
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect->route('admin.index');

    }

}

