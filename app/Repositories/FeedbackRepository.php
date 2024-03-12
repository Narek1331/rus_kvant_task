<?php

namespace App\Repositories;

use App\Models\Feedback;

class FeedbackRepository
{
    /**
     * Retrieve all feedbacks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllFeedbacks()
    {
        // Retrieve all feedbacks from the Feedback model
        return Feedback::all();
    }
}
