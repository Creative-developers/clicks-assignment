<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'name' => "Ahmed Nasrullah",
            "email" => "ahmednasrullah77@gmail.com",
            "phone_no" => "0589070830",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        
        DB::table('clients')->insert([
            'name' => "John Doe",
            "email" => "johnDoe@gmail.com",
            "phone_no" => "123456789",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
