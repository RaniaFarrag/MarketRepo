<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile ">
    <!--begin::Logo-->
    <a href="#">
        <img alt="Logo" src="{{ asset('dashboard/assets/media/logos/logo-letter-1.png') }}"
             class="logo-default max-h-30px"/>
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">

        <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>

        <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/General/User.svg--><svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
              fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></button>
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container  d-flex align-items-stretch justify-content-between">
                    <!--begin::Left-->
                    <div class="d-flex align-items-stretch mr-3">
                        <!--begin::Header Logo-->
                        <div class="header-logo">
                            <a href="#">
                                <img alt="Logo" src="{{ asset('dashboard/assets/media/logos/logo-letter-9.png') }}"
                                     class="logo-default max-h-40px"/>
                                <img alt="Logo" src="{{ asset('dashboard/assets/media/logos/logo-letter-1.png') }}"
                                     class="logo-sticky max-h-40px"/>
                            </a>
                        </div>
                        <!--end::Header Logo-->

                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu"
                                 class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default ">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav ">
                                    <li class="menu-item   menu-item-here"
                                        data-menu-toggle="click" aria-haspopup="true">
                                        <a href="{{ route('home') }}" class="menu-link ">
                                            <span class="menu-text">{{ trans('dashboard.dashboard') }}</span>
                                        </a>

                                    </li>
                                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="menu-text">{{ trans('dashboard.Companies Data') }}</span>
                                            <span class="menu-desc"></span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                            <ul class="menu-subnav">
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('companies.index') }}" class="menu-link">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="icon  fa fa-building"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Companies View') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('companies.create') }}" class="menu-link ">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-marker"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Add New Company') }}</span>
                                                    </a>

                                                </li>


                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="menu-text">{{ trans('dashboard.Corporate Assignment') }}</span>
                                            <span class="menu-desc"></span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                            <ul class="menu-subnav">
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                      <i class="fas fa-user-tie"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Assign companies to a representative') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="far fa-building"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text"> {{ trans('dashboard.Representative companies') }}</span>
                                                    </a>

                                                </li>


                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="menu-text">{{ trans('dashboard.Region') }}</span>
                                            <span class="menu-desc"></span>
                                            <i class="menu-arrow"></i>
                                        </a>

                                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                            <ul class="menu-subnav">
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('countries.index') }}" class="menu-link">
                                                    <span class="svg-icon menu-icon">
                                                        <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                     <i class="fas fa-marker"></i>
                                                        <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Countries') }}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('cities.index') }}" class="menu-link">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                  <i class="fas fa-map-marker-alt"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Cities') }}</span>
                                                    </a>

                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="menu-text">{{ trans('dashboard.Sectors') }}</span>
                                            <span class="menu-desc"></span>
                                            <i class="menu-arrow"></i>
                                        </a>

                                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                            <ul class="menu-subnav">
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('sectors.index') }}" class="menu-link ">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                  <i class="fas fa-suitcase"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.View Sectors') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('sectors.create') }}" class="menu-link ">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-marker"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Add New Sector') }}</span>
                                                    </a>

                                                </li>


                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="menu-text">{{ trans('dashboard.Reports') }}</span>
                                            <span class="menu-desc"></span>
                                            <i class="menu-arrow"></i>
                                        </a>

                                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                            <ul class="menu-subnav">
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                  <i class="far fa-chart-bar"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Company Report') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-user-tie"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Rep Reports') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="far fa-list-alt"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Monitor the login') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-users-cog"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.TEAM SALES LEAD REPORT') }}</span>
                                                    </a>

                                                </li>


                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="menu-text">{{ trans('dashboard.Users') }}</span>
                                            <span class="menu-desc"></span>
                                            <i class="menu-arrow"></i>
                                        </a>

                                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                            <ul class="menu-subnav">
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('users.index') }}" class="menu-link ">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                  <i class="fas fa-users"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.View Users') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('users.create') }}" class="menu-link ">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-user-plus"></i>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">{{ trans('dashboard.Add New Users') }}</span>
                                                    </a>

                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('roles.index') }}" class="menu-link">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-user-plus"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-text">{{ trans('dashboard.View Roles') }}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item " data-menu-toggle="hover"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('roles.create') }}" class="menu-link">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Communication/Add-user.svg-->
                                                         <i class="fas fa-user-plus"></i>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-text">{{ trans('dashboard.Add New role') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                    </div>
                    <!--end::Left-->

                    <!--begin::Topbar-->
                    <div class="topbar">


                        <!--begin::Notifications-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">
	        				<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:public/dashboard/assets/media/svg/icons/Code/Compiling.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
              fill="#000000" opacity="0.3"/>
        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
              fill="#000000"/>
    </g>
