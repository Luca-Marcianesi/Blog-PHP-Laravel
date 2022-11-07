<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

       

        

        //utenti predefiniti

        DB::table('users')->insert([
            ['name' => 'blog', 'surname' => 'blog', 'email' => 'blog@gmail.it', 'username' => 'blogblog',
                'password' => Hash::make('PWQO3PQA'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'user'],

            ['name' => 'staff', 'surname' => 'staff', 'email' => 'staff@libero.it', 'username' => 'staffstaff',
                'password' => Hash::make('PWQO3PQA'), 'role' => 'staf','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'staf'],

            ['name' => 'admin', 'surname' => 'admin', 'email' => 'admin@gmail.it', 'username' => 'adminadmin',
                'password' => Hash::make('PWQO3PQA'), 'role' => 'admin','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'admin'],
        
        ]);


       

    }

}
