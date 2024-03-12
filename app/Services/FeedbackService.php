<?php

namespace App\Services;

use App\Models\Feedback;
use Database\Factories\FeedbackFactory;
use App\Repositories\FeedbackRepository;

class FeedbackService
{
    /**
     * Property to hold the FeedbackFactory instance.
     *
     * @var FeedbackFactory
     */
    protected $feedbackFactory;

    /**
     * Property to hold the FeedbackRepository instance.
     *
     * @var FeedbackRepository
     */
    protected $feedbackRepository;

    /**
     * Constructor to inject the FeedbackFactory and FeedbackRepository instances.
     *
     * @param FeedbackFactory $feedbackFactory The FeedbackFactory instance
     * @param FeedbackRepository $feedbackRepository The FeedbackRepository instance
     *
     * @return void
     */
    public function __construct(FeedbackFactory $feedbackFactory, FeedbackRepository $feedbackRepository)
    {
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Method to retrieve all feedbacks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllFeedbacks()
    {
        return $this->feedbackRepository->getAllFeedbacks();
    }

    /**
     * Method to save feedback.
     *
     * @param array $data The data for the feedback
     *
     * @return void
     */
    public function saveFeedback(array $data)
    {
        // Create a new Feedback instance using the factory and provided data
        $feedback = $this->feedbackFactory->create($data);

        // Save the created feedback
        $feedback->save();
    }
}
