@if (Auth::guard('org')->check())
    @include('partials.org-nav-links')
@else
    @include('partials.vol-nav-links')
@endif