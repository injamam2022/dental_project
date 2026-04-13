<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*-------Start Adv Tour Package Routers---------*/

$route['add-tour-package'] = 'tour/index';
$route['add-tour-packages/:any'] = 'tour/index';
$route['add-package-image/:any'] = 'tour/add_package_image';
$route['add-package-city-information/:any'] = 'tour/add_package_city_information';
$route['add-package-hotel-information/:any'] = 'tour/add_package_hotel_information';
$route['add-sightseeing-information/:any'] = 'tour/add_package_sightseeing_information';
$route['add-package-transport-information/:any'] = 'tour/add_package_transport_information';
$route['add-package-transport-remove/:any/:any'] = 'tour/add_package_transport_remove';
$route['add-package-itinerary-information/:any'] ='tour/add_package_itinerary_information';
$route['add-package-price-information/:any'] ='tour/add_package_price_information';
$route['add-package-policy-information/:any'] ='tour/add_package_policy_information';
$route['delete-single-package/:any'] ='tour/delete_single_package';
$route['Deactive-Active-package/:any'] ='tour/Deactive_Active_package';
$route['tour-package-list'] = 'tour/tour_package_list';
$route['tour-categories-list'] = 'tour/tour_categories_list';
$route['add-tour-categories'] = 'tour/add_tour_categories';
$route['tour-package-booking-list'] = 'tour/tour_package_booking_list';
$route['delete-all-categories'] = 'tour/tour_categories_delete_all';
$route['delete-single-categories/:any'] = 'tour/tour_categories_delete_single';
$route['edit-tour-categories/:any'] = 'tour/edit_tour_categories';
$route['amenities-list'] = 'tour/amenities_list';
$route['ui-icon'] = 'tour/ui_icon';
$route['delete-all-amenities'] = 'tour/delete_all_amenities';
$route['edit-amenities/:any'] = 'tour/edit_amenities';
$route['package-setting'] = 'tour/package_settings';
$route['Package-query'] = 'tour/Package_query';
$route['edit-package-setting'] = 'tour/edit_package_settings';
$route['delete-all-thems-selected'] = 'tour/delete_all_amenities_list_selected';
$route['delete-select-insclusion'] = 'tour/delete_select_insclusion';
$route['delete-select-exclusion'] = 'tour/delete_select_exclusion';
$route['delete-all-booking'] = 'tour/delete_all_booking';
$route['package-show-by-categories'] = 'tour/packageshow_by_category';
$route['tour-show-by-cat/:any'] = 'tour/packageshow_by_cate_list';

/*-------End Adv Tour Package Routers---------*/
/*-------Start Adv Tour Hotel Management Routers---------*/
$route['add-hotel'] = 'tour_hotel/index';
$route['hotel-booking-list'] = 'tour_hotel/hotel_booking_list';
$route['hotel-list'] = 'tour_hotel/hotel_list';
$route['edit-hotel'] = 'tour_hotel/edit_hotel';
$route['edit-hotel/:any'] = 'tour_hotel/edit_hotel';
$route['delete-all-hotel'] = 'tour_hotel/delete_all_hotel';
$route['delete-all-hotel-booking-list'] = 'tour_hotel/delete_all_hotel_booking_list';
$route['delete-single-hotel'] = 'tour_hotel/delete_all_hotel';
$route['delete-single-hotel/:any'] = 'tour_hotel/delete_single_hotel';
$route['delete-single-hotel-booking-list/:any'] = 'tour_hotel/delete_single_hotel_booking_list';
$route['hotel-setting'] = 'tour_hotel/hotel_setting';
$route['edit-hotel-setting'] = 'tour_hotel/edit_hotel_setting';
/*-------End Adv Tour Hotel Management Routers---------*/

$route['online-payment']='agent/online_payment';



