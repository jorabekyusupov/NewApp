@extends('admin.layouts.app')
@section('sidebar')
    <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>

    </li>
@endsection
@section('content')

@endsection





@section('vendor-script')

@endsection
@section('page-vendor-script')

@endsection
@section('page-script')
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
@endsection
@section('styles-page')

@endsection
@section('styles-vendor')
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
@endsection
