<?php

namespace App\Http\Controllers;

use App\Models\ecomm_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EcommUserController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function ecomm_add_member(Request $request)
{
    // Validate input data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone_number' => 'required|string',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Check if phone number already exists
    $existingUser = User::where('phone_number', $validatedData['phone_number'])->first();
    if ($existingUser) {
        return redirect()->back()->withInput()->with('error', 'Mobile number you entered already have an account. Please enter another mobile number');
    }

    // Create the user
    $login = new User();
    $login->phone_number = $validatedData['phone_number'];
    $login->password = Hash::make($validatedData['password']);
    $login->role = "member";
    $login->save();

    // Create the ecomm_user
    $ecomm_member = new ecomm_user();
    $ecomm_member->first_name = $validatedData['first_name'];
    $ecomm_member->last_name = $validatedData['last_name'];
    $ecomm_member->phone_number = $validatedData['phone_number'];
    $ecomm_member->user_id = $login->id;
    $ecomm_member->save();

    return redirect()->back()->with('success', 'Account created successfully!');
}


    public function ecomm_update(Request $request){

    $ecomm_member = ecomm_user::find(auth()->guard('webmember')->user()->id);

    if ($request->hasFile('profile_picture')) {
        //store main image
        $profile_picture = $request->file('profile_picture');
        $originalName_profile_picture = $profile_picture->getClientOriginalName();
        $extension_profile_picture = $profile_picture->getClientOriginalExtension();
        $filename_profile_picture = $this->generateUniqueFilename($originalName_profile_picture, $extension_profile_picture);
        $imgpath_profile_picture = $profile_picture->storeAs('images', $filename_profile_picture, 'public');
        $ecomm_member->profile_picture = $imgpath_profile_picture;
    }

    $ecomm_member->first_name = $request->input('first_name');
    $ecomm_member->last_name = $request->input('last_name');
    //$ecomm_member->country = $request->input('country');
    $ecomm_member->phone_number = $request->input('phone_number');
    //$ecomm_member->whatsapp_number = $request->input('whatsapp_number');
    //$ecomm_member->address = $request->input('address');

    $ecomm_member->update();
    return redirect()->back()->with('status','User Updated Successfully');
}

    private function generateUniqueFilename($originalName, $extension)
    {
        // You can use various strategies here to generate a unique filename
        // For example, appending a timestamp or a random string to the original name.
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $filename = String::slug($filename); // Convert to a URL-friendly slug
        $filename = $filename . '_' . time() . '.' . $extension;

        return $filename;
    }

    public function edit(ecomm_user $ecomm_user)
    {
        
    }


    public function update(Request $request, ecomm_user $ecomm_user)
    {
        
    }


    public function destroy(ecomm_user $ecomm_user)
    {
        
    }


}
