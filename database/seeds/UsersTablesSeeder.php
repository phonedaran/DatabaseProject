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
            'employeeNumber' => DB::random(10),
            'firstName' => DB::random(10),
            'lastName' => DB::random(10),
            'password' => Hash::make('password'),
            'remember_Token' => str::random(10),
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
