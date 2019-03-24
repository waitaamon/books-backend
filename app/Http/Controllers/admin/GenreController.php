<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Repositories\Contracts\GenreRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    /**
     * @var GenreRepository
     */
    protected $genres;

    /**
     * GenreController constructor.
     * @param GenreRepository $genres
     */
    public function __construct(GenreRepository $genres)
    {

        $this->genres = $genres;
    }
    /**
     * Display a listing of the genre.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = $this->genres->all();

        return response(GenreResource::collection($genres), 200);
    }

    /**
     * Store a newly created genre in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $genre = $this->genres->create($request->all());

        if(!$genre) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create genre, try again later'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    /**
     * Update the specified genre in storage.
     *
     * @param GenreRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        $genre = $this->genres->find($id);

        if(!$genre) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not genre topic, try again later'
                    ]
                ]
            ], 422);
        }

        $update = $this->genres->update($id, $request->all());

        if(!$update) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update genre, try again later'
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
        $genre = $this->genres->find($id);

        if(!$genre && !$genre->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete genre, try again later'
                    ]
                ]
            ], 422);
        }

        $genres = $this->genres->all();

        return response(GenreResource::collection($genres), 200);
    }
}
