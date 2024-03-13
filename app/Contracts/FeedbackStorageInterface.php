<?php

namespace App\Contracts;

/**
 * Interface FeedbackStorageInterface
 * @package App\Contracts
 */
interface FeedbackStorageInterface
{
    /**
     * Get all feedback entries.
     *
     * @return array
     */
    public function getAll();

    /**
     * Save a feedback entry.
     *
     * @param array $data The data to be saved.
     * @return bool True on success, false on failure.
     */
    public function save(array $data);
}
