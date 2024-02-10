@foreach ($products as $product)
    @include('product.product-item', ['product' => $product])
@endforeach