<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ChapterRequest;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\ChapterRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    /**
     * @var ChapterRepository
     */
    protected $chapters;

    /**
     * ChapterController constructor.
     * @param BookRepository $books
     * @param ChapterRepository $chapters
     */
    public function __construct(ChapterRepository $chapters)
    {
        $this->chapters = $chapters;
    }

    /**
     * Store a newly created chapter in storage.
     *
     * @param ChapterRequest $request
     * @return JsonResponse
     */
    public function store(ChapterRequest $request)
    {
        $chapter = $this->chapters->create([
            'book_id' => $request->book_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'order' => $request->order,
            'sub_title' => $request->sub_title,
            'body' => $request->body,
            'is_live' => $request->is_live
        ]);

        if(!$chapter) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create chapter, try again later'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Update the specified chapter in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return ResponseAlias
     */
    public function update(ChapterRequest $request, $id)
    {
        $chapter = $this->chapters->find($id);

        $update = $this->books->update($chapter->id, [
            'title' => $request->title == $chapter->title ? $chapter->title : $request->title,
            'slug' =>  $request->title == $chapter->title ? $request->slug : Str::slug($request->title),
            'sub_title' => $request->sub_title == $chapter->sub_title ? $chapter->sub_title : $request->sub_title,
            'order' => $request->order == $chapter->order ? $chapter->order : $request->order,
            'is_live' => $request->is_live == $chapter->is_live ? $chapter->is_live : $request->is_live,
            'body' => $request->body == $chapter->body ? $chapter->body : $request->body,
        ]);

        if(!$update) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update chapter, try again later!'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return ResponseAlias
     */
    public function destroy($id)
    {
        $chapter = $this->chapters->find($id);

        if(!$chapter && !$chapter->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete chapter, try again later!'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
