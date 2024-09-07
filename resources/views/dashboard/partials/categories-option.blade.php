@php
    // Set a default value if $selectedCategoryId is not passed
    $selectedCategoryId = $selectedCategoryId ?? null;
@endphp

<option value="{{ $category->id }}" @selected($selectedCategoryId === $category->id)>
    {{ str_repeat('--', $level) }} {{ $category->name }}
</option>
@if ($category->children->isNotEmpty())
    @foreach ($category->children as $child)
        @include('dashboard.partials.categories-option', ['category' => $child, 'level' => $level + 1])
    @endforeach
@endif

