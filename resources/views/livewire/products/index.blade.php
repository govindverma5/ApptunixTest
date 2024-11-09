<div>
    <div class="container">

        <div class="input-group mb-3">
            <input wire:model="search_keyword" type="text" class="form-control" placeholder="Search Products...."
                aria-label="Search Products...." aria-describedby="basic-addon2">
            <span class="input-group-text btn btn-primary" id="basic-addon2" wire:click="search">Search</span>
        </div>
    </div>
    
    @forelse ($products as $product)
        <div wire:live class="container row">
            <div class="card col col-md-3" >
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ number_format($product->amount, 2) }}</h6>
                    <p class="card-text"> {{ $product->description }} .</p>
                    <a href="{{ route('product.details', $product->id) }}" class="card-link">Go to product</a>
                    @if (auth()->user())
                        <button wire:click="addToCart({{ $product->id }})" class="btn btn-primary">Add To Cart</button>
                    @else
                        <a href="{{route('login')}}" class="btn btn-primary">Add To Cart</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No products found</h5>
                </div>
            </div>
        </div>
    @endforelse

</div>
