<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFeedbackRequest;
use App\Factories\FeedbackStorageFactory;

/**
 * Class FeedbackController
 * @package App\Http\Controllers
 */
class FeedbackController extends Controller
{
    /**
     * Display a listing of the feedbacks.
     *
     * @return \Illuminate\Http\Response The JSON response containing the feedbacks.
     */
    public function index()
    {
        //Use this if you want to set database
        //$storage = FeedbackStorageFactory::start('database');
        $storage = FeedbackStorageFactory::start('file');
        $feedbacks = $storage->getAll();

        return response()->json($feedbacks, 200);
    }

    /**
     * Store a newly created feedback in storage.
     *
     * @param StoreFeedbackRequest $request The incoming request containing the feedback data.
     * @return \Illuminate\Http\Response The JSON response indicating the success or failure of the operation.
     */
    public function store(StoreFeedbackRequest $request)
    {
        $validatedData = $request->validated();

        //Use this if you want to set database
        //$storage = FeedbackStorageFactory::start('database');
        $storage = FeedbackStorageFactory::start('file');
        $storage->save($validatedData);

        return response()->json(['message' => 'Feedback successfully saved'], 201);
    }
}
