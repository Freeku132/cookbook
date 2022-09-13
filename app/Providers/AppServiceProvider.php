<?php

namespace App\Providers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.layout', function ($view){

            $annoucement = Announcement::first();
            $view->with([
                'bannerText' => $annoucement->bannerText,
                'bannerColor' => $annoucement->bannerColor,
                'isActive' => $annoucement->isActive
            ]);
        });

        Http::macro('movies', function (){
            return Http::withToken(config('services.movie_token.token'))->baseUrl('https://api.themoviedb.org');
        });
    }
}
