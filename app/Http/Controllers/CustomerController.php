<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);

        return view('customers.index', compact('customers'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
          'name' => 'required',
          'email' => 'required',
          'address' => 'required',
          'postal_code' => 'required|max:6',
          'city' => 'required'
        ]);

        // create a new customer
        Customer::create($request->all());

        // redirect with feedback message
        return redirect()->route('customers.index')->with('success','Customer created successfully');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
      // Validate the input
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'postal_code' => 'required|max:6',
        'city' => 'required'
      ]);


        // update Customer
        $customer->update($request->all());

        //redirect and feedback message
        return redirect()->route('customers.index')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

         //redirect and feedback message
         return redirect()->route('customers.index')->with('success','Customer deleted successfully');
    }
}
