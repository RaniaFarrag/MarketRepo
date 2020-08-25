<!DOCTYPE html>
@if(app()->getLocale() == 'en')
    <html lang="en">

    @elseif(app()->getLocale() == 'ar')

        <html lang="en" direction="rtl" style="direction: rtl;">

        @endif
<head>
    @include('layouts.meta_en')
</head>
<body  id="kt_body" style="background-image: url({{ asset('dashboard/assets/media/bg/bg-10.jpg') }})"
       class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >
@include('layouts.header_en')


@yield('body')


@include('layouts.footer_en')
</body>
</html>
