<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = supplier::latest()->paginate(5);

        return view('suppliers.index', compact('suppliers'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
          'name', 
          'contact', 
          'email', 
          'address', 
          'postal_code', 
          'city'
        ]);

        // create a new supplier
        supplier::create($request->all());

        // redirect with feedback message
        return redirect()->route('suppliers.index')->with('success','supplier added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supplier $supplier)
    {
      // Validate the input
      $request->validate([
        'name', 
        'contact', 
        'email', 
        'address', 
        'postal_code', 
        'city'
      ]);


        // update supplier
        $supplier->update($request->all());

        //redirect and feedback message
        return redirect()->route('suppliers.index')->with('success','supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supplier $supplier)
    {
        $supplier->delete();

         //redirect and feedback message
         return redirect()->route('suppliers.index')->with('success','supplier deleted successfully');
    }
}
