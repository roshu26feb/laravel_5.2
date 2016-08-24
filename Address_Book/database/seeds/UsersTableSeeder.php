<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = array(
           array(
                'id'            => 1,
                'username' => 'roshni',
				'email'=> 'roshu26feb@gmail.com',
                'password' => Hash::make('test123'),
            )
        );

        DB::table('users')->insert( $users );
	
    }

}