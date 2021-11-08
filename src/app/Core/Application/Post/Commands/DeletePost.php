<?php

declare(strict_types=1);

namespace App\Core\Application\Post\Commands;

use App\Core\Application\Interfaces\Queries\QueryInterface;

/**
 * @psalm-immutable
 * @see DeletePostHandler
 */
final class DeletePost implements QueryInterface
{
    public int $post;

    public function __construct(int $postId)
    {
        $this->postId = $postId;
    }
}
