<?php

use Illuminate\Database\Seeder;

class AdminTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
          'name' => 'Raka Suwarna',
          'email' => 'admin1@raka.com',
          'phone' => "0811458878",
          'status' => "avaliable",
          'password' => bcrypt('secret'),
      ]);

    }
}
