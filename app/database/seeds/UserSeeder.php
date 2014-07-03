<?php

class UserSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

    User::create(['username' => 'admin', 'password' => Hash::make('asdf'), 'role' => 'admin']);
    User::create(['username' => 'ionutz16', 'password' => Hash::make('asdf'), 'role' => 'user']);
    // $this->call('UserTableSeeder');
  }
}
