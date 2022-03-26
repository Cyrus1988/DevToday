<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comment\CommentCreateRequest;
use App\Http\Requests\Api\Comment\CommentUpdateRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $comments = Comment::all()->toArray();

        return $this->sendResponse($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentCreateRequest $request
     * @return JsonResponse
     */
    public function store(CommentCreateRequest $request)
    {
        $validated = $request->validated();

        Comment::create($validated);

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
        $comment = Comment::find($id);

        if ($comment) {
            return $this->sendResponse([$comment]);
        } else {
            return $this->sendError('Not found comment by id: ' . $id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommentUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CommentUpdateRequest $request, int $id): JsonResponse
    {
        $validate = $request->validated();

        $comment = Comment::find($id);

        $comment->update($validate);

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
        Comment::destroy($id);

        return $this->sendResponse();
    }
}
