<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = '<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p><p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.</p>';

    public function run() {

       

        DB::table('users')->insert([
            ['name' => 'luca', 'surname' => 'marcia', 'email' => 'luca@libero.it', 'username' => 'lucaluca',
                'password' => Hash::make('lucaluca'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'luca'],
            ['name' => 'staf', 'surname' => 'marcia', 'email' => 'luca@libero.it', 'username' => 'stafstaf',
                'password' => Hash::make('lucaluca'), 'role' => 'staf','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'staf'],
            ['name' => 'admin', 'surname' => 'marcia', 'email' => 'luca@libero.it', 'username' => 'adminadmin',
                'password' => Hash::make('lucaluca'), 'role' => 'admin','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'admin'],
            ['name' => 'pippo', 'surname' => 'coca', 'email' => 'pippo@coca.it', 'username' => 'pippococa',
                'password' => Hash::make('lucaluca'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'pippo'],
            ['name' => 'edo', 'surname' => 'taru', 'email' => 'edo@taru.it', 'username' => 'edoedo',
                'password' => Hash::make('lucaluca'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'edo'],
            ['name' => 'diego', 'surname' => 'migna', 'email' => 'diego@migna.it', 'username' => 'diedie',
                'password' => Hash::make('lucaluca'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'edo'],
            ['name' => 'fb', 'surname' => 'fb', 'email' => 'fb@michele.it', 'username' => 'fabioblack',
                'password' => Hash::make('lucaluca'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'edo'],
            ['name' => 'dio', 'surname' => 'santo', 'email' => 'dio@santo.it', 'username' => 'dioasanto',
                'password' => Hash::make('lucaluca'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),'data_nascita' => date("Y-m-d H:i:s"), 'descrizione'=> 'edo']
        
        ]);


        DB::table('amicizia')->insert([
            ['richiedente' => 4, 'destinatario' => 1,
                'visualizzata' => 1, 'stato' => 1, 'data' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['richiedente' => 5, 'destinatario' => 1,
                'visualizzata' => 1, 'stato' => 1, 'data' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['richiedente' => 6, 'destinatario' => 1,
                'visualizzata' => 1, 'stato' => 1, 'data' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['richiedente' => 7, 'destinatario' => 1,
                'visualizzata' => 1, 'stato' => 1, 'data' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['richiedente' => 1, 'destinatario' => 8,
                'visualizzata' => 1, 'stato' => 1, 'data' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            
        ]);

    }

}
