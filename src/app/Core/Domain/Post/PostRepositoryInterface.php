<?php

declare(strict_types=1);

namespace App\Core\Domain\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function getPosts(): Collection;

    public function getPost(int $postId): Post;

    public function createPost(array $requestData): Post;

    public function updatePost(int $postId, array $requestData): Post;

    public function deletePost(int $postId): bool;
}
