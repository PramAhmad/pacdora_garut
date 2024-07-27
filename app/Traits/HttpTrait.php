<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

trait HttpTrait
{
    public function get($path)
    {
        // Generate a cache key based on the path
        $cacheKey = 'api_cache_' . md5($path);

        $data = Cache::remember($cacheKey, 60, function () use ($path) {
            $response = Http::withHeaders([
                'appId' => "71ee73045e3480fe",
            'appKey' => "a3e831ccfa3ffd84"
            ])->get($path);

            if ($response->successful()) {
                return $response->json();
            } else {
                return [
                    'error' => 'Failed to fetch data',
                    'status' => $response->status()
                ];
            }
        });

        return $data;
    }

    public function post($path, $data)
    {
        $response = Http::withHeaders([
            'appId' => "71ee73045e3480fe",
            'appKey' => "a3e831ccfa3ffd84"
        ],)->post($path, $data);

        if ($response->successful()) {
            return $response->json();
        } else {
            return [
                'error' => 'Failed to post data',
                'status' => $response->status()
            ];
        }
    }
}
