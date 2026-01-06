<?php
class BourseRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getTotalDistributed()
    {
        // Placeholder implementation
        // Assuming a table 'bourses' or similar exists, but schema not provided.
        // Returning 0 to prevent crash.
        return 0;
    }

    public function getCountSent()
    {
        // Placeholder implementation
        return 0;
    }
}
