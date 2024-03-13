<?php

namespace App\Services;

use App\Contracts\FeedbackStorageInterface;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileFeedbackStorageService
 * @package App\Services
 */
class FileFeedbackStorageService implements FeedbackStorageInterface
{
    /**
     * Get all feedback entries from the file.
     *
     * @return array|\Illuminate\Http\JsonResponse The feedback entries as an array or a JSON response on error.
     */
    public function getAll()
    {
        // Read the contents of the file
        $contents = Storage::disk('local')->get('feedbacks.json');

        // Convert JSON string to array
        $feedbacks = json_decode($contents, true);

        // Check if decoding was successful
        if ($feedbacks === null && json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Failed to parse JSON file'], 500);
        }

        // Return the feedbacks as an array
        return $feedbacks;
    }

    /**
     * Save a feedback entry to the file.
     *
     * @param array $feedback The feedback data to be saved.
     * @return void
     */
    public function save(array $feedback)
    {
        // Check if the file exists and is not empty
        $path = 'feedbacks.json';
        if (Storage::disk('local')->exists($path) && Storage::disk('local')->size($path) > 0) {
            // Load existing content from the file
            $existingContent = Storage::disk('local')->get($path);
            $existingFeedback = json_decode($existingContent, true);

            // Append new feedback to existing content
            $existingFeedback[] = $feedback;
            $content = json_encode($existingFeedback);
        } else {
            // If the file is empty or doesn't exist, create a new file with the feedback data
            $content = json_encode([$feedback]);
        }

        // Write content to the file
        Storage::disk('local')->put($path, $content);
    }
}
