<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Repositories\Contracts\BookRepository;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookRequest $request)
    {
        //save book
        $book = $this->books->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => str_slug($request->title),
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
        $this->books->sync($book->id, 'topics', $request->topic);

        //save genres
        $this->books->sync($book->id, 'genres', $request->genre);

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
            'slug' => str_slug($request->title) == $book->title ? $book->title : str_slug($request->title),
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

        return response(new BookResource($book), 200);
    }


    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->books->find($id);

        if(!$book->delete()) {
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
}
