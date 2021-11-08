<?php

declare(strict_types=1);

namespace App\Providers;

use App\Core\Application\Post\Commands\CreatePost;
use App\Core\Application\Post\Commands\CreatePostHandler;
use App\Core\Application\Post\Commands\DeletePost;
use App\Core\Application\Post\Commands\DeletePostHandler;
use App\Core\Application\Post\Commands\UpdatePost;
use App\Core\Application\Post\Commands\UpdatePostHandler;
use App\Core\Application\Post\Queries\GetPost;
use App\Core\Application\Post\Queries\GetPostHandler;
use App\Core\Application\Post\Queries\GetPosts;
use App\Core\Application\Post\Queries\GetPostsHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

final class CommandBusServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Bus::map([
            GetPosts::class     => GetPostsHandler::class,
            GetPost::class      => GetPostHandler::class,
            CreatePost::class   => CreatePostHandler::class,
            UpdatePost::class   => UpdatePostHandler::class,
            DeletePost::class   => DeletePostHandler::class,
        ]);
    }
}
