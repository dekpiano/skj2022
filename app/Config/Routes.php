<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ConHome');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'ConHome::index');
$routes->get('About/(:any)', 'ConAboutSchool::AboutDetail/$1');

$routes->match(['get', 'post'],'News', 'ConNews::NewsMain');
$routes->get('News/Detail/(:any)', 'ConNews::NewsDetail/$1');
$routes->match(['get', 'post'],'News/loadMoreNews', 'ConNews::loadMoreNews');
$routes->match(['get', 'post'],'CountReadNews','ConNews::NewsCountRead');
$routes->get('pr', 'ConNews::pr');

$routes->get('Personnal/(:any)/(:any)','ConPersonnal::PersonnalMain/$1/$2');

$routes->get('Contact', 'ConContact::index');
$routes->get('PageGroup', 'ConHome::PageGroup');
$routes->get('guidance', 'ConGuidance::index');
$routes->get('Course', 'ConCourse::index');
$routes->get('Yearbook', 'ConYearbook::index');
$routes->get('Email', 'ConEmail::index');
$routes->get('Procurements', 'ConProcurements::index');
// Login admin
$routes->match(['get', 'post'], 'Login/LoginAdmin', 'ConLogin::LoginAdmin');
$routes->get('Admin/Dashboard', 'ConAdminDashboard::index');
// Login admin for Google
$routes->get('SkjMain/googleLogin', 'ConLogin::googleLogin');
$routes->get('SkjMain/googleCallback', 'ConLogin::googleCallback');
// Logout
$routes->get('logout', 'ConLogin::LogoutAdmin');

//Admin News
$routes->get('Admin/News','ConAdminNews::NewsMain');
$routes->match(['get', 'post'], 'Admin/News/AddNews', 'ConAdminNews::NewsAdd');
$routes->match(['get', 'post'], 'Admin/News/Add/NewsFeacbook', 'ConAdminNews::NewsAddFeacbook');
$routes->match(['get', 'post'], 'Admin/News/EditNews', 'ConAdminNews::NewsEdit');
$routes->match(['get', 'post'], 'Admin/News/UpdateNews', 'ConAdminNews::NewsUpdate');
$routes->match(['get', 'post'], 'Admin/News/DeleteNews', 'ConAdminNews::NewsDelete');
$routes->match(['get', 'post'], 'Admin/News/View/Facebook', 'ConAdminNews::ViewNewsFormFacebook');
$routes->match(['get', 'post'], 'Admin/News/Select/Facebook', 'ConAdminNews::SelectNewsFormFacebook');
// Admin Banner
$routes->get('Admin/Banner','ConAdminBanner::BannerMain');
$routes->post('Admin/Banner/BannerOnoff','ConAdminBanner::BannerOnoff');
$routes->match(['get', 'post'], 'Admin/banner/Addbanner', 'ConAdminBanner::BannerAdd');
$routes->match(['get', 'post'], 'Admin/banner/DeleteBanner', 'ConAdminBanner::BannerDelete');

//Admin About
$routes->match(['get', 'post'], 'Admin/AboutSchool/Detail/(:any)', 'ConAdminAboutSchool::AboutSchoolDetail/$1');
$routes->match(['get', 'post'], 'Admin/AboutSchool/Edit/(:any)', 'ConAdminAboutSchool::AboutSchoolEdit/$1');
$routes->match(['get', 'post'], 'Admin/AboutSchool/Update/(:any)', 'ConAdminAboutSchool::AboutSchoolUpdate/$1');
// 

/*

 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
