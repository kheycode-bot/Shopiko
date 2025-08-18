<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'saduaad55@gmail.com'], 
            [
                'name' => 'Admin',
                'email' => 'saduaad55@gmail.com',
                'password' => bcrypt('saad123'), 
                'is_admin' => 1, 
            ]
        );

        
    }
}
