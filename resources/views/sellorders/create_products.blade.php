@extends('layout')

@section('content')

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
              @for ($i = 0; $i <= $product->stock; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
            
            <button class="btn btn-success" type="submit">Add</button>

            

          </div>
        </div>
      </form>

      <form action="{{ route('sellorders.products.delete', ['sellOrderId' => $sellOrder->id, 'productId' => $product->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Remove</button>
      </form>
      @endforeach



  </div>


  {{-- <div class="added-items">
    <h2>Added Items</h2>
    <ul>
      @foreach ($sellOrder->sellProducts as $sellProduct)
          <p>{{ $sellProduct->product->name }} - Quantity: {{ $sellProduct->quantity }}</p>
      @endforeach
    </ul>
  </div> --}}

@endsection