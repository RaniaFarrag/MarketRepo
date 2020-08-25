<meta charset="utf-8"/>
<title>Marketing HC | Dashboard</title>
<meta name="description" content="Updates and statistics"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<!--end::Page Vendors Styles-->


<!--begin::Global Theme Styles(used by all pages)-->

@if(app()->getLocale() == 'en')
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css?v=7.0.6" ') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}"  rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
@elseif(app()->getLocale() == 'ar')
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css?v=7.0.6" ') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}"  rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
@endif
<!--end::Global Theme Styles-->

<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->

<link rel="shortcut icon" href="{{ asset('dashboard/assets/media/logos/favicon.ico') }}"/>