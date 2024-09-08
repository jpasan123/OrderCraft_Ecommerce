<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ecomm_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class EcommAdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */

    public function ecomm_admin_signup(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        // Check if phone number already exists
        $existingUser = ecomm_admin::where('phone_number', $validatedData['phone_number'])->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Mobile number you entered already have an account. Please enter another mobile number');
        }
    
        // Create the admin
        $login = new user();
        $login->phone_number = $validatedData['phone_number'];
        $login->password = Hash::make($validatedData['password']);
        $login->role = "admin";
        $login->save();
    
        // Create the ecomm_admin
        $ecomm_admin = new ecomm_admin();
        $ecomm_admin->first_name = $validatedData['first_name'];
        $ecomm_admin->last_name = $validatedData['last_name'];
        $ecomm_admin->phone_number = $validatedData['phone_number'];
        $ecomm_admin->user_id = $login->id;
        $ecomm_admin->save();
    
        return redirect()->back()->with('success', 'Account created successfully!');
    }

    // Add other methods as needed
}
