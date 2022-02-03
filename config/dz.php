<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Eclan Laravel'),


    'public' => [
        'favicon' => 'media/img/logo/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Poppins:300,400,500,600,700'
                ]
            ]
        ],
		'global' => [
			'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				'css/style.css',
			],
			'js' => [
				'vendor/global/global.min.js',
				'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
			],
		],
		'pagelevel' => [
			'css' => [
				'dashboard_1' => [
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'unity' => [
					'vendor/jqvmap/css/jqvmap.min.css',
					'vendor/chartist/css/chartist.min.css',
					'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'viz' => [
					'vendor/jqvmap/css/jqvmap.min.css',
					'vendor/chartist/css/chartist.min.css',
					'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'analytics' => [
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				 'compaign' => [
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'new_compaign' => [
							'vendor/tagcomplete/tagcomplete.css',
							'vendor/nouislider/nouislider.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'social_network_campaign' => [
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'spendings' => [
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/datatables/css/jquery.dataTables.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'app_calender' => [
							'vendor/fullcalendar/css/fullcalendar.min.css',
				],
				'app_profile' => [
							'',
				],
				'chart_chartist' => [
							'vendor/chartist/css/chartist.min.css',
				],
				'chart_chartjs' => [
				],
				'chart_flot' => [
							'',
				],
				'chart_morris' => [
							'vendor/morris/morris.css',
				],
				'chart_peity' => [
							'',
				],
				'chart_sparkline' => [
							'',
				],
				'ecom_checkout' => [
							'',
				],
				'ecom_customers' => [
							'',
				],
				'ecom_invoice' => [
							'',
				],
				'ecom_product_detail' => [
							'',
				],
				'ecom_product_grid' => [
							'',
				],
				'ecom_product_list' => [
							'',
				],
				'ecom_product_order' => [
							'',
				],
				'email_compose' => [
							'vendor/dropzone/dist/dropzone.css',
				],
				'email_inbox' => [
							'',
				],
				'email_read' => [
							'',
				],
				'form_editor_summernote' => [
							'vendor/summernote/summernote.css',
				],
				'form_element' => [
							'',
				],
				'form_pickers' => [
							'vendor/bootstrap-daterangepicker/daterangepicker.css',
							'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
							'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
							'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
							'vendor/pickadate/themes/default.css',
							'vendor/pickadate/themes/default.date.css',
				],
				'form_validation_jquery' => [
							'',
				],
				'form_wizard' => [
							'vendor/jquery-steps/css/jquery.steps.css',
				],
				'map_jqvmap' => [
							'vendor/jqvmap/css/jqvmap.min.css',
				],
				'table_bootstrap_basic' => [
							'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'table_datatable_basic' => [
							'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'uc_nestable' => [
							'vendor/nestable2/css/jquery.nestable.min.css',
				],
				'uc_noui_slider' => [
							'vendor/nouislider/nouislider.min.css',
				],
				'uc_select2' => [
							'vendor/select2/css/select2.min.css',
				],
				'uc_sweetalert' => [
							'vendor/sweetalert2/dist/sweetalert2.min.css',
				],
				'uc_toastr' => [
							'vendor/toastr/css/toastr.min.css',
				],
				'ui_accordion' => [
							'',
				],
				'ui_alert' => [
							'',
				],
				'ui_badge' => [
							'',
				],
				'ui_button' => [
							'',
				],
				'ui_button_group' => [
							'',
				],
				'ui_card' => [
							'',
				],
				'ui_carousel' => [
							'',
				],
				'ui_dropdown' => [
							'',
				],
				'ui_grid' => [
							'',
				],
				'ui_list_group' => [
							'',
				],
				'ui_media_object' => [
							'',
				],
				'ui_modal' => [
							'',
				],
				'ui_pagination' => [
							'',
				],
				'ui_popover' => [
							'',
				],
				'ui_progressbar' => [
							'',
				],
				'ui_tab' => [
							'',
				],
				'ui_typography' => [
							'',
				],
				'widget_basic' => [
							'vendor/chartist/css/chartist.min.css',
				],
			],
			'js' => [
				'dashboard_1' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/waypoints/jquery.waypoints.min.js',
					'vendor/jquery.counterup/jquery.counterup.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/peity/jquery.peity.min.js',
					'js/dashboard/dashboard-1.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				'viz' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/peity/jquery.peity.min.js',
					'js/dashboard/compaign.js',
					'js/custom.min.js',
					'js/deznav-init.js',
					'js/app.js',
				],
				'unity' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/peity/jquery.peity.min.js',
					'js/dashboard/compaign.js',
					'js/custom.min.js',
					'js/deznav-init.js',
					'js/app.js',
				],
				'analytics' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/analytics.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				 'compaign' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/peity/jquery.peity.min.js',
					'js/dashboard/compaign.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				'new_compaign' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/tagcomplete/tagcomplete.js',
							'vendor/nouislider/nouislider.min.js',
							'vendor/wnumb/wNumb.js',
							'js/dashboard/new-compaign.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'social_network_campaign' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/peity/jquery.peity.min.js',
							'js/dashboard/social-network-sampaign.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'spendings' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'app_calender' => [
							'vendor/jqueryui/js/jquery-ui.min.js',
							'vendor/moment/moment.min.js',
							'vendor/fullcalendar/js/fullcalendar.min.js',
							'js/plugins-init/fullcalendar-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'app_profile' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_chartist' => [
							'vendor/chartist/js/chartist.min.js',
							'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
							'js/plugins-init/chartist-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_chartjs' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'js/plugins-init/chartjs-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_flot' => [
							'vendor/flot/jquery.flot.js',
							'vendor/flot/jquery.flot.pie.js',
							'vendor/flot/jquery.flot.resize.js',
							'vendor/flot-spline/jquery.flot.spline.min.js',
							'js/plugins-init/flot-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_morris' => [
							'vendor/morris/raphael-min.js',
							'vendor/morris/morris.min.js',
							'js/plugins-init/morris-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_peity' => [
							'vendor/peity/jquery.peity.min.js',
							'js/plugins-init/piety-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',

				],
				'chart_sparkline' => [
							'vendor/jquery-sparkline/jquery.sparkline.min.js',
							'js/plugins-init/sparkline-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_checkout' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_customers' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_invoice' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_detail' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_grid' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_list' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_order' => [
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'email_compose' => [
							'vendor/dropzone/dist/dropzone.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'email_inbox' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'email_read' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_editor_summernote' => [
							'vendor/summernote/js/summernote.min.js',
							'js/plugins-init/summernote-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_element' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_pickers' => [
							'vendor/moment/moment.min.js',
							'vendor/bootstrap-daterangepicker/daterangepicker.js',
							'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
							'vendor/jquery-asColor/jquery-asColor.min.js',
							'vendor/jquery-asGradient/jquery-asGradient.min.js',
							'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
							'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
							'vendor/pickadate/picker.js',
							'vendor/pickadate/picker.time.js',
							'vendor/pickadate/picker.date.js',
							'js/plugins-init/bs-daterange-picker-init.js',
							'js/plugins-init/clock-picker-init.js',
							'js/plugins-init/jquery-asColorPicker.init.js',
							'js/plugins-init/material-date-picker-init.js',
							'js/plugins-init/pickadate-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_validation_jquery' => [
							'vendor/jquery-validation/jquery.validate.min.js',
							'js/plugins-init/jquery.validate-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_wizard' => [
							'vendor/jquery-steps/build/jquery.steps.min.js',
							'vendor/jquery-validation/jquery.validate.min.js',
							'js/plugins-init/jquery.validate-init.js',
							'js/plugins-init/jquery-steps-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'map_jqvmap' => [
							'vendor/jqvmap/js/jquery.vmap.min.js',
							'vendor/jqvmap/js/jquery.vmap.world.js',
							'vendor/jqvmap/js/jquery.vmap.usa.js',
							'js/plugins-init/jqvmap-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_400' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_403' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_404' => [
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_500' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_error_503' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_forgot_password' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_lock_screen' => [
            'vendor/deznav/deznav.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_login' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_register' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'table_bootstrap_basic' => [
            'vendor/datatables/js/jquery.dataTables.min.js',
            'js/plugins-init/datatables.init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'table_datatable_basic' => [
            'vendor/chart.js/Chart.bundle.min.js',
            'vendor/apexchart/apexchart.js',
            'vendor/datatables/js/jquery.dataTables.min.js',
            'js/plugins-init/datatables.init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_nestable' => [
            'vendor/nestable2/js/jquery.nestable.min.js',
            'js/plugins-init/nestable-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_noui_slider' => [
            'vendor/nouislider/nouislider.min.js',
            'vendor/wnumb/wNumb.js',
            'js/plugins-init/nouislider-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_select2' => [
            'vendor/select2/js/select2.full.min.js',
            'js/plugins-init/select2-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_sweetalert' => [
            'vendor/sweetalert2/dist/sweetalert2.min.js',
            'js/plugins-init/sweetalert.init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_toastr' => [
            'vendor/toastr/js/toastr.min.js',
            'js/plugins-init/toastr-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_accordion' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_alert' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_badge' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_button' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_button_group' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_card' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_carousel' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_dropdown' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_grid' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_list_group' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_media_object' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_modal' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_pagination' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_popover' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_progressbar' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_tab' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_typography' => [
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'widget_basic' => [
            'vendor/chartist/js/chartist.min.js',
            'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
            'vendor/flot/jquery.flot.js',
            'vendor/flot/jquery.flot.pie.js',
            'vendor/flot/jquery.flot.resize.js',
            'vendor/flot-spline/jquery.flot.spline.min.js',
            'vendor/jquery-sparkline/jquery.sparkline.min.js',
            'js/plugins-init/sparkline-init.js',
            'vendor/peity/jquery.peity.min.js',
            'js/plugins-init/piety-init.js',
            'vendor/chart.js/Chart.bundle.min.js',
            'js/plugins-init/widgets-script-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				]
					
			]
		],
	]
];
