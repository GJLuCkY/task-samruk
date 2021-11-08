<?php

declare(strict_types=1);

namespace App\Core\Application\Post\Queries;

use App\Core\Application\Interfaces\Queries\QueryInterface;

/**
 * @psalm-immutable
 * @see GetPostsHandler
 */
final class GetPosts implements QueryInterface
{
    public function __construct()
    {
    }
}
