<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ecomm_user;
use App\Models\ecomm_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcommLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    function ecomm_authenticate(Request $request){
        $request->validate([
            'phone_number' => 'required',
            'password' => 'required'// Add other validation rules for your other fields here
        ]);
        $phone_number = $request->input('phone_number');
        $password = $request->input('password');

        if(Auth::attempt(['phone_number'=>$phone_number, 'password'=>$password])){
            $user = User::where('phone_number',$phone_number)->first();

            if($user->role=="member"){
                $ecomm_user = ecomm_user::where('phone_number',$phone_number)->first();
                Auth::guard('webmember')->login($ecomm_user);
                return redirect('/ecomm_member_index');
            }
            elseif($user->role=="admin"){
                $ecomm_user = ecomm_admin::where('phone_number',$phone_number)->first();
                Auth::guard('webadmin')->login($ecomm_user);
                return redirect('/ecomm_admin_dash');
            }

        } else{
            return redirect()->back()->with('error','Invalid username or Password');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('webmember')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Redirect to a desired route after logout
        return redirect('/ecomm_index');
    }
}
