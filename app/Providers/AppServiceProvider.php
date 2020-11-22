<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Course\CourseRepositoryInterface::class,
            \App\Repositories\Course\CourseRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['user.component.index', 'user.component.lesson_detail', 'user.component.course', 'user.component.lessons', 'user.component.mentor'], 'App\Http\View\Composers\AdvisorComposer'
        );
    }
}
