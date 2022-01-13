<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNewsAPIRequest;
use App\Http\Requests\API\UpdateNewsAPIRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NewsController
 * @package App\Http\Controllers\API
 */

class NewsAPIController extends AppBaseController
{
    /** @var  NewsRepository */
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the News.
     * GET|HEAD /news
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $news = $this->newsRepository->List();

        return $this->sendResponse(
            $news,
            __('messages.retrieved', ['model' => __('models/news.plural')])
        );
    }


     public function news_groupbyoption(Request $request)
    {
        $news = $this->newsRepository->list_byoption();

        return $this->sendResponse(
            $news,
            __('messages.retrieved', ['model' => __('models/news.plural')])
        );
    }
    
    /**
     * Store a newly created News in storage.
     * POST /news
     *
     * @param CreateNewsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsAPIRequest $request)
    {
        $input = $request->all();

        $news = $this->newsRepository->create($input);

        return $this->sendResponse(
            $news->toArray(),
            __('messages.saved', ['model' => __('models/news.singular')])
        );
    }

    /**
     * Display the specified News.
     * GET|HEAD /news/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var News $news */
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/news.singular')])
            );
        }

        return $this->sendResponse(
            $news->toArray(),
            __('messages.retrieved', ['model' => __('models/news.singular')])
        );
    }

    /**
     * Update the specified News in storage.
     * PUT/PATCH /news/{id}
     *
     * @param int $id
     * @param UpdateNewsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsAPIRequest $request)
    {
        $input = $request->all();

        /** @var News $news */
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/news.singular')])
            );
        }

        $news = $this->newsRepository->update($input, $id);

        return $this->sendResponse(
            $news->toArray(),
            __('messages.updated', ['model' => __('models/news.singular')])
        );
    }

    /**
     * Remove the specified News from storage.
     * DELETE /news/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var News $news */
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/news.singular')])
            );
        }

        $news->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/news.singular')])
        );
    }
}
