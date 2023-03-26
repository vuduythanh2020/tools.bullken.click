<?php

namespace Tests\Unit;

use App\Http\Services\ToolService;
use PHPUnit\Framework\TestCase;

class RepeatRequestTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testRepeatRequest(): void
    {
        $url = 'https://24h.com.vn';
        $headers = [];
        $body = '';
        $count = 3;

        $result = app(ToolService::class)->repeatRequest($url, $headers, $body, $count);

        $this->assertStringContainsString('Two more requests have been successful', $result);
    }
}
