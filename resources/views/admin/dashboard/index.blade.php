@extends('layouts.admin')
@section('content')
<div class="kt-portlet">

    @if (auth()->user()->hasRole('Front Desk Officer'))
        @include('admin.dashboard.font_dask_officer')
    @endif
    @if (auth()->user()->hasRole('Counsellor'))
        @include('admin.dashboard.consellor')
    @endif
    @if (auth()->user()->hasRole('Manager - Accounts'))
        @include('admin.dashboard.account_manager')
    @endif

</div>
@endsection
