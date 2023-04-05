<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\GoogleSocialiteController;


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

// display admin.index.blade.php file as a dashboard
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'isAdmin', 'verified'])->name('dashboard');

Route::controller(DemoController::class)->group(function () {
    // To display home page
    Route::get('/', 'homePage')->name('home');
});


// Logout route, single route EXAMPLE
// Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// Admin All Route, group route; 
// Inside middleware group
Route::middleware(['auth'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/store/profile', 'storeProfile')->name('store.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');     
    });

});



// Home Slide Controller
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'homeSlideSetup')->name('home.slide');
    Route::post('/update/slide', 'updateSlide')->name('update.slide');
   
});

Route::controller(GoogleSocialiteController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/callback/google', 'handleCallback')->name('callback.google');
});	


// About Page Route/TestComment
Route::controller(AboutController::class)->group(function () {

    Route::get('/home/about', 'aboutPageSetUp')->name('home.about');
    // POST route is used when new data is sotred or updated
    Route::post('/update/about', 'updateAbout')->name('update.about');
    Route::get('/about/page', 'AboutPageView')->name('about.page');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    // POST route is used when new data is sotred or updated
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');

    // Edit Multi Image, from <a href=' {{ route(' edit.multi.image', $item->id) }} '> Edit </a>
    // additional 'id' value passed to the route within {} braces, {id}
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    // Update Multi Image Route
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');

    // Delete multi image
    Route::get('delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');

});

// Portfolio All Route
Route::controller(PortfolioController::class)->group(function () {

    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details'); 
    Route::get('/portfolio', 'homePortfolio')->name('home.portfolio'); 

});


//Blog Category Routes Admin
Route::controller(BlogCategoryController::class)->group(function () {

   Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
   Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
   Route::post('/store/blog/category', 'storeBlogCategory')->name('store.blog.category');
   Route::get('/edit/blog/category/{id}', 'editBlogCategory')->name('edit.blog.category');
   Route::post('/update/blog/category/{id}', 'updateBlogCategory')->name('update.blog.category');
   Route::get('/delete/blog/category/{id}', 'deleteBlogCategory')->name('delete.blog.category');
    

});

//Blog Routes Frontend
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'allBlog')->name('all.blog');
    Route::get('/add/blog', 'addBlog')->name('add.blog');
    Route::post('/store/blog', 'storeBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'editBlog')->name('edit.blog');
    Route::post('/update/blog/{id}', 'updateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'deleteBlog')->name('delete.blog');
    Route::get('/blog/detail/{id}', 'blogDetail')->name('blog.detail');
    Route::get('/blog/category/{id}', 'blogCategory')->name('blog.category');
    Route::get('/blog', 'homeBlog')->name('home.blog');
    
 });


 //Footer Routes
Route::controller(FooterController::class)->group(function () {
    Route::get('/all/footer', 'footerInfo')->name('footer.info');
    Route::get('/edit/footer/{id}', 'editFooter')->name('edit.footer');    
    Route::post('/update/footer', 'updateFooter')->name('update.footer');
    Route::get('/delete/footer/{id}', 'deleteFooter')->name('delete.footer');
    
 });


 //Contat Routes
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contactPage')->name('contact.me');
    Route::post('/store/message', 'storeMessage')->name('store.message');
    Route::get('/contact/messages', 'contactMessages')->name('contact.messages');
    Route::get('/contact/message/view/{id}', 'contactMessagesview')->name('contact.messages.view');
    Route::get('/delete/message/{id}', 'deleteMessage')->name('delete.message');
    
 });




require __DIR__.'/auth.php';
