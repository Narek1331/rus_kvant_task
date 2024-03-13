<?php

namespace App\Services;

use App\Contracts\FeedbackStorageInterface;
use App\Models\Feedback;

/**
 * Class DatabaseFeedbackStorageService
 * @package App\Services
 */
class DatabaseFeedbackStorageService implements FeedbackStorageInterface
{
    /**
     * Get all feedback entries from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Feedback::get();
    }

    /**
     * Save a feedback entry to the database.
     *
     * @param array $feedback The feedback data to be saved.
     * @return void
     */
    public function save(array $feedback)
    {
        Feedback::create($feedback);
    }
}
