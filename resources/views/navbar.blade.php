

<nav class="navbar">

  <a href="/"><img src="{{ asset('images/logo.png') }}" style="max-height: 52px" class="logo" alt=""></a>

  <ul class="nav-items">
    <li><a href="{{ route('buyorders.index') }}">Buy orders</a></li>
    <li><a href="{{ route('sellorders.index') }}">Sell orders</a></li>
    <li><a href="{{ route('products.index') }}">Products</a></li>
    <li><a href="{{ route('customers.index') }}">Customers</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
  </ul>

</nav>

