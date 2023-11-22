<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-admin {email} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin account';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument("email");
        $password = $this->argument("password") ?? $this->secret("Password");

        User::create([
            "name" => "Admin",
            "email" => $email,
            "password" => bcrypt($password),
            "is_admin" => true
        ]);

        $this->info("Admin account created successfully");

        return 0;
    }
}
