<?php

namespace App\Services\Api\Reqres;

use App\Services\Api\ApiServiceInterface;
use Illuminate\Support\Facades\Http;

class ReqresService implements ApiServiceInterface
{
    private readonly string $baseURL;

    public function __construct()
    {
        $this->baseURL = env('API_REQRES_ENDPOINT');
    }

    /**
     * Get User data from API
     * @param int $page
     * @return array{optional?: string, bar: int}
     */
    public function getUsers(int $page = 1): array
    {
        $response = Http::get($this->baseURL.'users?page='.$page)['data'];

        return $this->formatData($response);
    }

    /**
     * @param array $data
     * @return array
     */
    private function formatData(array $data =[]): array
    {
        return array_map(fn ($element) =>[
            'id' => $element['id'],
            'name' => $element['first_name']. ' ' . $element['last_name'],
            'email' => $element['email'],
            'password' => $element['password'] ?? 'randomPassword'
        ], $data);
    }
}
