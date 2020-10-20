
<!--begin::Footer-->
<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2020&copy;</span>
            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Marketing</a>
        </div>
        <!--end::Copyright-->


    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->







<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->

<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('dashboard/assets/plugins/global/plugins.bundle.js?v=7.0.6') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6') }}"></script>
<script src="{{ asset('dashboard/assets/js/scripts.bundle.js?v=7.0.6') }}"></script>
<!--end::Global Theme Bundle-->





<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.6') }}"></script>
<!--end::Page Scripts-->

@if(app()->getLocale() == 'en')

    <script>
        $(document).ready(function () {

            $('.select2').select2({
                // options
                allowClear: true,
                placeholder: "Select a state"

            });


            
            
        });

    </script>
@elseif(app()->getLocale() == 'ar')

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                // options
                placeholder: "اختر",
                allowClear: true,
                searchInputPlaceholder: 'بحث ...',
                dir: "rtl",
                language: {
                    noResults: function (params) {
                        return "لم يتم العثور على تطابق";
                    }
                }
            });
        });
    </script>
@endif

<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('dashboard/assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6') }}"></script>

<!--<script src="assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
--><!--end::Page Scripts-->
@include('sweetalert::alert')
@yield('script')


<!--begin::Page companyData -->
<script>

    // Demo 3
    $('#kt_datetimepicker_3').datetimepicker({
        format: 'L'
    });$('#kt_datetimepicker_113').datetimepicker({
        format: 'L'
    });

</script>



