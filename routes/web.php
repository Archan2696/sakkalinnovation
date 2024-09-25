<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Adminlogincontroller;

use App\Http\Controllers\Admin\Admincontroller;

use App\Http\Controllers\Admin\Homecontroller;

use App\Http\Controllers\Admin\Aboutcontroller;

use App\Http\Controllers\Admin\Contactcontroller;

use App\Http\Controllers\Admin\Servicecontroller;

use App\Http\Controllers\Admin\Portfoliocontroller;

use App\Http\Controllers\Admin\HeaderFootercontroller;

use App\Http\Controllers\Admin\PriceController;

use App\Http\Controllers\Admin\Policycontroller;

use App\Http\Controllers\Admin\BlogController;

use App\Http\Controllers\FrontController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('route:clear');
//     Artisan::call('view:clear');
//     return 'Cache cleared';
// });


Route::get('/',[FrontController::class, 'index']);

Route::get('/about',[FrontController::class, 'about']);

Route::get('/services',[FrontController::class, 'services']);

Route::get('/portfolio',[FrontController::class, 'portfolio']);

Route::get('/price',[FrontController::class, 'price']);

Route::get('/contact',[FrontController::class, 'contact']);

Route::post('/getContactData',[FrontController::class, 'getContactData']);

Route::get('/privacy',[FrontController::class, 'privacy']);

Route::get('/terms',[FrontController::class, 'terms']);

Route::get('/blog',[FrontController::class, 'blog']);

Route::get('/blog_detail/{id}',[FrontController::class, 'blog_detail']);

Route::post('/load-blog',[Frontcontroller::class, 'loadBlog']);

