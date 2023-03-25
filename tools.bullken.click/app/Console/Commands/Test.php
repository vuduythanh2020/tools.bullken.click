<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\KafkaConsumerMessage;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
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
