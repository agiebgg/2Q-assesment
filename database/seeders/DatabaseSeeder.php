<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User,Companies};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *  php artisan db:seed --class=UserTableSeeder
     * *  php artisan db:seed --class=CompanyTableSeeder
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->command->info('User Table Seeded!');
        $this->call('CompanyTableSeeder');
        $this->command->info('Company Table Seeded!');
    }
}

class UserTableSeeder extends Seeder
{
	public function run()
    {
        DB::table('users')->delete();

        User::create([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('password'),
        	'user_type' => '1',
        ]);

        

    }
}

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->delete();

        Companies::create([
            'name' => 'Company A',
            'email' => 'company@gmail.com',
            'logo' => '',
            'website_link' => '',
        ]);

        

    }
}
