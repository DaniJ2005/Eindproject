@extends('layout')

@section('content')
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Add products to sell order</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('sellorders.index') }}"> Back</a>
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
      <form action="{{ route('sellorders.products.store', $sellOrder->id) }}" method="POST">
      @csrf

        <div class="product-item">
          
          <img src="{{ asset('storage/images/' . $product->image) }}" class="product-img" >
          
          <div class="product-bottom-container">
            <div class="product-text-container">
            <p class="product-name">{{ $product->name }}</p>
            <p class="product-price">&euro;{{ $product->sell_price }}</p>
            </div>
            
            <select name="quantities[{{ $product->id }}]" id="quantity_{{ $product->id }}">
              @for ($i = 1; $i <= $product->stock; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
            
            @if ($product->stock <= 0)
            <button class="btn btn-secondary" disabled>Add</button>
            @else
            <button class="btn btn-success" type="submit">Add</button>
            @endif

            

          </div>
        </div>
      </form>
      @endforeach



  </div>


  <div class="added-items">
    <h2>Added Items</h2>
    <ul class="products-list">
      @php
      $totalPrice = 0;
      @endphp

      @foreach ($sellProducts as $sellProduct)
          @if ($sellProduct->sell_order_id == $sellOrder->id)
              @php
              $price = $sellProduct->product->sell_price * $sellProduct->quantity;
              $totalPrice += $price;
              @endphp
              <form action="{{ route('sellorders.products.destroy', ['productId' => $sellProduct->id]) }}" method="POST">
                <div class="list-item">
                  <div class="top-text">
                    <strong>{{ $sellProduct->product->name }}</strong>
                    <strong> &euro;{{ number_format($price, 2) }}</strong>
                  </div>
                  <div class="bottom-text">
                    <p style="margin: 0"> quantity: {{ $sellProduct->quantity }}</p>
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

