<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\PostCreateRequest;
use App\Http\Requests\Api\Post\PostUpdateRequest;
use App\Http\Requests\Api\Post\VoteRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = Post::all()->toArray();

        return $this->sendResponse($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     * @return JsonResponse
     */
    #[NoReturn]
    public function store(PostCreateRequest $request): JsonResponse
    {
        $validated = $request->validated();

        Post::create($validated);

        return $this->sendResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $post = Post::find($id);

        if ($post) {
            return $this->sendResponse([$post]);
        } else {
            return $this->sendError('Not found post by id: ' . $id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(PostUpdateRequest $request, int $id): JsonResponse
    {
        $validate = $request->validated();

        $post = Post::find($id);

        $post->update($validate);

        return $this->sendResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        Post::destroy($id);

        return $this->sendResponse();
    }

    /**
     * @param VoteRequest $request
     * @return JsonResponse
     */
    public function vote(VoteRequest $request): JsonResponse
    {
        $validated = $request->validated();

        Post::find($validated['id'])->increment('amount_of_upvotes', 1);

        return $this->sendResponse();
    }
}
