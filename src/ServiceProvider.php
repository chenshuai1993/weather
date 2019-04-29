<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2019/4/29
 * Time: 11:09
 */

namespace Chenshuai1993\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}