<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Repositories\Contracts\BookRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * @var BookRepository
     */
    protected $books;

    /**
     * BookController constructor.
     * @param BookRepository $books
     */
    public function __construct(BookRepository $books)
    {
        $this->books = $books;
    }

    /**
     * Display a listing of the books.
     *
     * @return Response
     */
    public function index()
    {
        $books = $this->books->all();

        return response(BookResource::collection($books), 200);
    }

    /**
     * Store a newly created book in storage.
     *
     * @param BookRequest $request
     * @return JsonResponse
     */
    public function store(BookRequest $request)
    {
        //save book
        $book = $this->books->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author' => $request->author,
            'publisher' => $request->publisher,
            'language_id' => $request->language
        ]);

        if(!$book) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create book, try again later'
                    ]
                ]
            ], 422);
        }

        //save topics
        $this->books->sync($book->id, 'topics', extractdata($request->topics));

        //save genres
        $this->books->sync($book->id, 'genres', extractdata($request->genres));

        $book->addMedia($request->image)->toMediaCollection();

        $books = $this->books->all();

        return response(BookResource::collection($books), 200);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
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
     * get all language books
     * @param $id
     * @return ResponseFactory|Response
     */
    public function language_books($id) {

        $books = $this->books->findWhere('language_id', $id);

        return response(BookResource::collection($books), 200);
    }

    /**
     * Update the specified book in storage.
     *
     * @param BookRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(BookRequest $request, $id)
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

        //update book
        $update = $this->books->update( $book->id, [
            'title' => $request->title == $book->title ? $book->title : $request->title,
            'slug' => Str::slug($request->title) == $book->title ? $book->title : Str::slug($request->title),
            'author' => $request->author == $book->author ? $book->author : $request->author,
            'publisher' => $request->publisher == $book->publisher ? $book->publisher : $request->publisher,
            'language_id' => $request->language == $book->language ? $book->language : $request->language
        ]);

        if(!$update) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update book, try again later'
                    ]
                ]
            ], 422);
        }

        //save topics
        $this->books->sync($book->id, 'topics', extractdata($request->topics));

        //save genres
        $this->books->sync($book->id, 'genres', extractdata($request->genres));

        $books = $this->books->all();

        return response(BookResource::collection($books), 200);
    }


    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $book = $this->books->find($id);

        if(!$book && !$book->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete book, try again later'
                    ]
                ]
            ], 422);
        }

        $books = $this->books->all();

        return response(BookResource::collection($books), 200);
    }

    /**
     * Publish book
     * @param Request $request
     * @param $id
     * @return ResponseFactory|JsonResponse|Response
     */
    public function publish (Request $request, $id) {

        $book = $this->books->find($id);

        if(!$book) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not publish book, try again later'
                    ]
                ]
            ], 422);
        }

        $updated_book = $this->books->update($book->id, [
            'is_live' => $request->action
        ]);

        $book = $this->books->find($id);

        return response(new BookResource($book), 200);
    }
}
