<?php

namespace Tests\Unit;

use App\Core\Application\Post\Commands\CreatePost;
use App\Core\Application\Post\Commands\CreatePostHandler;
use App\Core\Application\Post\Commands\DeletePost;
use App\Core\Application\Post\Commands\DeletePostHandler;
use App\Core\Application\Post\Queries\GetPost;
use App\Core\Application\Post\Queries\GetPostHandler;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PostTest extends TestCase
{
    use WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetPost()
    {
        $post = Post::factory()->create();
        $command = new GetPost($post->id);
        $commandPost = app(GetPostHandler::class)->handle($command);

        $this->assertEquals($post->id, $commandPost->id);
    }

    public function testCreatePost()
    {
        $requestData = [
            'title'         => $this->faker->text(10),
            'description'   => $this->faker->text(25),
            'content'       => $this->faker->text(200),
            'image'         => $this->faker->url(),
            'is_active'     => $this->faker->numberBetween(0, 1),
        ];

        $command = new CreatePost($requestData);
        app(CreatePostHandler::class)->handle($command);

        $this->assertDatabaseHas('posts', [
            'title'         => $requestData['title'],
            'description'   => $requestData['description'],
            'content'       => $requestData['content'],
        ]);
    }

    public function testDeletePost()
    {
        $post = Post::factory()->create();
        $command = new DeletePost($post->id);
        $response = app(DeletePostHandler::class)->handle($command);

        $this->assertEquals(true, $response);
    }
}
