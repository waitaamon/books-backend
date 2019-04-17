<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ChapterRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;


class SpaController extends Controller
{
    /**
     * @var ChapterRepository
     */
    protected $chapters;

    /**
     * SpaController constructor.
     * @param ChapterRepository $chapters
     */
    public function __construct(ChapterRepository $chapters)
    {
        $this->chapters = $chapters;
    }

    /**
     * redirect to the correct layout
     * @return Factory|View
     */
    public function index()
    {
        $route = \Route::current();

        if(!empty($route->parameters) && substr($route->parameters['any'], 0, 5) === 'admin') {

            return view('admin');

        } else if (!empty($route->parameters) && substr($route->parameters['any'], 0, 7) === 'chapter') {

            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);

            $chapter_id =  $uri_segments[2];

            $chapter = $this->chapters->find($chapter_id);

            return view('chapter', compact('chapter'));
        }

        return view('welcome');
    }

}
