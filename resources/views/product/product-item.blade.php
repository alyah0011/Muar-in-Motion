<div class="container" data-product-id="{{ $product->lp_id }}">
    <!-- Render the HTML structure for each local product -->
    <div class="rectangle">
        <div class="image-placeholder">
            @if($product->lp_img)
                <img src="{{ asset('storage/' . $product->lp_img) }}" alt="{{ $product->lp_name }}">
            @endif
        </div>

        <div class="product-details">
            <div class="product-title">
                <a href="{{ route('product.detail', $product->lp_id) }}">{{ $product->lp_name }}</a>
            </div>

            @if($product->lp_price)
                <div class="product-price">
                    <strong>RM {{ $product->lp_price }}</strong>
                </div>
            @endif

            <div class="product-type">
                <p>Type: {{ $product->lp_type }}</p>
            </div>

            <div class="product-description">
                <p>{{ $product->lp_sdesc }}</p>
            </div>

            
        </div>
    </div>
</div>
