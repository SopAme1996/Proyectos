<?php

namespace App\Providers;

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
        $url = \Request::url();
    $check = strstr($url,"http://");
    if($check)
    {
       $newUrl = str_replace("http","https",$url);
       header("Location:".$newUrl);

    }
    }
}