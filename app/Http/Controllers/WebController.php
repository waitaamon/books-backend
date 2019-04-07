<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\ChapterResource;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\ChapterRepository;
use Illuminate\Contracts\Routing\ResponseFactory;

class WebController extends Controller
{
    /**
     * @var BookRepository
     */
    public $books;
    /**
     * @var ChapterRepository
     */
    protected $chapters;

    /**
     * WebController constructor.
     * @param BookRepository $books
     * @param ChapterRepository $chapters
     */
    public function __construct(BookRepository $books, ChapterRepository $chapters)
    {
        $this->books = $books;
        $this->chapters = $chapters;
    }

    /**
     * All published books
     * @return ResponseFactory|Response
     */
    public function index()
    {
        $books = $this->books->findWhere('is_live', true);

        return response(BookResource::collection($books), 200);
    }

    /**
     * Show book
     * @param $id
     * @return ResponseFactory|JsonResponse
     */
    public function show_book($id)
    {
        $book = $this->books->find($id);

        if(!$book) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not find book, try again later'
                    ]
                ]
            ], 422);
        }

        return response(new BookResource($book), 200);
    }

    /**
     * Show chapter
     * @param $id
     * @return ResponseFactory|JsonResponse
     */
    public function show_chapter($id)
    {
        $chapter = $this->chapters->find($id);

        if(!$chapter) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not find chapter, try again later'
                    ]
                ]
            ], 422);
        }

        return response(new ChapterResource($chapter), 200);
    }
}
