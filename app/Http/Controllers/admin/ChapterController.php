<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ChapterRequest;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\ChapterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        $chapter = $this->chapters->create([
            'book_id' => $request->book_id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'sub_title' => $request->sub_title,
            'body' => $request->body
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chapter = $this->chapters->find($id);

        $update = $this->books->update($chapter->id, [
            'title' => $request->title == $chapter->title ? $chapter->title : $request->title,
            'slug' =>  $request->title == $chapter->title ? $request->slug : str_slug($request->title),
            'sub_title' => $request->sub_title == $chapter->sub_title ? $chapter->sub_title : $request->sub_title,
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
     * @return \Illuminate\Http\Response
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
