<?php

namespace Hungnm28\LaravelModuleAdmin\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{


    protected $signature = 'lma:create-admin {--force}';

    protected $description = 'Create Admin User';

    public function handle()
    {
        $email = $this->ask('Please enter a email to login');
        $user = User::whereEmail($email)->first();
        if($user){
            $this->error("Email: $email exist!");
            return false;
        }

        $password = Hash::make($this->secret('Please enter a password to login'));

        $name = $this->ask('Please enter a name to display');

        $is_admin = 1;

        $roles = Role::all();
        $selectedOption = $roles->pluck('name')->toArray();

        $role = null;
        if (!empty($selectedOption)) {
            $selected = $this->choice('Please choose a role for the user', $selectedOption, null, null, true);

            $role = $roles->filter(function ($role) use ($selected) {
                return in_array($role->name, $selected);
            });
        }
        $user = User::create(compact("name","email","password","is_admin"));

        if ($role) {
            $user->roles()->attach($role);
        }

        $this->info("User [$name] created successfully.");

    }
}
