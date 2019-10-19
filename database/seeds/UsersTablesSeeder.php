<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
        ]);
        //$users = DB::table('employees')->insert('employeeNumber', 'firstName','lastName')->get();
         //User::create([
            //  foreach($users as $user){
            //     var_dump($user);  
            //  }
        //     'employeeNumber'      =>  '1234',
        //     'firstName'           =>  'mooknaja',
        //     'lastName'            =>  'thithi',
         //    'password'            =>  Hash::make('password'),
         //    'remember_Token'      =>  str_random(10)
         //]);
    }
}
