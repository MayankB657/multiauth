<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="stylesheet" href="{{ url('/') }}/public/css/admin/app.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/admin/plugins.bundle.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/admin/style.bundle.css">
</head>

<body data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <div class="d-flex flex-column flex-root app-root">
        <div class="app-page flex-column flex-column-fluid">
            @include('components.header')
            <div class="app-wrapper flex-column flex-row-fluid">
                @include('components.sidebar')
                <div class="app-main flex-column flex-row-fluid">
                    @yield('content')
                    @include('components.footer')
                </div>
            </div>
        </div>
    </div>
</body>
@include('components.footer-script')
</html>
