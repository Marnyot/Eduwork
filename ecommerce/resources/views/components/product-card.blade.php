@props([
    'image' => 'https://placehold.co/600x400?text=No+Image',
])
<div class="card h-100">
  <img src="{{ asset($image) }}" class="card-img-top" alt="{{ $title }}">
  <div class="card-body d-flex flex-column justify-content-between">
    <h5 class="card-title">{{ $title }}</h5>
    <a href="{{ route('products.show', $slug) }}" class="btn btn-warning">Lihat Detail</a>
  </div>
</div>
