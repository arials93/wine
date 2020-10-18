<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
    <base href=" {{ asset('manager/') }}/ ">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <link href="assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css" />

    <!--end:: Vendor Plugins -->
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--begin:: Vendor Plugins for custom pages -->
    <link href="assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins for custom pages -->

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

    @stack('styles')
</head>
<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="index&demo=demo1.html">
                <img alt="Logo" src="assets/media/logos/logo-light.png" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->

            <!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
                id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="index&demo=demo1.html">
                            <img alt="Logo" src="assets/media/logos/logo-light.png" />
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                        <path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                                    </g>
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                    </g>
                                </svg></span>
                        </button>

                        <!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
                    </div>
                </div>

                <!-- end:: Aside -->

                <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
                        data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('manager.dashboard') }}"
                                        class="kt-menu__link "><span class="kt-menu__link-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg></span><span class="kt-menu__link-text">Dashboard</span></a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Quản lý hệ thống</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <!-- Sản phẩm -->
                            <li class="kt-menu__item  kt-menu__item--submenu 
                                @if (Str::contains(url()->current(), 'products')) kt-menu__item--active kt-menu__item--open @endif"
                                aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                    class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg></span><span class="kt-menu__link-text">Sản phẩm</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item 
                                            @if (Str::contains(url()->current(),'/categories')) kt-menu__item--active @endif" 
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.products.categories.index') }}"
                                                class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Loại sản phẩm</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item
                                            @if (Str::contains(url()->current(),'/sub_categories')) kt-menu__item--active @endif"  
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.products.sub_categories.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Loại sản phẩm con</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item 
                                        " aria-haspopup="true">
                                            <a href="{{ route('manager.products.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Sản phẩm</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <!-- Bài viết -->
                            <li class="kt-menu__item  kt-menu__item--submenu 
                                @if (Str::contains(url()->current(), 'blogs')) kt-menu__item--active kt-menu__item--open @endif"
                                aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                    class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg></span><span class="kt-menu__link-text">Bài viết</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item 
                                            @if (Str::contains(url()->current(),'/blog_categories')) kt-menu__item--active @endif" 
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.blogs.blog_categories.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Loại bài viết</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item
                                            @if (!Str::between(url()->current(),'blogs','blog_categories'))
                                            kt-menu__item--active @endif" aria-haspopup="true">
                                            <a href="{{ route('manager.blogs.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Bài viết</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Các thành phần khác -->
                            <li class="kt-menu__item  kt-menu__item--submenu 
                                @if (Str::contains(url()->current(), 'others')) kt-menu__item--active kt-menu__item--open @endif"
                                aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                    class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg></span><span class="kt-menu__link-text">Các thành phần khác</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item 
                                            @if (Str::contains(url()->current(),'/countries')) kt-menu__item--active @endif" 
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.others.countries.index') }}"
                                                class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Quốc gia</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item
                                            @if (Str::contains(url()->current(),'/brands')) kt-menu__item--active @endif"  
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.others.brands.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Nhãn hiệu</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item 
                                            @if (Str::contains(url()->current(),'/sizes')) kt-menu__item--active @endif" 
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.others.sizes.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Dung tích</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="#" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Hình nền</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="#" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Giới thiệu</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Người dùng -->
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('manager.users.index') }}"
                                class="kt-menu__link "><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg></span><span class="kt-menu__link-text">Người dùng</span></a>
                            </li>


                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Đơn hàng - Thống kê</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            {{-- <li class="kt-menu__item  kt-menu__item--submenu 
                                @if (Str::contains(url()->current(), 'products')) kt-menu__item--active kt-menu__item--open @endif"
                                aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                    class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
                                                <path
                                                    d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg></span><span class="kt-menu__link-text">aaaaaaaaaaaaa</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item 
                                            @if (Str::contains(url()->current(),'/categories')) kt-menu__item--active @endif" 
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.products.categories.index') }}"
                                                class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Loại sản phẩm</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item
                                            @if (Str::contains(url()->current(),'/sub_categories')) kt-menu__item--active @endif"  
                                            aria-haspopup="true">
                                            <a href="{{ route('manager.products.sub_categories.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Loại sản phẩm con</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item 
                                        @if (!(Str::between(url()->current(),'products','sub_categories') && Str::between(url()->current(),'products' ,'categories')))
                                            kt-menu__item--active @endif" aria-haspopup="true">
                                            <a href="{{ route('manager.products.index') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Sản phẩm</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}

                            <!-- Hóa đơn -->
                            <li class="kt-menu__item 
                            @if (Str::contains(url()->current(), '/bills')) kt-menu__item--active @endif" aria-haspopup="true"><a href="{{ route('manager.bills.index') }}"
                                class="kt-menu__link "><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg></span><span class="kt-menu__link-text">Đơn hàng</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin:: Header Menu -->

                    <!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        
                    </div>

                    <!-- end:: Header Menu -->

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">

                

                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                    <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::user()->name }}</span>
                                    {{-- <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" /> --}}

                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <span
                                        class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ Str::upper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                            </div>
                            <div
                                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                                    style="background-image: url(assets/media/misc/bg-1.jpg)">
                                    <div class="kt-user-card__avatar">
                                        <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />

                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span
                                            class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ Str::upper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="kt-user-card__name">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="kt-user-card__badge">
                                        {{-- <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span> --}}
                                    </div>
                                </div>

                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">

                                    <div class="kt-notification__custom kt-space-between">
                                        <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form> 
                                    </div>
                                </div>

                                <!--end: Navigation -->
                            </div>
                        </div>

                        <!--end: User Bar -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>

                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <!-- begin:: Breadcrumbs -->

                            @yield('breadcrumbs')

                            <!-- end:: Breadcrumbs -->
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <!--Begin:: Main -->

                        @yield('main')

                        <!--End:: Main -->
                    </div>

                    <!-- end:: Content -->
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank"
                                class="kt-link">Keenthemes</a>
                        </div>
                        <div class="kt-footer__menu">
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="kt-footer__menu-link kt-link">About</a>
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="kt-footer__menu-link kt-link">Team</a>
                            <a href="http://keenthemes.com/metronic" target="_blank"
                                class="kt-footer__menu-link kt-link">Contact</a>
                        </div>
                    </div>
                </div>

                <!-- end:: Footer -->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Quick Panel -->
    <div id="kt_quick_panel" class="kt-quick-panel">
        <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
        <div class="kt-quick-panel__nav">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x"
                role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications"
                        role="tab">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
                </li>
            </ul>
        </div>
        <div class="kt-quick-panel__content">
            <div class="tab-content">
                <div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
                    <div class="kt-notification">
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-line-chart kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New order has been received
                                </div>
                                <div class="kt-notification__item-time">
                                    2 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-box-1 kt-font-brand"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New customer is registered
                                </div>
                                <div class="kt-notification__item-time">
                                    3 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-chart2 kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    Application has been approved
                                </div>
                                <div class="kt-notification__item-time">
                                    3 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-image-file kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New file has been uploaded
                                </div>
                                <div class="kt-notification__item-time">
                                    5 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-drop kt-font-info"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New user feedback received
                                </div>
                                <div class="kt-notification__item-time">
                                    8 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    System reboot has been successfully completed
                                </div>
                                <div class="kt-notification__item-time">
                                    12 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-favourite kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New order has been placed
                                </div>
                                <div class="kt-notification__item-time">
                                    15 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item kt-notification__item--read">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-safe kt-font-primary"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    Company meeting canceled
                                </div>
                                <div class="kt-notification__item-time">
                                    19 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-psd kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New report has been received
                                </div>
                                <div class="kt-notification__item-time">
                                    23 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon-download-1 kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    Finance report has been generated
                                </div>
                                <div class="kt-notification__item-time">
                                    25 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon-security kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New customer comment recieved
                                </div>
                                <div class="kt-notification__item-time">
                                    2 days ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-pie-chart kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New customer is registered
                                </div>
                                <div class="kt-notification__item-time">
                                    3 days ago
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
                    <div class="kt-notification-v2">
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon-bell kt-font-brand"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    5 new user generated report
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Reports based on sales
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-box kt-font-danger"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    2 new items submited
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    by Grog John
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon-psd kt-font-brand"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    79 PSD files generated
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Reports based on sales
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-supermarket kt-font-warning"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    $2900 worth producucts sold
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Total 234 items
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon-paper-plane-1 kt-font-success"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    4.5h-avarage response time
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Fostest is Barry
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-information kt-font-danger"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    Database server is down
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    10 mins ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-mail-1 kt-font-brand"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    System report has been generated
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Fostest is Barry
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-hangouts-logo kt-font-warning"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    4.5h-avarage response time
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Fostest is Barry
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings"
                    role="tabpanel">
                    <form class="kt-form">
                        <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Notifications:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--success kt-switch--sm">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_1">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Case Tracking:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--success kt-switch--sm">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_2">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-last form-group-xs row">
                            <label class="col-8 col-form-label">Support Portal:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--success kt-switch--sm">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_2">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                        <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Generate Reports:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--danger">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_3">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Report Export:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--danger">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_3">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-last form-group-xs row">
                            <label class="col-8 col-form-label">Allow Data Collection:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--danger">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_4">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                        <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Member singup:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_5">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--brand">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_5">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-last form-group-xs row">
                            <label class="col-8 col-form-label">Enable Customer Portal:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_6">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end::Quick Panel -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- end::Scrolltop -->

    <!-- begin::Demo Panel -->
    <div id="kt_demo_panel" class="kt-demo-panel">
        <div class="kt-demo-panel__head">
            <h3 class="kt-demo-panel__title">
                Select A Demo

                <!--<small>5</small>-->
            </h3>
            <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
        </div>
        <div class="kt-demo-panel__body">
            <div class="kt-demo-panel__item kt-demo-panel__item--active">
                <div class="kt-demo-panel__item-title">
                    Demo 1
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo1.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo1/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo1/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 2
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo2.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo2/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 3
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo3.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo3/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 4
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo4.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo4/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 5
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo5.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo5/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 6
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo6.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo6/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 7
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo7.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo7/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 8
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo8.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo8/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 9
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo9.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo9/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 10
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo10.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo10/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 11
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo11.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo11/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 12
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo12.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                        <a href="../demo12/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
                            Version</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 13
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo13.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 14
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="assets/media/demos/preview/demo14.jpg" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <a href="https://1.envato.market/EA4JP" target="_blank"
                class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
                Buy Metronic Now!
            </a>
        </div>
    </div>

    <!-- end::Demo Panel -->


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };

    </script>

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
    <script src="assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
    <script src="assets/plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
    <script src="assets/plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
    <script src="assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
    <script src="assets/plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
    <script src="assets/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
    <script src="assets/plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
    <script src="assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
    <script src="assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
    <script src="assets/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
    <script src="assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
    <script src="assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
    <script src="assets/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
    <script src="assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
    <script src="assets/plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
    <script src="assets/plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript">
    </script>
    <script src="assets/plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
    <script src="assets/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

    <!--end:: Vendor Plugins -->
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

    <!--begin:: Vendor Plugins for custom pages -->
    <script src="assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/@fullcalendar/daygrid/main.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/@fullcalendar/google-calendar/main.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/@fullcalendar/interaction/main.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/@fullcalendar/timegrid/main.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/dist/es5/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/source/jquery.flot.stack.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/flot/source/jquery.flot.axislabels.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/js/global/integration/plugins/datatables.init.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-buttons/js/buttons.print.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/jqvmap/dist/jquery.vmap.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>

    <!--end:: Vendor Plugins for custom pages -->

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors(used by this page) -->
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript">
    </script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/dashboard.js" type="text/javascript"></script>

    <!--end::Page Scripts -->
    <script>
        function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function(e) {
						$('#review-img').attr('src', e.target.result);
					}
					
					reader.readAsDataURL(input.files[0]); // convert to base64 string
				}
			}
			function review_img() {
				$("#take-img").change(function() {
					readURL(this);
				});
			}
    </script>

    @stack('scripts')
</body>

<!-- end::Body -->

</html>
