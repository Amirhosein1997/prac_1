<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users=[
            [
              'name'=>'owner',
                'email'=>'amir@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'owner',
            ],
            [
                'name'=>'admin1',
                'email'=>'admin1@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'admin',
            ],
            [
                'name'=>'admin2',
                'email'=>'admin2@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'admin',
            ],
            [
                'name'=>'admin3',
                'email'=>'admin3@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'admin',
            ],
            [
                'name'=>'visitor1',
                'email'=>'visitor1@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor2',
                'email'=>'visitor2@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor3',
                'email'=>'visitor3@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor4',
                'email'=>'visitor4@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor5',
                'email'=>'visitor5@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor6',
                'email'=>'visitor6@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor7',
                'email'=>'visitor7@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor8',
                'email'=>'visitor8@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor9',
                'email'=>'visitor9@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],
            [
                'name'=>'visitor10',
                'email'=>'visitor10@gmail.com',
                'password'=>hash::make('password'),
                'type'=>'visitor',
            ],


        ];
        foreach ($users as $user){
            User::create($user);
        }
    }
}
