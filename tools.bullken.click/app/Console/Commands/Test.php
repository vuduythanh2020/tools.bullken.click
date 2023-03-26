<?php

namespace App\Console\Commands;

use App\Http\Services\ToolService;
use App\Http\Services\UserService;
use App\Models\User;
use App\Rules\CreateUserValidation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Contracts\KafkaConsumerMessage;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;
use Mockery;

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
        $userMock = Mockery::mock(User::class);
    }
}
