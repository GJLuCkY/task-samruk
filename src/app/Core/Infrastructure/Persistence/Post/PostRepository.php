<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\Post;

use App\Core\Domain\Post\Post;
use App\Core\Domain\Post\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class PostRepository implements PostRepositoryInterface
{
    private Post $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getPosts(): Collection
    {
        return $this->model->get();
    }

    public function getPost(int $postId): Post
    {
        return $this->model->where('id', $postId)->firstOrFail();
    }
}
