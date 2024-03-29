<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\SellOrder;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\SellProduct; 

class SellOrderController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellorders = SellOrder::latest()->paginate(10);

        return view('sellorders.index', compact('sellorders'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Paginate the Sell orders
        $customers = Customer::all();
        
        
        return view('sellorders.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
        ]);
    
        $sellOrder = SellOrder::create($request->all());
    
        return redirect()->route('sellorders.products.create', $sellOrder->id)->with('success', 'Sell Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($sellOrderId)
    {
        $customers = Customer::all();
        $sellorder = SellOrder::findOrFail($sellOrderId);
        $sellProducts = SellProduct::where('sell_order_id', $sellOrderId)->get();

        //dd($sellProducts);
    
        return view('sellorders.show', compact('sellorder', 'customers', 'sellProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SellOrder $sellorder)
    {

      $customers = Customer::all();
    
      return view('sellorders.edit', compact('sellorder', 'customers'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SellOrder $sellorder)
    {

      $request->validate([
        'customer_id' => 'required',
      ]);


      $sellorder->update($request->all());


      return redirect()->route('sellorders.index')->with('success','Sell order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SellOrder $sellorder)
    {
      $sellorder->delete();
      
      return redirect()->route('sellorders.index')->with('success','Sell order deleted successfully');
    }


    public function createSellOrderProducts($sellOrderId)
    {
        // Retrieve the sell order using the ID
        $sellOrder = SellOrder::findOrFail($sellOrderId);

        $sellProducts = SellProduct::where('sell_order_id', $sellOrderId)->get();


        // Retrieve the products available for selection
        $products = Product::latest()->paginate(16);

        return view('sellorders.create_products', compact('products', 'sellProducts'))->with('sellOrder', $sellOrder);
    }

    public function editSellOrderProducts($sellOrderId)
    {
      $sellOrder = SellOrder::findOrFail($sellOrderId);

      $products = Product::all();
    }


    public function storeSellOrderProducts(Request $request, $sellOrderId)
    {
        $sellOrder = SellOrder::findOrFail($sellOrderId);
        // $sellOrder = SellOrder::where(['sell_order_id' => $sellOrderId]);

        


        $quantities = $request->input('quantities');

        foreach ($quantities as $productId => $quantity) {
            SellProduct::create([
                'sell_order_id' => $sellOrder->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Products added successfully');
    }



    public function deleteSellOrderProducts(Request $request, $sellProductId)
    {
        $sellProduct = SellProduct::findOrFail($sellProductId);
        $sellProduct->delete();

        return redirect()->route('sellorders.products.create', ['sellOrderId' => $sellProduct->sell_order_id])->with('success', 'Sell product removed successfully.');
    }

    
}
