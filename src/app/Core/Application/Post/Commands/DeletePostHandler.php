<?php

declare(strict_types=1);

namespace App\Core\Application\Post\Commands;

use App\Core\Application\Interfaces\Queries\QueryHandlerInterface;
use App\Core\Application\Interfaces\Queries\QueryInterface;
use App\Core\Domain\Post\PostRepositoryInterface;
use App\Exceptions\ErrorCodes;
use App\Exceptions\NoticeException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class DeletePostHandler implements QueryHandlerInterface
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param GetPost $query
     * @throws NoticeException
     */
    public function handle(QueryInterface $query)
    {
        try {
            return $this->postRepository->deletePost($query->postId);
        } catch (ModelNotFoundException $exception) {
            throw new NoticeException($exception->getMessage(), ErrorCodes::NOT_FOUND);
        }
    }
}
