<?php

namespace App\Factories;

use App\Contracts\FeedbackStorageInterface;
use App\Services\DatabaseFeedbackStorageService;
use App\Services\FileFeedbackStorageService;

/**
 * Class FeedbackStorageFactory
 * Factory class for creating instances of FeedbackStorageInterface.
 */
class FeedbackStorageFactory
{
    /**
     * Create an instance of FeedbackStorageInterface based on the provided type.
     *
     * @param string $type The type of storage to create.
     * @return FeedbackStorageInterface The created instance.
     * @throws \InvalidArgumentException When an invalid storage type is provided.
     */
    public static function start(string $type): FeedbackStorageInterface
    {
        switch ($type) {
            case 'database':
                return new DatabaseFeedbackStorageService();
            case 'file':
                return new FileFeedbackStorageService();
            default:
                throw new \InvalidArgumentException("Invalid storage type provided.");
        }
    }
}
