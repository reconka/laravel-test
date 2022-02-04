<?php

namespace App\Services\Api;

interface ApiServiceInterface
{
    /**
     * @return array
     */
    public function getUsers(): array;
}
