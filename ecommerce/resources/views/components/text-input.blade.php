@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 text-gray-900 placeholder:text-gray-400 focus:border-[#2f855a] focus:ring-[#2f855a] rounded-md shadow-sm']) }}>
