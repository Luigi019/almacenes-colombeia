<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // almacen
        User::create([
            'name' => 'Anderson Gonzalez',
            'email' => 'andersongb1007@almacen.com',
            'cedula' => '29577',
            'edad' => '21',
            'password' => bcrypt('12345678')
        ])->assignRole('Almacen');

        User::create([
            'name' => 'Jesus Perera',
            'email' => 'jesus2perera3@almacen.com',
            'cedula' => '29511',
            'edad' => '21',
            'password' => bcrypt('12345678')
        ])->assignRole('Almacen');

        User::create([
            'name' => 'Carlos Perez',
            'email' => 'karlosdanielp93@almacen.com',
            'cedula' => '29524',
            'edad' => '21',
            'password' => bcrypt('12345678')
        ])->assignRole('Almacen');


            //seguridad
        User::create([
            'name' => 'Anderson Gonzalez',
            'email' => 'andersongb1007@ordenes.com',
            'cedula' => '295778',
            'edad' => '21',
            'password' => bcrypt('12345678')
        ])->assignRole('Ordenes');

        User::create([
            'name' => 'Jesus Perera',
            'email' => 'jesus2perera3@ordenes.com',
            'cedula' => '295111',
            'edad' => '21',
            'password' => bcrypt('12345678')
        ])->assignRole('Ordenes');

        User::create([
            'name' => 'Carlos Perez',
            'email' => 'karlosdanielp93@ordenes.com',
            'cedula' => '295222',
            'edad' => '21',
            'password' => bcrypt('12345678')
        ])->assignRole('Ordenes');


            //administrador de perfiles
            User::create([
                'name' => 'Anderson Gonzalez',
                'email' => 'andersongb1007@admin.com',
                'cedula' => '2957782',
                'edad' => '21',
                'password' => bcrypt('12345678')
            ])->assignRole('Administrador de perfiles');
    
            User::create([
                'name' => 'Jesus Perera',
                'email' => 'jesus2perera3@admin.com',
                'cedula' => '295666',
                'edad' => '21',
                'password' => bcrypt('12345678')
            ])->assignRole('Administrador de perfiles');
    
            User::create([
                'name' => 'Carlos Perez',
                'email' => 'karlosdanielp93@admin.com',
                'cedula' => '2952222',
                'edad' => '21',
                'password' => bcrypt('12345678')
            ])->assignRole('Administrador de perfiles');

        User::factory(20)->create();
    }
}
