<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateAdminUser extends Migration
{
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'Admin', // Admin's name
            'email' => 'saduaad55@gmail.com', // Admin's email
            'password' => bcrypt('saad123'), // Admin's password (make sure it's hashed)
            'role' => 'admin', // Assign the 'admin' role
        ]);
    }

    public function down()
    {
        DB::table('users')->where('email', 'saduaad55@gmail.com')->delete();
    }
}
