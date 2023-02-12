<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">


@include('partials.head')


<body>

<div id="wrapper" class="clearfix">

    @yield("content")

    @include('partials.footer')
    @include('partials.scripts')

</div>

</body>


</html>
