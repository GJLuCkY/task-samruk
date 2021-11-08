<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Core\Application\Post\Commands\CreatePost;
use App\Core\Application\Post\Commands\DeletePost;
use App\Core\Application\Post\Commands\UpdatePost;
use App\Core\Application\Post\Queries\GetPosts;
use App\Core\Application\Post\Queries\GetPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;

final class PostController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->response('Запрос успешен', PostResource::collection($this->dispatcher->dispatch(new GetPosts())));
    }

    /**
     * @param int $postId
     * @return JsonResponse
     */
    public function show(int $postId): JsonResponse
    {
        return $this->response('Запрос успешен', new PostResource($this->dispatcher->dispatch(new GetPost($postId))));
    }

    /**
     * @param PostRequest $request
     * @return JsonResponse
     */
    public function create(PostRequest $request): JsonResponse
    {
        return $this->response('Запрос успешен', new PostResource($this->dispatcher->dispatch(new CreatePost($request->all()))));
    }

    /**
     * @param int $postId
     * @param PostRequest $request
     * @return JsonResponse
     */
    public function update(int $postId, PostRequest $request): JsonResponse
    {
        return $this->response('Запрос успешен', new PostResource($this->dispatcher->dispatch(new UpdatePost($postId, $request->all()))));
    }

    /**
     * @param int $postId
     * @return JsonResponse
     */
    public function delete(int $postId): JsonResponse
    {
        return $this->response('Запрос успешен', $this->dispatcher->dispatch(new DeletePost($postId)));
    }
}
