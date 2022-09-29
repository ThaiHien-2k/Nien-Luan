<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'id'=>1,
                'user_id'=>1,
                'phonenumber'=>'011151552928',
              
                'address'=>'Buangkok Green 512-4a',
            
            ],
           

        ]);
    }
}