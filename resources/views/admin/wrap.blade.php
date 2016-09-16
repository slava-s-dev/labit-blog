<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.ico"  type="image/x-icon" />

    <title>@yield('title', 'Slava blogger')</title>

    <!-- seo -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- seo -->

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
    <!-- css -->

    <!-- facebook -->
    <meta property="og:title" content="@yield('title', 'Slava blogger')" />
    <meta property="og:description" content="@yield('seo_description')" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:image" content="{{asset('images/logo_for_social.png')}}" />
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:updated_time" content="@yield('og_update_time', \Carbon\Carbon::now()->format('Y-m-d'))" />
    <meta property="og:site_name" content="@yield('og_site_name', 'Slava blogger')" />
    <!-- facebook -->

    <!-- twitter -->
    <meta name="twitter:card" content="@yield('twitter_card', 'summary')">
    <meta name="twitter:creator" content="creator">
    <meta name="twitter:site" content="@SlavaBlog">
    <meta name="twitter:url" content="{{ Request::url() }}" />
    <meta name="twitter:title" content="@yield('title', 'Slava blogger')">
    <meta name="twitter:description" content="">
    <!-- twitter -->
</head>
<body>
<!--All page!-->
<div class="all">

    <!--header!-->
@include('admin.partials.header')
<!--header!-->

    <!--content!-->
@section('content')
@show
<!--content!-->

</div>
<!--All page!-->

<!--footer!-->
{{--@include('partials.footer')--}}
<!--footer!-->

<!-- popups -->
@yield('popups')
<!-- popups -->

<!-- js -->
<script type="application/javascript" src="{{ asset('js/admin.js') }}"></script>
@yield('scripts')
<!-- js -->
</body>
</html>