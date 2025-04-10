<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">{{ $label }}</label>
    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows ?? 1 }}"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >{{ $value }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
    @endif
    @error($error)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>