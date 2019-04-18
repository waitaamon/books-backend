<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicResource;
use App\Repositories\Contracts\TopicRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TopicController extends Controller
{
    /**
     * @var TopicRepository
     */
    protected $topics;

    /**
     * TopicController constructor.
     * @param TopicRepository $topics
     */
    public function __construct(TopicRepository $topics)
    {
        $this->topics = $topics;
    }

    /**
     * Display a listing of the topics.
     *
     * @return Response
     */
    public function index()
    {
        $topics = $this->topics->all();

        return response(TopicResource::collection($topics), 200);
    }


    /**
     * Store a newly created resource in topic.
     *
     * @param TopicRequest $request
     * @return Response
     */
    public function store(TopicRequest $request)
    {
        $topic = $this->topics->create($request->all());

        if(!$topic) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not create topic, try again later'
                    ]
                ]
            ], 422);
        }

        $topics = $this->topics->all();

        return response(TopicResource::collection($topics), 200);
    }

    /**
     * Update the specified topic in storage.
     *
     * @param TopicRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(TopicRequest $request, $id)
    {
        $topic = $this->topics->find($id);

        if(!$topic) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update topic, try again later'
                    ]
                ]
            ], 422);
        }

        $update = $this->topics->update($id, $request->all());

        if(!$update) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not update topic, try again later'
                    ]
                ]
            ], 422);
        }

        $topics = $this->topics->all();

        return response(TopicResource::collection($topics), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $topic = $this->topics->find($id);

        if(!$topic || !$topic->delete()) {
            return response()->json([
                'errors' => [
                    'root' => [
                        'Could not delete topic, try again later'
                    ]
                ]
            ], 422);
        }

        $topics = $this->topics->all();

        return response(TopicResource::collection($topics), 200);
    }
}
