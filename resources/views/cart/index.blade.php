<h2>Your Cart</h2>
@if(session('cart') && count(session('cart')) > 0)
<table class="table">
  <thead>
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach(session('cart') as $item)
    <tr>
      <td>{{ $item['name'] }}</td>
      <td>${{ $item['price'] }}</td>
      <td>{{ $item['quantity'] }}</td>
      <td>${{ $item['price'] * $item['quantity'] }}</td>
      <td>
        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
          @csrf
          <button type="submit">Remove</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<form action="{{ route('cart.checkout') }}" method="POST">
  @csrf
  <button type="submit" class="btn btn-primary">Checkout</button>
</form>

@else
<p>Your cart is empty.</p>
@endif
