<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Recurring</title>
		<meta name="description" content="Login Page">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<!--end::Fonts -->

		<!--begin::Global Theme Styles(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<link href="{{asset('public/assets/admin/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/quill/dist/quill.snow.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/@yaireo/tagify/dist/tagify.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/dual-listbox/dist/dual-listbox.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/socicon/css/socicon.css')}}/" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/plugins/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/plugins/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/plugins/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Vendor Plugins -->
		<link href="{{asset('public/assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--begin:: Vendor Plugins for custom pages -->
		<link href="{{asset('public/assets/admin/plugins/custom/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/@fullcalendar/core/main.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/@fullcalendar/daygrid/main.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/@fullcalendar/list/main.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/@fullcalendar/timegrid/main.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/jstree/dist/themes/default/style.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/jqvmap/dist/jqvmap.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/plugins/custom/uppy/dist/uppy.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/css/bootstrap-coloroicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('public/assets/admin/css/custom_style.css')}}" rel="stylesheet" type="text/css" />
         
		<!--end:: Vendor Plugins for custom pages -->

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
          
		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{asset('public/assets/admin/media/logos/favicon.ico')}}" />
		<link rel="stylesheet" href="{{asset('public/assets/admin/datatables/css/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/admin/datatables/css/jquery.dataTables.min.css')}}">
		
		<link href="{{ asset('public/assets/admin/css/product.css')}}" rel="stylesheet">
        <style>
		div#kt_content { margin-top: 25px; }
        </style>
        @yield('styles')
		
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
	
	<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{ route('admin.dashboard') }}">
					<img alt="Logo" src="{{asset('public/assets')}}/admin/media/logos/admin-logo.png" style="max-width: 140px;"/>
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<div class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></div>
				<div class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></div>
			</div>
		</div>
		<!-- end:: Header Mobile -->
		
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav">
							
								<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ route('admin.dashboard') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Dashboard</span></a></li>								
								
								<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text">Customers</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">										    
											<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ route('admin.customers') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Customers</span></a>
											</li>
											<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ route('admin.add_customers') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Add Customer</span></a>
											</li>																				
										</ul>
									</div>
								</li>
								
								
								<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-file"></i><span class="kt-menu__link-text">Category</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">										    
											<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ route('admin.category') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Category</span></a>
											</li>
											<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ route('admin.add_category') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Add category</span></a>
											</li>																				
										</ul>
									</div>
								</li>

                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-file"></i><span class="kt-menu__link-text">Items</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">										    
											<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ route('admin.items') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Items</span></a>
											</li>
											<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ route('admin.add_item') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Add New Item</span></a>
											</li>																				
										</ul>
									</div>
								</li>									


                                
								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true"><a href="{{ route('admin.Generate_bill') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-file"></i><span class="kt-menu__link-text">Generate Bill</span></a></li>
								
                                <li class="kt-menu__item  kt-menu__item" aria-haspopup="true"><a href="{{ route('admin.payment') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-file"></i><span class="kt-menu__link-text">Payment</span></a></li>	
								
                                <li class="kt-menu__item  kt-menu__item" aria-haspopup="true"><a href="{{ route('admin.order_history') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-file"></i><span class="kt-menu__link-text">Order History</span></a></li>									
								

								
								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true"><a href="{{ route('admin.logout') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-logout"></i><span class="kt-menu__link-text">Logout</span></a></li>
								
							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

						<!-- begin:: Aside -->
						<div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
							<div class="kt-header__brand-logo">
								<a href="{{ route('admin.dashboard') }}">
									<img alt="Logo" src="{{ asset('public/assets/admin/media/logos/admin-logo.png')}}" style="max-width: 100px;"/>
								</a>
							</div>
						</div>

						<!-- end:: Aside -->

						<!-- begin:: Title -->
						<h3 class="kt-header__title kt-grid__item">
							Welcome Back! 
						</h3>
                         <div class="logout-btn"><a href="{{ route('admin.logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">Log out</a></div>
						<!-- end:: Title -->
						
						<!-- begin: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper" style="opacity: 1;">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								<ul class="kt-menu__nav ">
																																	
								</ul>
							</div>
						</div>
						<!-- end: Header Menu -->
						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Quick panel toggler -->
							<div class="kt-header__topbar-item kt-header__topbar-item--quickpanel" data-toggle="kt-tooltip" title="" data-placement="top" data-original-title="Quick panel">
								<div class="kt-header__topbar-wrapper">
									<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-cube-1"></i></span>
								</div>
							</div>

							<!--end: Quick panel toggler -->
						</div>

						<!-- end:: Header Topbar -->
					</div>
					<!-- end:: Header -->
					
					@yield('content')
					<!-- begin:: Footer -->
					<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								
							</div>
							<div class="kt-footer__menu">
								Recurring | Copyright © <?= date('Y')?>
							</div>
						</div>
					</div>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>
		<!-- end:: Page -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#22b9ff",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<script src="{{ asset('public/assets/admin/plugins/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/dropzone.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/quill/dist/quill.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/@yaireo/tagify/dist/tagify.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/jquery-validation.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/dual-listbox/dist/dual-listbox.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/raphael/raphael.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/morris.js/morris.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/plugins/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/js/global/integration/plugins/sweetalert2.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

		<!--end:: Vendor Plugins -->
		<script src="{{ asset('public/assets/admin/js/scripts.bundle.js') }}" type="text/javascript"></script>

		<!--begin:: Vendor Plugins for custom pages -->
		<script src="{{ asset('public/assets/admin/plugins/custom/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/@fullcalendar/core/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/@fullcalendar/daygrid/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/@fullcalendar/google-calendar/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/@fullcalendar/interaction/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/@fullcalendar/list/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/@fullcalendar/timegrid/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/dist/es5/jquery.flot.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/source/jquery.flot.resize.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/source/jquery.flot.categories.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/source/jquery.flot.pie.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/source/jquery.flot.stack.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/source/jquery.flot.crosshair.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/flot/source/jquery.flot.axislabels.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/js/global/integration/plugins/datatables.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jszip/dist/jszip.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-buttons/js/buttons.colVis.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-buttons/js/buttons.flash.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-buttons/js/buttons.html5.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-buttons/js/buttons.print.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/datatables.net-select/js/dataTables.select.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jstree/dist/jstree.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jqvmap/dist/jquery.vmap.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
		
		<script src="{{ asset('public/assets/admin/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
		<script src="{{ asset('public/assets/admin/plugins/custom/uppy/dist/uppy.min.js') }}" type="text/javascript"></script>

		<!--end:: Vendor Plugins for custom pages -->

		<!--end::Global Theme Bundle -->
		
        @yield('scripts')    
		
	     <!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
