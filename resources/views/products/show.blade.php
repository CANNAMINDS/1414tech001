
@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="row g-0">

      <!-- Image -->
      <div class="col-md-5">
        <img src="{{ route('product.image.private', ['path' => 'private/' . $product->image]) }}"
             class="img-fluid rounded-start"
             alt="{{ $product->name }}">
      </div>

      <!-- Details -->
      <div class="col-md-7">
        <div class="card-body">
          <h3 class="card-title fw-bold">{{ $product->name }}</h3>
          <p class="text-success fw-semibold fs-5">${{ number_format($product->price, 2) }}</p>
          <p class="text-muted">{{ $product->description }}</p>
          <button class="btn btn-primary mt-3">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
