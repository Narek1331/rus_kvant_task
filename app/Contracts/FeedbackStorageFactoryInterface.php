<?php

namespace App\Contracts;

/**
 * Interface FeedbackStorageFactoryInterface
 * @package App\Contracts
 */
interface FeedbackStorageFactoryInterface
{
    /**
     * Start the feedback storage factory.
     *
     * @return FeedbackStorageInterface
     */
    public function start(): FeedbackStorageInterface;
}
