@props(['sortDirection'])

<div class="d-flex">
    <span @if ($sortDirection == 'asc') style="opacity: 1" @else style="opacity: .3" @endif>↑</span>
    <span @if ($sortDirection == 'desc') style="opacity: 1" @else style="opacity: .3" @endif>↓</span>
</div>
