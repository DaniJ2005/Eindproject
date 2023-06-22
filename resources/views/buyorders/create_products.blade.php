@extends('layout')

@section('content')
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Add products to buy order</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('buyorders.index') }}"> Back</a>
          </div>
      </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
  
  <div class="create-products-container">

  <div class="products-container">

    


      @foreach ($products as $product)
      @if ($product->supplier->name == $buyOrder->supplier->name)
        
      
      <form action="{{ route('buyorders.products.store', $buyOrder->id) }}" method="POST">
      @csrf

        <div class="product-item">
          
          <img src="{{ asset('storage/images/' . $product->image) }}" class="product-img" >
          
          <div class="product-bottom-container">
            <div class="product-text-container">
            <p class="product-name">{{ $product->name }}</p>
            <p class="product-price">&euro;{{ $product->buy_price }}</p>
            </div>
            
            <select name="quantities[{{ $product->id }}]" id="quantity_{{ $product->id }}">
              @for ($i = $product->min_stock - $product->stock; $i <= $product->max_stock - $product->stock; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
            
            @if ($product->stock >= $product->max_stock)
            <button class="btn btn-secondary" disabled>Add</button>
            @else
            <button class="btn btn-success" type="submit">Add</button>
            @endif
          </div>
        </div>
      </form>
      @endif
      @endforeach



  </div>


  <div class="added-items">
    <h2>Added Items</h2>
    <ul class="products-list">
      @php
      $totalPrice = 0;
      @endphp

      @foreach ($buyProducts as $buyProduct)
          @if ($buyProduct->buy_order_id == $buyOrder->id)
              @php
              $price = $buyProduct->product->buy_price * $buyProduct->quantity;
              $totalPrice += $price;
              @endphp
              <form action="{{ route('buyorders.products.destroy', ['productId' => $buyProduct->id]) }}" method="POST">
                <div class="list-item">
                  <div class="top-text">
                    <strong>{{ $buyProduct->product->name }}</strong>
                    <strong> &euro;{{ number_format($price, 2) }}</strong>
                  </div>
                  <div class="bottom-text">
                    <p style="margin: 0"> quantity: {{ $buyProduct->quantity }}</p>
                    @csrf
                    @method('DELETE')
                    <button class="trash-button" type="submit"><i class='bx bx-trash icon' style="font-size: 16px"></i></button>
                  </div>
                </div>
              </form>
          @endif
      @endforeach

      <strong>Total Price: &euro;{{ number_format($totalPrice, 2) }}</strong>
    </ul>
  </div>


</div>



@endsection 

