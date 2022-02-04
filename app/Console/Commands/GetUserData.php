<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\Api\ApiServiceInterface;
use App\Services\Api\Requres\RequresService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetUserData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get User data from API endpoint';
    private ApiServiceInterface $apiService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ApiServiceInterface $apiService)
    {
        $this->apiService = $apiService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->info('Getting data from API');
        try {
            $users = $this->apiService->getUsers();
        } catch (ConnectionException $exception) {
            $this->error('There was a problem: '. $exception->getMessage());
            return 1;
        }

        $this->info('Saving to Database');

//      User::insert($users); (This is faster, and nicer way)
        foreach ($users as $user) {
            User::create($user);
        }

        return 0;
    }
}
