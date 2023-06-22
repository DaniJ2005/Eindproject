<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $suppliers = Supplier::all();

        return view('products.index', compact('products', 'suppliers'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

      $suppliers = Supplier::all();

      return view('products.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validate the input
    $request->validate([
        'name' => 'required',
        'buy_price' => 'required',
        'sell_price' => 'required',
        'stock' => 'required',
        'min_stock' => 'required|max:6',
        'max_stock' => 'required',
        'location' => 'required',
        'image' => 'required',
    ]);

    $data = $request->except('image'); // Exclude the 'image' field from the data

    if ($request->hasFile('image')) {
      $name = $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('public/images/', $name);
      
      // Add the image name to the request data
      $data['image'] = $name;
    } 
    // Create a new product
    Product::create($data);

    // Redirect with feedback message
    return redirect()->route('products.index')->with('success', 'Product added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
      // Validate the input
      $request->validate([
        'name' => 'required',
        'buy_price' => 'required',
        'sell_price' => 'required',
        'stock' => 'required',
        'min_stock' => 'required|max:6',
        'max_stock' => 'required',
        'location' => 'required',
        'image' => 'required',
      ]);

      $data = $request->except('image'); // Exclude the 'image' field from the data

      if ($request->hasFile('image')) {
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images/', $name);
        
        // Add the image name to the request data
        $data['image'] = $name;
      } 


        // update Product
        $product->update($data);

        //redirect and feedback message
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

         //redirect and feedback message
         return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
