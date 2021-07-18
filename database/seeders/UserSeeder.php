<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();
        User::create(['email' => 'foo@bar.com']); // this doesn't work because you don't have default values
        // for other columns. So you can't just insert email here.

    }
}
