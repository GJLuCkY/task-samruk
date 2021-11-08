<?php

declare(strict_types=1);

namespace App\Core\Domain\Post;

use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function getPosts(): Collection;

    public function getPost(int $postId): Post;
}
