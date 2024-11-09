<div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{ number_format($product->amount, 2) }}</h6>
            <p class="card-text">{{ $product->description }}</p>
            @if (auth()->user())
                <button wire:click="addToCart({{ $product->id }})" class="btn btn-primary">Add To Cart</button>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Add To Cart</a>
            @endif
        </div>
    </div>
</div>
