<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Report;
use App\Policies\CommentPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $policies = [
        Comment::class => CommentPolicy::class,
        Report::class => ReportPolicy::class,
    ];
}
