<?php

namespace App\Http\Controllers;

use App\Models\ecomm_additem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class EcommAdditemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ecomm_additem::all();
        return view('ecommerce.ecom_itemupdate', compact('items'));
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
    public function ecomm_add_item(Request $request)
    {
        // Validate the form data
        $request->validate([
            'item_name' => 'string|max:255',
            'item_type' => 'string|max:255',
        ]);

        // Create a new item instance
        $item = new ecomm_additem();
        $item->item_name = $request->input('item_name');
        $item->item_type = $request->input('item_type');
        $item->price = $request->input('price');
        $item->category = $request->input('category');
        $item->discount = $request->input('discount');
        $item->quantity = $request->input('quantity');
        $item->description = $request->input('description');

        if ($request->hasFile('main_img')) {
            //store main image
            $main_img = $request->file('main_img');
            $originalName_main_img = $main_img->getClientOriginalName();
            $extension_main_img = $main_img->getClientOriginalExtension();
            $filename_main_img = $this->generateUniqueFilename($originalName_main_img, $extension_main_img);
            $imgpath_main_img = $main_img->storeAs('images', $filename_main_img, 'public');
            $item->main_img = $imgpath_main_img;
        }

        if ($request->hasFile('first_img')) {
            //store first image
            $first_img = $request->file('first_img');
            $originalName_first_img = $first_img->getClientOriginalName();
            $extension_first_img = $first_img->getClientOriginalExtension();
            $filename_first_img = $this->generateUniqueFilename($originalName_first_img, $extension_first_img);
            $imgpath_first_img = $first_img->storeAs('images', $filename_first_img, 'public');
            $item->first_img = $imgpath_first_img;
        }

        if ($request->hasFile('second_img')) {
            //store second image
            $second_img = $request->file('second_img');
            $originalName_second_img = $second_img->getClientOriginalName();
            $extension_second_img = $second_img->getClientOriginalExtension();
            $filename_second_img = $this->generateUniqueFilename($originalName_second_img, $extension_second_img);
            $imgpath_second_img = $second_img->storeAs('images', $filename_second_img, 'public');
            $item->second_img = $imgpath_second_img;
        }

        if ($request->hasFile('third_img')) {
            //store third image
            $third_img = $request->file('third_img');
            $originalName_third_img = $third_img->getClientOriginalName();
            $extension_third_img = $third_img->getClientOriginalExtension();
            $filename_third_img = $this->generateUniqueFilename($originalName_third_img, $extension_third_img);
            $imgpath_third_img = $third_img->storeAs('images', $filename_third_img, 'public');
            $item->third_img = $imgpath_third_img;
        }

        // Save the item to the database
        $item->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Item added successfully!');
    }

    private function generateUniqueFilename($originalName, $extension)
    {

        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $filename = Str::slug($filename); // Convert to a URL-friendly slug
        $filename = $filename . '_' . time() . '.' . $extension;

        return $filename;
    }


    public function display_ecomm_items()
    {
        $item = ecomm_additem::all();
        return view('ecommerce/index', compact('item'));
    }

    public function logged_display_ecomm_items()
    {
        $item = ecomm_additem::all();
        return view('ecommerce/member_index', compact('item'));
    }

    public function preview_item($id)
    {
        $pre_item = ecomm_additem::find($id);
        return view('ecommerce/item', compact('pre_item'));
    }

    public function logged_preview_item($id)
    {
        $pre_item = ecomm_additem::find($id);
        return view('ecommerce/member_item', compact('pre_item'));
    }


    //categories
    public function ecomm_books()
    {
        $item = ecomm_additem::where('category', 'books')->get();

        return view('ecommerce/category_books', compact('item'));
    }
    public function ecomm_cloths()
    {
        $item = ecomm_additem::where('category', 'cloths')->get();

        return view('ecommerce/category_cloths', compact('item'));
    }
    public function ecomm_computer_accessories()
    {
        $item = ecomm_additem::where('category', 'computer_accessories')->get();

        return view('ecommerce/category_computer_accessories', compact('item'));
    }
    public function ecomm_computer()
    {
        $item = ecomm_additem::where('category', 'computer')->get();

        return view('ecommerce/category_computer', compact('item'));
    }
    public function ecomm_footwear()
    {
        $item = ecomm_additem::where('category', 'footwear')->get();

        return view('ecommerce/category_footwear', compact('item'));
    }
    public function ecomm_furniture()
    {
        $item = ecomm_additem::where('category', 'furniture')->get();

        return view('ecommerce/category_furniture', compact('item'));
    }
    public function ecomm_household()
    {
        $item = ecomm_additem::where('category', 'household')->get();

        return view('ecommerce/category_household', compact('item'));
    }
    public function ecomm_laptop()
    {
        $item = ecomm_additem::where('category', 'laptop')->get();

        return view('ecommerce/category_laptop', compact('item'));
    }
    public function ecomm_stationary()
    {
        $item = ecomm_additem::where('category', 'stationary')->get();

        return view('ecommerce/category_stationary', compact('item'));
    }
    public function ecomm_tires()
    {
        $item = ecomm_additem::where('category', 'tires')->get();

        return view('ecommerce/category_tires', compact('item'));
    }

    //member_categories
    public function ecomm_member_books()
    {
        $item = ecomm_additem::where('category', 'books')->get();

        return view('ecommerce/category_member/member_category_books', compact('item'));
    }
    public function ecomm_member_cloths()
    {
        $item = ecomm_additem::where('category', 'cloths')->get();

        return view('ecommerce/category_member/member_category_cloths', compact('item'));
    }
    public function ecomm_member_computer_accessories()
    {
        $item = ecomm_additem::where('category', 'computer_accessories')->get();

        return view('ecommerce/category_member/member_category_computer_accessories', compact('item'));
    }
    public function ecomm_member_computer()
    {
        $item = ecomm_additem::where('category', 'computer')->get();

        return view('ecommerce/category_member/member_category_computer', compact('item'));
    }
    public function ecomm_member_footwear()
    {
        $item = ecomm_additem::where('category', 'footwear')->get();

        return view('ecommerce/category_member/member_category_footwear', compact('item'));
    }
    public function ecomm_member_furniture()
    {
        $item = ecomm_additem::where('category', 'furniture')->get();

        return view('ecommerce/category_member/member_category_furniture', compact('item'));
    }
    public function ecomm_member_household()
    {
        $item = ecomm_additem::where('category', 'household')->get();

        return view('ecommerce/category_member/member_category_household', compact('item'));
    }
    public function ecomm_member_laptop()
    {
        $item = ecomm_additem::where('category', 'laptop')->get();

        return view('ecommerce/category_member/member_category_laptop', compact('item'));
    }
    public function ecomm_member_stationary()
    {
        $item = ecomm_additem::where('category', 'stationary')->get();

        return view('ecommerce/category_member/member_category_stationary', compact('item'));
    }
    public function ecomm_member_tires()
    {
        $item = ecomm_additem::where('category', 'tires')->get();

        return view('ecommerce/category_member/member_category_tires', compact('item'));
    }



    public function destroy($id)
    {
        $item = ecomm_additem::findOrFail($id);

        // Delete images from storage if they exist
        if ($item->main_img) {
            Storage::delete('public/' . $item->main_img);
        }

        if ($item->first_img) {
            Storage::delete('public/' . $item->first_img);
        }

        if ($item->second_img) {
            Storage::delete('public/' . $item->second_img);
        }

        if ($item->third_img) {
            Storage::delete('public/' . $item->third_img);
        }

        // Delete the item from the database
        $item->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $items = ecomm_additem::where('item_name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('ecommerce.searchpage', compact('items', 'query'));
    }

    public function edit($id)
    {
        $item = ecomm_additem::find($id);
        return view('ecommerce.adminproduct_edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string', // Add validation rule for category if needed
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity' => 'nullable|integer|min:0',
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rule for image files if needed
            'first_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'second_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'third_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            // Add validation rules for other fields as needed
        ]);

        // If validation fails, return the error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the product by ID
        $item = ecomm_additem::findOrFail($id);

        // Update product details
        $item->item_name = $request->input('item_name');
        $item->item_type = $request->input('item_type');
        $item->price = $request->input('price');
        $item->category = $request->input('category');
        $item->discount = $request->input('discount');
        $item->quantity = $request->input('quantity');
        $item->description = $request->input('description');

        // Handle image uploads
        if ($request->hasFile('main_img')) {
            $main_img = $request->file('main_img');
            $filename = time() . '_' . $main_img->getClientOriginalName();
            $main_img->storeAs('images', $filename, 'public');
            $item->main_img = 'images/' . $filename;
        }

        // Save the updated product
        $item->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
}
