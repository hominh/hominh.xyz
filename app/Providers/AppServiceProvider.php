<?php


namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Validator;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //Schema::defaultStringLength(191);

        Validator::extend('recaptcha', 'App\Validators\Recaptcha@validate');

        view()->composer('*', function ($view)
        {
            $categories = DB::table('categories')->select(DB::raw('ifnull(count(posts.id),0) as num, categories.name as categoryname,categories.alias as calias'))->leftJoin('posts','posts.category_id','=','categories.id')->groupBy('categories.name')->orderBy('categories.id')->get();
            $view->with('categories', $categories);
            //dd($categories);

            //Tag
            $tags = DB::table('tags')->select('id','name','alias')->get();
            $view->with('tags', $tags);
            //dd($tags);

            //config
            $configs = DB::table('configs')->select('id','logo','title','description','keyword','address','email','skype','phone')->get()->toArray();
            $configs = array_map(function($item){
                return (array) $item;
                },$configs);
            $view->with('configs', $configs);

            $newestPost = DB::table('posts')
                        ->select('posts.id','posts.name','posts.intro','posts.alias','posts.image','posts.view','posts.created_at')
                        ->orderBy('created_at','DESC')
                        ->paginate(10);
            $view->with('newestPost', $newestPost);

            $mostViewPost = DB::table('posts')
                        ->select('posts.id','posts.name','posts.intro','posts.alias','posts.image','posts.view','posts.created_at')
                        ->orderBy('view','DESC')
                        ->paginate(10);
            $view->with('mostViewPost', $mostViewPost);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
