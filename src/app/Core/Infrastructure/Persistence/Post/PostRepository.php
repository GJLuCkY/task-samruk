<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\Post;

use App\Models\Post;
use App\Core\Domain\Post\PostRepositoryInterface;
use App\Exceptions\ErrorCodes;
use App\Exceptions\NoticeException;
use DB;
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
        return $this->model->active()->get();
    }

    public function getPost(int $postId): Post
    {
        return $this->model->where('id', $postId)->firstOrFail();
    }

    public function createPost(array $requestData): Post
    {
        return $this->model->create($requestData);
    }

    public function updatePost(int $postId, array $requestData): Post
    {
        try {
            DB::beginTransaction();

            $post = $this->model->whereId($postId)->firstOrFail();
            $post->update($requestData);

            DB::commit();

            return $post;
        } catch (\Throwable $throwable) {
            DB::rollBack();

            \Log::error($throwable);

            throw new NoticeException($throwable->getMessage(), ErrorCodes::FAILED_RESULT);
        }
    }

    public function deletePost(int $postId): bool
    {
        try {
            DB::beginTransaction();

            $post = $this->model->whereId($postId)->firstOrFail();
            $post->delete();

            DB::commit();

            return true;
        } catch (\Throwable $throwable) {
            DB::rollBack();

            \Log::error($throwable);

            throw new NoticeException($throwable->getMessage(), ErrorCodes::FAILED_RESULT);
        }
    }
}
