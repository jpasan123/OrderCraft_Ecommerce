<?php

namespace App\Http\Controllers;

use App\Models\ecomm_cart;
use App\Models\ecomm_additem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcommCartController extends Controller
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
    public function add_to_cart(Request $request, $id)
    {
        $cart = new ecomm_cart();
        $item = ecomm_additem::find($id);
        $cart->item_name = $item->item_name;
        $cart->price = $item->price;
        $cart->discount = $item->discount;
        $cart->quantity = $request->input('quantity');
        $cart->main_img = $item->main_img;
        $cart->description = $item->description;
        $cart->phone_number = auth()->guard('webmember')->user()->phone_number;
        $cart->user_id = $item->id;
        $cart->item_id = $item->id;

        $cart->save();

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function ecomm_cart_show()
    {

        $item = ecomm_cart::where('phone_number', auth()->guard('webmember')->user()->phone_number)->get();
        $count = $item->count();
        $total = ecomm_cart::where('phone_number', auth()->guard('webmember')->user()->phone_number)->sum(\DB::raw('price * quantity'));
        $discount = ecomm_cart::where('phone_number', auth()->guard('webmember')->user()->phone_number)->sum(\DB::raw('price * discount/100 * quantity'));;

        return view('ecommerce/ecomm_cart',compact('item','total','discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ecomm_cart $ecomm_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ecomm_cart $ecomm_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ecomm_cart $ecomm_cart)
    {
        //
    }
}
