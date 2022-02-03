<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', 'App\Http\Controllers\EclanadminController@dashboard_1');
Route::get('/index', 'App\Http\Controllers\EclanadminController@dashboard_1');
Route::get('/analytics', 'App\Http\Controllers\EclanadminController@analytics');
Route::get('/compaign', 'App\Http\Controllers\EclanadminController@compaign');
Route::get('/new-compaign', 'App\Http\Controllers\EclanadminController@new_compaign');
Route::get('/social-network-campaign', 'App\Http\Controllers\EclanadminController@social_network_campaign');
Route::get('/spendings', 'App\Http\Controllers\EclanadminController@spendings');
Route::get('/app-calender', 'App\Http\Controllers\EclanadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\EclanadminController@app_profile');
Route::get('/chart-chartist', 'App\Http\Controllers\EclanadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\EclanadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\EclanadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\EclanadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\EclanadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\EclanadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\EclanadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\EclanadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\EclanadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\EclanadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\EclanadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\EclanadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\EclanadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\EclanadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\EclanadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\EclanadminController@email_read');
Route::get('/form-editor-summernote', 'App\Http\Controllers\EclanadminController@form_editor_summernote');
Route::get('/form-element', 'App\Http\Controllers\EclanadminController@form_element');
Route::get('/form-pickers', 'App\Http\Controllers\EclanadminController@form_pickers');
Route::get('/form-validation-jquery', 'App\Http\Controllers\EclanadminController@form_validation_jquery');
Route::get('/form-wizard', 'App\Http\Controllers\EclanadminController@form_wizard');
Route::get('/map-jqvmap', 'App\Http\Controllers\EclanadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\EclanadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\EclanadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\EclanadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\EclanadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\EclanadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\EclanadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\EclanadminController@page_lock_screen');
Route::get('/page-login', 'App\Http\Controllers\EclanadminController@page_login');
Route::get('/page-register', 'App\Http\Controllers\EclanadminController@page_register');
Route::get('/table-bootstrap-basic', 'App\Http\Controllers\EclanadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'App\Http\Controllers\EclanadminController@table_datatable_basic');
Route::get('/uc-nestable', 'App\Http\Controllers\EclanadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\EclanadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\EclanadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\EclanadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\EclanadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\EclanadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\EclanadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\EclanadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\EclanadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\EclanadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\EclanadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\EclanadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\EclanadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\EclanadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\EclanadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\EclanadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\EclanadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\EclanadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\EclanadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\EclanadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\EclanadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\EclanadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\EclanadminController@widget_basic');


Route::get('/unity', 'App\Http\Controllers\UnityController@get');
Route::get('/viz', 'App\Http\Controllers\VizController@get');