<?php

namespace App\Http\Controllers;

use App\Models\web_profile1;
use Illuminate\Http\Request;

class WebProfile1Controller extends Controller
{
    function web_profile1()
    {
        return view('mainweb/template_ravi/web_profile1');
    }
    
    

    
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
    public function show(web_profile1 $web_profile1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(web_profile1 $web_profile1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, web_profile1 $web_profile1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(web_profile1 $web_profile1)
    {
        //
    }
}