</svg>
                                <!--end::Svg Icon--></span> <span class="pulse-ring"></span>
                                </div>
                            </div>
                            <!--end::Toggle-->

                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                <form>
                                    <!--begin::Header-->
                                    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                                         style="background-image: url({{ asset('dashboard/assets/media/misc/bg-1.jpg') }})">
                                        <!--begin::Title-->
                                        <h4 class="d-flex flex-center rounded-top">
                                            <span class="text-white">{{ trans('dashboard.User Notifications') }}</span>
                                            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 {{ trans('dashboard.new') }}</span>
                                        </h4>
                                        <!--end::Title-->

                                        <!--begin::Tabs-->
                                        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                            role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab"
                                                   href="#topbar_notifications_events">Alerts</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
                                            </li>
                                        </ul>
                                        <!--end::Tabs-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Content-->
                                    <div class="tab-content">


                                        <!--begin::Tabpane-->
                                        <div class="tab-pane active show p-8" id="topbar_notifications_events"
                                             role="tabpanel">
                                            <!--begin::Nav-->
                                            <div class="navi navi-hover scroll my-4" data-scroll="true"
                                                 data-height="300" data-mobile-height="200">
                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-line-chart text-success"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New report has been received
                                                            </div>
                                                            <div class="text-muted">
                                                                23 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-paper-plane text-danger"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                Finance report has been generated
                                                            </div>
                                                            <div class="text-muted">
                                                                25 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-user flaticon2-line- text-success"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New order has been received
                                                            </div>
                                                            <div class="text-muted">
                                                                2 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-pin text-primary"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New customer is registered
                                                            </div>
                                                            <div class="text-muted">
                                                                3 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-sms text-danger"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                Application has been approved
                                                            </div>
                                                            <div class="text-muted">
                                                                3 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-pie-chart-3 text-warning"></i>
                                                        </div>
                                                        <div class="navinavinavi-text">
                                                            <div class="font-weight-bold">
                                                                New file has been uploaded
                                                            </div>
                                                            <div class="text-muted">
                                                                5 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon-pie-chart-1 text-info"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New user feedback received
                                                            </div>
                                                            <div class="text-muted">
                                                                8 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-settings text-success"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                System reboot has been successfully completed
                                                            </div>
                                                            <div class="text-muted">
                                                                12 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon-safe-shield-protection text-primary"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New order has been placed
                                                            </div>
                                                            <div class="text-muted">
                                                                15 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-notification text-primary"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                Company meeting canceled
                                                            </div>
                                                            <div class="text-muted">
                                                                19 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-fax text-success"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New report has been received
                                                            </div>
                                                            <div class="text-muted">
                                                                23 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon-download-1 text-danger"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                Finance report has been generated
                                                            </div>
                                                            <div class="text-muted">
                                                                25 hrs ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon-security text-warning"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New customer comment recieved
                                                            </div>
                                                            <div class="text-muted">
                                                                2 days ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <a href="#" class="navi-item">
                                                    <div class="navi-link">
                                                        <div class="navi-icon mr-2">
                                                            <i class="flaticon2-analytics-1 text-success"></i>
                                                        </div>
                                                        <div class="navi-text">
                                                            <div class="font-weight-bold">
                                                                New customer is registered
                                                            </div>
                                                            <div class="text-muted">
                                                                3 days ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Nav-->
                                        </div>
                                        <!--end::Tabpane-->

                                        <!--begin::Tabpane-->
                                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                            <!--begin::Nav-->
                                            <div class="d-flex flex-center text-center text-muted min-h-200px">
                                                All caught up!
                                                <br/>
                                                No new notifications.
                                            </div>
                                            <!--end::Nav-->
                                        </div>
                                        <!--end::Tabpane-->
                                    </div>
                                    <!--end::Content-->
                                </form>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Notifications-->

                        <!--begin::Languages-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                                    <img class="h-20px w-20px rounded-sm"
                                         src="{{ asset('dashboard/assets/media/svg/flags/226-united-states.svg') }}"
                                         alt=""/>
                                </div>
                            </div>
                            <!--end::Toggle-->

                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Nav-->
                                <ul class="navi navi-hover py-4">
                                    <!--begin::Item-->
                                    <li class="navi-item">
                                        <a href="{{ route('locale' , 'en') }}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">
                                                <img src="{{ asset('dashboard/assets/media/svg/flags/226-united-states.svg') }}"
                                                     alt=""/>
                                            </span>
                                            <span class="navi-text">English</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="navi-item active">
                                        <a href="{{ route('locale' , 'ar') }}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">
                                                <img src="{{ asset('dashboard/assets/media/svg/flags/133-saudi-arabia.svg') }}"
                                                     alt=""/>
                                            </span>
                                            <span class="navi-text">Arabic</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->


                                </ul>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Languages-->

                        <!--begin::User-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                                    <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ auth()->user()->name }}</span>
                                    <span class="symbol symbol-35">
	                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">A</span>
	                        </span>
                                </div>
                            </div>
                            <!--end::Toggle-->

                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                                <!--begin::Nav-->
                                <div class="navi navi-spacer-x-0 pt-5">

                                    <div class="navi-footer  px-8 py-5">
                                        <a href="{{ route('logout') }}"
                                           class="btn btn-light-primary btn-block font-weight-bold"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                            Out</a>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>

                                    <!--end::Footer-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->