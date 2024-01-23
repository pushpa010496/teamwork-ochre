@if ($sortField !== $field)
    <i class="text-muted fa fa-sort"></i>
@elseif ($sortAsc)
    <i class="fa fa-sort-asc"></i>
@else
    <i class="fa fa-sort-desc"></i>
@endif
