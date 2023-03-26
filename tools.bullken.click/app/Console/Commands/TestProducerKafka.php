<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class TestProducerKafka extends Command
{
    protected $signature = "produce:kafka";

    protected $description = "Produce Kafka messages";

    public function handle(): void
    {
        $producerBuilder = Kafka::publishOn('topic1');
        $message = new Message(
            headers: ['aaa' => 'bbb'],
            body: ['122' => 'ccddsd'],
            key: 'abc'
        );
        $producerBuilder->withMessage($message)->send();
    }
}