Route::prefix('admin')->group(function(){  
    Route::get('/login',[Adminlogincontroller::class, 'login']);
    Route::post('/login',[Adminlogincontroller::class, 'authenticate'])->name('login');
    Route::get('/logout',[Adminlogincontroller::class, 'logout'])->name('adminlogout');
    Route::get('/forgetpasswordview',[Adminlogincontroller::class, 'forgetpasswordview'])->name('forgetpasswordview');
    Route::post('/resetpasswordlink',[Adminlogincontroller::class, 'resetpasswordlink'])->name('resetpasswordlink');
    Route::get('/resetpasswordview/{id}',[Adminlogincontroller::class, 'resetpasswordview'])->name('resetpasswordview');
    Route::post('/resetpassword/{id}',[Adminlogincontroller::class, 'resetpassword'])->name('resetpassword');
    Route::get('/changepassword',[Admincontroller::class, 'changepassword']);
    Route::post('/updatepassword/{id}',[Admincontroller::class, 'updatepassword']);
    Route::get('/edit_profile',[Admincontroller::class, 'edit_profile']);
    Route::post('/store_edit_profile',[Admincontroller::class, 'store_edit_profile']);
    Route::get('/home',[Admincontroller::class, 'home']);


    /*HomeController        HomeController        HomeController        HomeController        HomeController        HomeController        HomeController        */

    

    Route::get('/home_banner',[Homecontroller::class, 'home_banner']);
    Route::get('/add_home_banner_data/{id}',[Homecontroller::class, 'add_home_banner_data']);
    Route::post('/store_add_home_banner_data/{id}',[Homecontroller::class, 'store_add_home_banner_data']);
    Route::get('/delete_home_banner/{id}',[Homecontroller::class, 'delete_home_banner']);


    Route::get('/home_service',[Homecontroller::class, 'home_service']);
    Route::get('/update_home_service_description_data/{id}',[Homecontroller::class, 'update_home_service_description_data']);
    Route::post('/store_update_home_service_description_data/{id}',[Homecontroller::class, 'store_update_home_service_description_data']);
    Route::get('/add_home_service_data/{id}',[Homecontroller::class, 'add_home_service_data']);
    Route::post('/store_add_home_service_data/{id}',[Homecontroller::class, 'store_add_home_service_data']);
    Route::get('/delete_home_service/{id}',[Homecontroller::class, 'delete_home_service']);

    Route::get('/home_about',[Homecontroller::class, 'home_about']);
    Route::get('/update_home_about_description_data/{id}',[Homecontroller::class, 'update_home_about_description_data']);
    Route::post('/store_update_home_about_description_data/{id}',[Homecontroller::class, 'store_update_home_about_description_data']);
    Route::get('/add_home_about_data/{id}',[Homecontroller::class, 'add_home_about_data']);
    Route::post('/store_add_home_about_data/{id}',[Homecontroller::class, 'store_add_home_about_data']);
    Route::get('/delete_home_about/{id}',[Homecontroller::class, 'delete_home_about']);

    Route::get('/what_we_do',[Homecontroller::class, 'what_we_do']);
    Route::get('/add_what_we_do_data/{id}',[Homecontroller::class, 'add_what_we_do_data']);
    Route::post('/store_add_what_we_do_data/{id}',[Homecontroller::class, 'store_add_what_we_do_data']);
    Route::get('/delete_what_we_do/{id}',[Homecontroller::class, 'delete_what_we_do']);

    Route::get('/team',[Homecontroller::class, 'team']);
    Route::get('/update_team_description_data/{id}',[Homecontroller::class, 'update_team_description_data']);
    Route::post('/store_update_team_description_data/{id}',[Homecontroller::class, 'store_update_team_description_data']);
    Route::get('/add_team_data/{id}',[Homecontroller::class, 'add_team_data']);
    Route::post('/store_add_team_data/{id}',[Homecontroller::class, 'store_add_team_data']);
    Route::get('/delete_team/{id}',[Homecontroller::class, 'delete_team']);
    Route::get('/add_social_url_data/{id}',[Homecontroller::class, 'add_social_url_data']);
    Route::post('/store_add_social_url_data/{id}',[Homecontroller::class, 'store_add_social_url_data']);

    Route::get('/faq',[Homecontroller::class, 'faq']);
    Route::get('/update_faq_description_data/{id}',[Homecontroller::class, 'update_faq_description_data']);
    Route::post('/store_update_faq_description_data/{id}',[Homecontroller::class, 'store_update_faq_description_data']);
    Route::get('/add_faq_data/{id}',[Homecontroller::class, 'add_faq_data']);
    Route::post('/store_add_faq_data/{id}',[Homecontroller::class, 'store_add_faq_data']);
    Route::get('/delete_faq/{id}',[Homecontroller::class, 'delete_faq']);

    Route::get('/review',[Homecontroller::class, 'review']);
    Route::get('/update_review_description_data/{id}',[Homecontroller::class, 'update_review_description_data']);
    Route::post('/store_update_review_description_data/{id}',[Homecontroller::class, 'store_update_review_description_data']);
    Route::get('/add_review_data/{id}',[Homecontroller::class, 'add_review_data']);
    Route::post('/store_add_review_data/{id}',[Homecontroller::class, 'store_add_review_data']);
    Route::get('/delete_review/{id}',[Homecontroller::class, 'delete_review']);

    Route::get('/recent_news_description',[Homecontroller::class, 'recent_news_description']);
    Route::get('/update_recent_news_description_data/{id}',[Homecontroller::class, 'update_recent_news_description_data']);
    Route::post('/store_update_recent_news_description_data/{id}',[Homecontroller::class, 'store_update_recent_news_description_data']);






    /*AboutController          AboutController          AboutController          AboutController          AboutController          AboutController */   




    Route::get('/about_banner',[Aboutcontroller::class, 'about_banner']);

    Route::get('/about',[Aboutcontroller::class, 'about']);
    Route::get('/add_about_data/{id}',[Aboutcontroller::class, 'add_about_data']);
    Route::post('/store_add_about_data/{id}',[Aboutcontroller::class, 'store_add_about_data']);
    Route::get('/delete_about/{id}',[Aboutcontroller::class, 'delete_about']);

    Route::get('/choose_us',[Aboutcontroller::class, 'choose_us']);
    Route::get('/update_choose_us_description_data/{id}',[Aboutcontroller::class, 'update_choose_us_description_data']);
    Route::post('/store_update_choose_us_description_data/{id}',[Aboutcontroller::class, 'store_update_choose_us_description_data']);
    Route::get('/add_choose_us_data/{id}',[Aboutcontroller::class, 'add_choose_us_data']);
    Route::post('/store_add_choose_us_data/{id}',[Aboutcontroller::class, 'store_add_choose_us_data']);
    Route::get('/delete_choose_us/{id}',[Aboutcontroller::class, 'delete_choose_us']);

    Route::get('/about_service',[Aboutcontroller::class, 'about_service']);
    Route::get('/add_about_service_data/{id}',[Aboutcontroller::class, 'add_about_service_data']);
    Route::post('/store_add_about_service_data/{id}',[Aboutcontroller::class, 'store_add_about_service_data']);
    Route::get('/delete_about_service/{id}',[Aboutcontroller::class, 'delete_about_service']);






    /*ServiceController      ServiceController       ServiceController         ServiceController       ServiceController        ServiceController*/




    Route::get('/service_banner',[Servicecontroller::class, 'service_banner']);

    Route::get('/service',[Servicecontroller::class, 'service']);
    Route::get('/update_service_description_data/{id}',[Servicecontroller::class, 'update_service_description_data']);
    Route::post('/store_update_service_description_data/{id}',[Servicecontroller::class, 'store_update_service_description_data']);
    Route::get('/add_service_data/{id}',[Servicecontroller::class, 'add_service_data']);
    Route::post('/store_add_service_data/{id}',[Servicecontroller::class, 'store_add_service_data']);
    Route::get('/delete_service/{id}',[Servicecontroller::class, 'delete_service']);

    Route::get('/facility',[Servicecontroller::class, 'facility']);
    Route::get('/update_facility_description_data/{id}',[Servicecontroller::class, 'update_facility_description_data']);
    Route::post('/store_update_facility_description_data/{id}',[Servicecontroller::class, 'store_update_facility_description_data']);
    Route::get('/add_facility_data/{id}',[Servicecontroller::class, 'add_facility_data']);
    Route::post('/store_add_facility_data/{id}',[Servicecontroller::class, 'store_add_facility_data']);
    Route::get('/delete_facility/{id}',[Servicecontroller::class, 'delete_facility']);


    Route::get('/package_services',[Servicecontroller::class, 'package_services']);
    Route::get('/update_service_packages_description_data/{id}',[Servicecontroller::class, 'update_service_packages_description_data']);
    Route::post('/store_update_service_packages_description_data/{id}',[Servicecontroller::class, 'store_update_service_packages_description_data']);
    Route::get('/add_package_service_data/{id}',[Servicecontroller::class, 'add_package_service_data']);
    Route::post('/store_add_package_service_data/{id}',[Servicecontroller::class, 'store_add_package_service_data']);
    Route::get('/delete_package_service/{id}',[Servicecontroller::class, 'delete_package_service']);






    /*PortfolioController      PortfolioController      PortfolioController       PortfolioController         PortfolioController         PortfolioController*/




    Route::get('/portfolio_banner',[Portfoliocontroller::class, 'portfolio_banner']);

    Route::get('/cta',[Portfoliocontroller::class, 'cta']);
    Route::get('/add_cta_data/{id}',[Portfoliocontroller::class, 'add_cta_data']);
    Route::post('/store_add_cta_data/{id}',[Portfoliocontroller::class, 'store_add_cta_data']);
    Route::get('/delete_cta/{id}',[Portfoliocontroller::class, 'delete_cta']);

    Route::get('/portfolio',[Portfoliocontroller::class, 'portfolio']);
    Route::get('/update_portfolio_description_data/{id}',[Portfoliocontroller::class, 'update_portfolio_description_data']);
    Route::post('/store_update_portfolio_description_data/{id}',[Portfoliocontroller::class, 'store_update_portfolio_description_data']);
    Route::get('/add_portfolio_data/{id}',[Portfoliocontroller::class, 'add_portfolio_data']);
    Route::post('/store_add_portfolio_data/{id}',[Portfoliocontroller::class, 'store_add_portfolio_data']);
    Route::get('/delete_portfolio/{id}',[Portfoliocontroller::class, 'delete_portfolio']);






    /*HeaderFooterController       HeaderFooterController       HeaderFooterController        HeaderFooterController        HeaderFooterController*/




    Route::get('/footer_description',[HeaderFootercontroller::class, 'footer_description']);
    Route::get('/add_footer_description_data/{id}',[HeaderFootercontroller::class, 'add_footer_description_data']);
    Route::post('/store_add_footer_description_data/{id}',[HeaderFootercontroller::class, 'store_add_footer_description_data']);
    Route::get('/delete_footer_description/{id}',[HeaderFootercontroller::class, 'delete_footer_description']);

    Route::get('/add_banner_data/{id}',[HeaderFootercontroller::class, 'add_banner_data']);
    Route::post('/store_add_banner_data/{id}',[HeaderFootercontroller::class, 'store_add_banner_data']);


    Route::get('/social_links',[HeaderFootercontroller::class, 'social_links']);
    Route::get('/add_social_links_data/{id}',[HeaderFootercontroller::class, 'add_social_links_data']);
    Route::post('/store_add_social_links_data/{id}',[HeaderFootercontroller::class, 'store_add_social_links_data']);


    Route::get('/contact_inquiry',[HeaderFootercontroller::class, 'contact_inquiry']);
    Route::get('/delete_contact_inquiry/{id}',[HeaderFootercontroller::class, 'delete_contact_inquiry']);

    /*ContactController         ContactController        ContactController         ContactController           ContactController          ContactController*/



    Route::get('/contact_banner',[Contactcontroller::class, 'contact_banner']);


    Route::get('/contact',[Contactcontroller::class, 'contact']);
    Route::get('/update_contact_description_data/{id}',[Contactcontroller::class, 'update_contact_description_data']);
    Route::post('/store_update_contact_description_data/{id}',[Contactcontroller::class, 'store_update_contact_description_data']);

    Route::get('/form_description',[Contactcontroller::class, 'form_description']);
    Route::get('/add_form_description_data/{id}',[Contactcontroller::class, 'add_form_description_data']);
    Route::post('/store_add_form_description_data/{id}',[Contactcontroller::class, 'store_add_form_description_data']);
    Route::get('/delete_form_description/{id}',[Contactcontroller::class, 'delete_form_description']);

    Route::get('/contact_info',[Contactcontroller::class, 'contact_info']);
    Route::get('/add_contact_info_data/{id}',[Contactcontroller::class, 'add_contact_info_data']);
    Route::post('/store_add_contact_info_data/{id}',[Contactcontroller::class, 'store_add_contact_info_data']);
    Route::get('/delete_contact_info/{id}',[Contactcontroller::class, 'delete_contact_info']);

    
    
    
    Route::get('/contact_map',[Contactcontroller::class, 'contact_map']);
    Route::get('/add_contact_map_data/{id}',[Contactcontroller::class, 'add_contact_map_data']);
    Route::post('/store_add_contact_map_data/{id}',[Contactcontroller::class, 'store_add_contact_map_data']);



    /*PriceController         PriceController         PriceController          PriceController         PriceController         PriceController        PriceController*/




    Route::get('/price_banner',[PriceController::class, 'price_banner']);

    Route::get('/price_description',[PriceController::class, 'price_description']);
    Route::get('/update_price_description_data/{id}',[PriceController::class, 'update_price_description_data']);
    Route::post('/store_update_price_description_data/{id}',[PriceController::class, 'store_update_price_description_data']);
    
        
    Route::get('/price_tab',[PriceController::class, 'price_tab']);
    Route::get('/add_price_tab_data/{id}',[PriceController::class, 'add_price_tab_data']);
    Route::post('/store_add_price_tab_data/{id}',[PriceController::class, 'store_add_price_tab_data']);
    Route::get('/delete_price_tab/{id}',[PriceController::class, 'delete_price_tab']);


    Route::get('/monthly_price',[PriceController::class, 'monthly_price']);
    Route::get('/add_monthly_price_data/{id}',[PriceController::class, 'add_monthly_price_data']);
    Route::post('/store_add_monthly_price_data/{id}',[PriceController::class, 'store_add_monthly_price_data']);
    Route::get('/delete_monthly_price/{id}',[PriceController::class, 'delete_monthly_price']);


    Route::get('/yearly_price',[PriceController::class, 'yearly_price']);
    Route::get('/add_yearly_price_data/{id}',[PriceController::class, 'add_yearly_price_data']);
    Route::post('/store_add_yearly_price_data/{id}',[PriceController::class, 'store_add_yearly_price_data']);
    Route::get('/delete_yearly_price/{id}',[PriceController::class, 'delete_yearly_price']);




    /*Policycontroller         Policycontroller         Policycontroller         Policycontroller         Policycontroller         */

    Route::get('/privacy_banner',[Policycontroller::class, 'privacy_banner']);
    Route::get('/terms_banner',[Policycontroller::class, 'terms_banner']);

    Route::get('/privacy_policy',[Policycontroller::class, 'privacy_policy']);
    Route::get('/add_privacy_policy_data/{id}',[Policycontroller::class, 'add_privacy_policy_data']);
    Route::post('/store_add_privacy_policy_data/{id}',[Policycontroller::class, 'store_add_privacy_policy_data']);
    Route::get('/delete_privacy_policy/{id}',[Policycontroller::class, 'delete_privacy_policy']);


    Route::get('/terms_condition',[Policycontroller::class, 'terms_condition']);
    Route::get('/add_terms_condition_data/{id}',[Policycontroller::class, 'add_terms_condition_data']);
    Route::post('/store_add_terms_condition_data/{id}',[Policycontroller::class, 'store_add_terms_condition_data']);
    Route::get('/delete_terms_condition/{id}',[Policycontroller::class, 'delete_terms_condition']);
    
    
    /*BlogController          BlogController          BlogController          BlogController          BlogController          BlogController */ 


    Route::get('/blog_banner',[BlogController::class, 'blog_banner']);
    Route::get('/blog_detail_banner',[BlogController::class, 'blog_detail_banner']);


    Route::get('/blog',[BlogController::class, 'blog']);
    Route::get('/update_blog_description_data/{id}',[BlogController::class, 'update_blog_description_data']);
    Route::post('/store_update_blog_description_data/{id}',[BlogController::class, 'store_update_blog_description_data']);
    Route::get('/add_blog_data/{id}',[BlogController::class, 'add_blog_data']);
    Route::post('/store_add_blog_data/{id}',[BlogController::class, 'store_add_blog_data']);
    Route::get('/delete_blog/{id}',[BlogController::class, 'delete_blog']);



    

});