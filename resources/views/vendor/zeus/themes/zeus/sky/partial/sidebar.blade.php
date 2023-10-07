{{-- @include($skyTheme.'.partial.authors') --}}
@php
    $skyTheme = app('skyTheme');
@endphp

@include($skyTheme . '.partial.sidebar.search')
@include($skyTheme . '.partial.sidebar.categories')
@include($skyTheme . '.partial.sidebar.recent')
@include($skyTheme . '.partial.sidebar.related')
{{-- @include($skyTheme . '.partial.sidebar.pages') --}}
