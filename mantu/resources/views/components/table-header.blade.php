@props(['sortBy', 'sortDirection', 'name', 'sortKey'])

<th>
    <a href="{{ route('tasks', ['sortBy' => $sortKey, 'sortDirection' => $sortBy != $sortKey ? 'asc' : ($sortDirection == 'asc' ? 'desc' : 'asc')]) }}"
        class="d-flex align-items-center" style="color: unset; gap: 6px;">
        {{ $name }}
        @if ($sortBy == $sortKey)
            <x-sort-icon sortDirection="{{ $sortDirection }}" />
        @else
            <x-sort-icon sortDirection="" />
        @endif
    </a>
</th>
