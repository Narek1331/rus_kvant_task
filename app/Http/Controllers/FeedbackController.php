<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeedbackService;
use App\Http\Requests\StoreFeedbackRequest;

class FeedbackController extends Controller
{
    protected $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    /**
     * Display a listing of the feedbacks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all feedbacks using the FeedbackService
        $feedbacks = $this->feedbackService->getAllFeedbacks();

        // Return feedbacks as JSON response
        return response()->json($feedbacks, 200);
    }

    /**
     * Store a newly created feedback in storage.
     *
     * @param  \App\Http\Requests\StoreFeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedbackRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Save the feedback using the FeedbackService
        $this->feedbackService->saveFeedback($validatedData);

        // Return a success response
        return response()->json(['message' => 'Feedback successfully saved'], 201);
    }
}
