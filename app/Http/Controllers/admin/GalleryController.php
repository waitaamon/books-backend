<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\GalleryRequest;
use App\Http\Resources\GalleryResource;
use App\Repositories\Contracts\GalleryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;

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
     * @return Response
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
     * @throws \Exception
     */
    public function store(GalleryRequest $request)
    {
        $item = $this->galleries->create([
            'identifier' => Uuid::uuid4()
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->galleries->find($id);

        if(!$image || !$image->delete()) {
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
