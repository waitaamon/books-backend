<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = '[
            {
                "name": "Admin Amon",
                "email": "waitaamon@jkuat.ac.ke",
                "password": "admin100"
            }
        ]';

        foreach (json_decode($users) as $user) {
            $u = new \App\Models\User();
            $u->name = $user->name;
            $u->email = $user->email;
            $u->password = bcrypt($user->password);
            $u->save();
        }
    }
}
