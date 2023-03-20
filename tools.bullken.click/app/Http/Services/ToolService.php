<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\AggregateException;
use GuzzleHttp\Promise\Utils;

class ToolService
{
    public function repeatRequest(string $url, array $headers, string $body = null, int $count = 10): string
    {
        $parseUrl     = parse_url($url);
        $baseUri      = $parseUrl['scheme'] . '://' . $parseUrl['host'];
        $endPoint     = $parseUrl['path'] ?? '/';
        $flashHeaders = [];
        foreach ($headers as $header) {
            $flashHeaders = array_merge($flashHeaders, $header);
        }
        $flashHeaders['Content-Type'] = 'application/json';
        $client                       = new Client([
            'base_uri' => $baseUri,
            'headers' => $flashHeaders
        ]);
        $method                       = $body ? 'postAsync' : 'getAsync';
        $promises                     = [];
        for ($i = 0; $i < $count; $i++) {
            if ($method == 'postAsync') {
                $promises[] = $client->postAsync($endPoint, ['json' => json_decode($body, true)]);
            } else {
                $promises[] = $client->getAsync($endPoint);
            }
        }

        try {
            Utils::some(
                2,
                $promises
            )->wait();
        } catch (AggregateException $aggregateException) {
            return 'Great!!! The double request was prevent...';
        }

        return 'Hmm!!! Two more requests have been successful...';
    }
}
