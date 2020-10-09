<div class="product ftco-animate">
    <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{Storage::url($item->image)}});">
        <div class="desc">
            <p class="meta-prod d-flex">
                <a href="#" class="d-flex align-items-center justify-content-center">
                    <span class="flaticon-shopping-bag"></span>
                </a>
                <a href="#" class="d-flex align-items-center justify-content-center">
                    <span class="flaticon-heart"></span>
                </a>
                <a href="{{ route('store.product', ['id'=> $item->id]) }}" class="d-flex align-items-center justify-content-center">
                    <span class="flaticon-visibility"></span>
                </a>
            </p>
        </div>
    </div>
    <div class="text text-center">
        @if ($item->sale > 0)
            <span class="sale">Sale</span>
        @endif
        @if ($item->bestseller)
            <span class="seller">Best Seller</span>
        @endif
        
        <span class="category">{{$item->sub_category->name}}</span>
        <h2>{{$item->name}}</h2>

        @if ($item->sale > 0)
            <p class="mb-0">
                <span class="price price-sale"> {{ number_format($item->price) }}₫ </span>
                <span class="price">{{ number_format($item->price - ($item->price * $item->sale / 100)) }}₫</span>
            </p>
        @else
            <p class="mb-0"><span class="price">{{ number_format($item->price) }}₫</span></p>
        @endif
        
    </div>
</div>