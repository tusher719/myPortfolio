<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HeroPartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');
});

Route::group(array('middleware' => 'auth'), function() {

    // Hero Part
    Route::get('/hero_part', [HeroPartController::class, 'HeroPart'])->name('hero.part');
    Route::post('/hero_part/update', [HeroPartController::class, 'HeroPartUpdate'])->name('update.heropart');


    Route::prefix('/about')->group(function (){
        // About Section
        Route::get('/main', [AboutController::class, 'AddAbout'])->name('main');
        Route::post('/store', [AboutController::class, 'AboutStore'])->name('about.store');
        Route::get('/edit/{id}', [AboutController::class, 'AboutEdit'])->name('about.edit');
        Route::post('/update', [AboutController::class, 'AboutUpdate'])->name('about.update');
        Route::get('/delete/{id}', [AboutController::class, 'AboutDelete'])->name('about.delete');

        Route::get('/inactive/{id}', [AboutController::class, 'AboutInactive'])->name('about.inactive');
        Route::get('/active/{id}', [AboutController::class, 'AboutActive'])->name('about.active');

        // skill
        Route::get('/skill/view', [AboutController::class, 'SkillAdd'])->name('skill');
        Route::post('/skill/store', [AboutController::class, 'SkillStore'])->name('skill.store');
        Route::get('/skill/edit/{id}', [AboutController::class, 'SkillEdit'])->name('skill.edit');
        Route::post('/skill/update', [AboutController::class, 'SkillUpdate'])->name('skill.update');
        Route::get('/skill/delete/{id}', [AboutController::class, 'SkillDelete'])->name('skill.delete');

        // Experience
        Route::get('/experience/view', [AboutController::class, 'ExperienceAdd'])->name('experience');
        Route::post('/experience/store', [AboutController::class, 'ExperienceStore'])->name('experience.store');
        Route::get('/experience/edit/{id}', [AboutController::class, 'ExperienceEdit'])->name('experience.edit');
        Route::post('/experience/update', [AboutController::class, 'ExperienceUpdate'])->name('experience.update');
        Route::get('/experience/delete/{id}', [AboutController::class, 'ExperienceDelete'])->name('experience.delete');

        // Education
        Route::get('/education/view', [AboutController::class, 'EducationAdd'])->name('education');
        Route::post('/education/store', [AboutController::class, 'EducationStore'])->name('education.store');
        Route::get('/education/edit/{id}', [AboutController::class, 'EducationEdit'])->name('education.edit');
        Route::post('/education/update', [AboutController::class, 'EducationUpdate'])->name('education.update');
        Route::get('/education/delete/{id}', [AboutController::class, 'EducationDelete'])->name('education.delete');
    });


    Route::prefix('/portfolio')->group(function (){
        Route::get('/category/view', [PortfolioController::class, 'CategoryView'])->name('category.view');
        Route::post('/category/store', [PortfolioController::class, 'CategoryStore'])->name('category.store');
        Route::get('/category/edit/{id}', [PortfolioController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/category/update', [PortfolioController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/category/delete/{id}', [PortfolioController::class, 'CategoryDelete'])->name('category.delete');

        Route::get('/manage', [PortfolioController::class, 'PortfolioManage'])->name('portfolio.manage');
        Route::get('/add', [PortfolioController::class, 'PortfolioAdd'])->name('portfolio.add');
        Route::post('/store', [PortfolioController::class, 'PortfolioStore'])->name('portfolio.store');
        Route::get('/view/{id}', [PortfolioController::class, 'PortfolioView'])->name('portfolio.view');
        Route::get('/edit/{id}', [PortfolioController::class, 'PortfolioEdit'])->name('portfolio.edit');
        Route::post('/update', [PortfolioController::class, 'PortfolioUpdate'])->name('portfolio.update');
        Route::post('/thumbnail/update', [PortfolioController::class, 'ThumbnailUpdate'])->name('portfolio.thumbnail.update');
        Route::post('/multi_img/update', [PortfolioController::class, 'MultiImageUpdate'])->name('portfolio.multi_img.update');
        Route::get('/multi_img/delete/{id}', [PortfolioController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        Route::get('/delete/{id}', [PortfolioController::class, 'ProjectDelete'])->name('portfolio.delete');
        Route::get('/inactive/{id}', [PortfolioController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/active/{id}', [PortfolioController::class, 'ProductActive'])->name('product.active');


    });

    // Tag
    Route::prefix('/tag')->group(function (){
        Route::get('/tag/view', [TagController::class, 'TagView'])->name('tag.view');
        Route::post('/tag/store', [TagController::class, 'TagStore'])->name('tag.store');
        Route::get('/tag/edit/{id}', [TagController::class, 'TagEdit'])->name('tag.edit');
        Route::post('/tag/update', [TagController::class, 'TagUpdate'])->name('tag.update');
        Route::get('/tag/delete/{id}', [TagController::class, 'TagDelete'])->name('tag.delete');
    });

    // Blog
    Route::prefix('/blog')->group(function (){
        // Admin Blog Category Routes
        Route::get('/category/view', [BlogController::class, 'BlogView'])->name('blog.view');
        Route::post('/category/store', [BlogController::class, 'BlogStore'])->name('blog.store');
        Route::get('/category/edit/{id}', [BlogController::class, 'BlogEdit'])->name('blog.edit');
        Route::post('/category/update', [BlogController::class, 'BlogUpdate'])->name('blog.update');
        Route::get('/category/delete/{id}', [BlogController::class, 'BlogDelete'])->name('blog.delete');

        // Admin View Blog Post Routes
        Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');
        Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');
        Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post.store');

        Route::get('/post/edit/{id}', [BlogController::class, 'BlogPostEdit'])->name('blog.post.edit');
        Route::post('/post/update', [BlogController::class, 'BlogPostUpdate'])->name('blog.post.update');
        Route::get('/post/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('blog.post.delete');
    });

    // Contact
    Route::prefix('/contact')->group(function (){
        Route::get('/manage', [ContactController::class, 'ContactManage'])->name('contact.manage');
        Route::get('/view/{id}', [ContactController::class, 'ContactView'])->name('contact.view');
    });

    // Profile
    Route::prefix('/profile')->group(function (){
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile');
        Route::post('/update/password', [ProfileController::class, 'ChangePassword'])->name('change.password');
//        Route::post('/update/name', [ProfileController::class, 'ChangeName'])->name('change.name');
        Route::post('/update/avatar', [ProfileController::class, 'ChangeAvatar'])->name('change.avatar');
    });

});


// Frontend Route
Route::get('/', [IndexController::class, 'HomeBanner']);

// Contact
Route::post('/message', [IndexController::class, 'Message'])->name('message');
// blog page
Route::get('/post/list', [IndexController::class, 'PostList'])->name('post.list');
// Single Blog Page
Route::get('/blog/{id}/{slug}', [IndexController::class, 'SinglePost'])->name('single.post');

// Category wise data
Route::get('/category/blog/{cat_id}/{slug}', [IndexController::class, 'CatWiseProduct'])->name('category.post');

// Post Search
Route::post('/search', [IndexController::class, 'PostSearch'])->name('post.search');

// Comments
Route::post('/comment/store', [IndexController::class, 'CommentStore'])->name('comment.store');
