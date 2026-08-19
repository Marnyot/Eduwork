@props([
    'image' => 'https://placehold.co/600x400?text=No+Image',
    'category' => null,
    'price' => null,
])
<div class="card product-card h-100">
    <div class="product-card-media">
        <img src="{{ asset($image) }}" alt="{!! $title !!}" loading="lazy">
    </div>
    <div class="card-body d-flex flex-column">
        @if ($category)
            <span class="product-card-category">{!! $category !!}</span>
        @endif
        <h3 class="product-card-title">{!! $title !!}</h3>
        @if (! is_null($price))
            <p class="product-card-price">Rp {{ number_format($price, 0, ',', '.') }}</p>
        @endif
        <a href="{{ route('products.show', $slug) }}" class="btn btn-warning mt-auto">Lihat Detail</a>
    </div>
</div>
