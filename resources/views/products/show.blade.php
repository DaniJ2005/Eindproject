@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Name:</strong>
            {{ $product->name }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Supplier:</strong>
            {{ $product->supplier->name }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Buy Price:</strong>
            &euro;{{ $product->buy_price }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Sell Price:</strong>
            &euro;{{ $product->sell_price }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Stock:</strong>
            {{ $product->stock }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Min stock:</strong>
            {{ $product->min_stock }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Max stock:</strong>
            {{ $product->max_stock }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Warehouse Location:</strong>
            {{ $product->location }}
          </div>
        </div>

        

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created at:</strong>
            {{ $product->created_at }}
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          @if($product->created_at != $product->updated_at)
          <strong>Updated at:</strong>
              {{ $product->updated_at }}
            @endif
        </div>
      </div>





    </div>
@endsection