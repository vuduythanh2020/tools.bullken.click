<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\KafkaConsumerMessage;

class TestConsumerKafka extends Command
{
    protected $signature = "consume:my-topic";

    protected $description = "Consume Kafka messages from 'my-topic'.";

    public function handle()
    {
        $consumer = Kafka::createConsumer(['topic1'])
            ->withBrokers('kafka:9092')
            ->withAutoCommit()
            ->withHandler(function(KafkaConsumerMessage $message) {
                $this->info(json_encode($message->getBody()));
            })
            ->build();

        $consumer->consume();
    }
}
