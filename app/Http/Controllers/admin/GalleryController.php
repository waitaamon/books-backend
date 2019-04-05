<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\GalleryRequest;
use App\Http\Resources\GalleryResource;
use App\Repositories\Contracts\GalleryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GalleryController extends Controller
{
    /**
     * @var GalleryRepository
     */
    protected $galleries;

    /**
     * GalleryController constructor.
     * @param GalleryRepository $galleries
     */
    public function __construct(GalleryRepository $galleries)
    {
        $this->galleries = $galleries;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = $this->galleries->all();

        return response(GalleryResource::collection($galleries), 200);
    }

    /**
     * Store a newly created gallery in storage.
     *
     * @param GalleryRequest $request
     * @return JsonResponse
     */
    public function store(GalleryRequest $request)
    {
        $item = $this->galleries->create([
            'book_id' => $request->book,
            'title' => $request->title
        ]);

        if(!$item) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not save image, try again later'
                    ]
                ]
            ], 422);
        }

        //associate media
        $item->addMedia($request->image)->toMediaCollection();

        $galleries = $this->galleries->all();

        return response(GalleryResource::collection($galleries), 200);
    }

    /**
     * Update the specified gallery in storage.
     *
     * @param GalleryRequest $request
     * @param  int $id
     * @return JsonResponse
     */
    public function update(GalleryRequest $request, $id)
    {
        $image = $this->galleries->find($id);

        if(!$image) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update image, try again later'
                    ]
                ]
            ], 422);
        }

        $update = $this->galleries->update([
            'title' => $request->title
        ]);

        if(!$update) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update image, try again later'
                    ]
                ]
            ], 422);
        }

        $galleries = $this->galleries->all();

        return response(GalleryResource::collection($galleries), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->galleries->find($id);

        if(!$image && !$image->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete image, try again later'
                    ]
                ]
            ], 422);
        }

        $galleries = $this->galleries->all();

        return response(GalleryResource::collection($galleries), 200);
    }
}
