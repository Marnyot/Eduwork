@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-[#2f855a]']) }}>
        {{ $status }}
    </div>
@endif
