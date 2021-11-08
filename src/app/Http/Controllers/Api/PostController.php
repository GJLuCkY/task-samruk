<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Core\Application\Post\Queries\GetPosts;
use App\Core\Application\Post\Queries\GetPost;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Responses\Response;
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

    // 1) delete
    // 2) update
    // 3) create
    // 4) seed
    // 5) docs

    // /**
    //  * @param CreatePostRequest $request
    //  * @param CreatePostService $service
    //  * @return Response
    //  */
    // public function create(CreatePostRequest $request, CreatePostService $service): Response
    // {
    //     $post = $service->create(
    //         $request->get('name'),
    //         $request->get('email'),
    //         $request->get('password')
    //     );
        
    //     return new Response(PostResponse::one($post));
    // }
}
