<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:command {name} {--age=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Greet a user with their name and age';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $age = $this->option('age');
        $this->info("Hello, $name!");
        if ($age) {
            $this->info("You are $age years old.");
        }
        if ($this->confirm('Do you wish to continue?')) {
            $this->info('Continuing the command...');
        }
        $this->trap(SIGINT, function () {
            $this->info('Command interrupted');
        });
        event(new \App\Events\CustomCommandExecuted($this));
        $this->info('Command executed successfully!');  
    }
}
