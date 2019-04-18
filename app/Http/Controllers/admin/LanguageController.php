<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\LanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Repositories\Contracts\LanguageRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LanguageController extends Controller
{
    /**
     * @var LanguageRepository
     */
    protected $languages;

    /**
     * LanguageController constructor.
     * @param LanguageRepository $languages
     */
    public function __construct(LanguageRepository $languages)
    {
        $this->languages = $languages;
    }
    /**
     * Display a listing of the languages.
     *
     * @return Response
     */
    public function index()
    {
        $languages = $this->languages->all();

        return response(LanguageResource::collection($languages), 200);
    }

    /**
     * Store a newly created language in storage.
     *
     * @param LanguageRequest $request
     * @return Response
     */
    public function store(LanguageRequest $request)
    {
        $language = $this->languages->create($request->all());

        if(!$language) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create language, try again later'
                    ]
                ]
            ], 422);
        }

        $languages = $this->languages->all();

        return response(LanguageResource::collection($languages), 200);
    }

    /**
     * Update the specified language in storage.
     *
     * @param LanguageRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(LanguageRequest $request, $id)
    {
        $language = $this->languages->find($id);

        if(!$language) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update language, try again later'
                    ]
                ]
            ], 422);
        }

        $update = $this->languages->update($id, $request->all());

        if(!$update) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update language, try again later'
                    ]
                ]
            ], 422);
        }

        $languages = $this->languages->all();

        return response(LanguageResource::collection($languages), 200);
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $language = $this->languages->find($id);

        if(!$language || !$language->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete language, try again later'
                    ]
                ]
            ], 422);
        }

        $languages = $this->languages->all();

        return response(LanguageResource::collection($languages), 200);
    }
}
