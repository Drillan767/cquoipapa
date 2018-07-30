<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('users')->insert([
      'first_name' => str_random(10),
      'last_name' => str_random(10),
      'phone' => '0123456789',
      'roles' => 'client',
      'email' => str_random(10).'@gmail.com',
      'password' => bcrypt('secret'),
      'nb_api_call' => 0,
      'token' => '',
    ]);
  }
}
