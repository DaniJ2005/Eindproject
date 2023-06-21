<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\BuyOrder;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\BuyProduct; 

class BuyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $buyorders = BuyOrder::latest()->paginate(10);

      return view('buyorders.index', compact('buyorders'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $suppliers = Supplier::all();
        
        
      return view('buyorders.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'supplier_id' => 'required',
      ]);

      $buyOrder = BuyOrder::create($request->all());

      return redirect()->route('buyorders.products.create', $buyOrder->id)->with('success', 'Buy Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($buyOrderId)
    {
      $suppliers = Supplier::all();
      $buyorder = BuyOrder::findOrFail($buyOrderId);
      $buyProducts = BuyProduct::where('buy_order_id', $buyOrderId)->get();

      //dd($buyProducts);
  
      return view('buyorders.show', compact('buyorder', 'suppliers', 'buyProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuyOrder $buyorder)
    {
      $suppliers = Supplier::all();
    
      return view('buyorders.edit', compact('buyorder', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuyOrder $buyorder)
    {

      $request->validate([
        'supplier_id' => 'required',
      ]);


      $buyorder->update($request->all());


      return redirect()->route('buyorders.index')->with('success','Buy order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyOrder $buyorder)
    {
      $buyorder->delete();
      
      return redirect()->route('buyorders.index')->with('success','Buy order deleted successfully');
    }




    public function createBuyOrderProducts($buyOrderId)
    {
        // Retrieve the buy order using the ID
        $buyOrder = BuyOrder::findOrFail($buyOrderId);

        $buyProducts = BuyProduct::where('buy_order_id', $buyOrderId)->get();


        // Retrieve the products available for selection
        $products = Product::latest()->paginate(16);

        return view('buyorders.create_products', compact('products', 'buyProducts'))->with('buyOrder', $buyOrder);
    }

    public function editBuyOrderProducts($buyOrderId)
    {
      $buyOrder = BuyOrder::findOrFail($buyOrderId);

      $products = Product::all();
    }


    public function storeBuyOrderProducts(Request $request, $buyOrderId)
    {
        $buyOrder = BuyOrder::findOrFail($buyOrderId);
        // $buyOrder = BuyOrder::where(['buy_order_id' => $buyOrderId]);

        


        $quantities = $request->input('quantities');

        foreach ($quantities as $productId => $quantity) {
            BuyProduct::create([
                'buy_order_id' => $buyOrder->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Products added successfully');
    }



    public function deleteBuyOrderProducts(Request $request, $buyProductId)
    {
        $buyProduct = BuyProduct::findOrFail($buyProductId);
        $buyProduct->delete();

        return redirect()->route('buyorders.products.create', ['buyOrderId' => $buyProduct->buy_order_id])->with('success', 'Buy product removed successfully.');
    }
}
