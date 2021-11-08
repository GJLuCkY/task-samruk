<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        collect(config('repositories', []))
            ->each(fn (string $concrete, string $abstract) => $this->app->singleton($abstract, $concrete));
    }
}
