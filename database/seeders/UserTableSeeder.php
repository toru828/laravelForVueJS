<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            1 => [
                'id' => 1,
                'name' => 'User1',
                'email' => 'test@example.com',
                'password' => '$2a$10$2yLXu/rmvTxaTAjA3LiHB.pHcKMx2OgYG.l1L8bS60KPW.Pj29d6W',
                'created_at' => '2021-05-16 11:50:23',
                'updated_at' => '2021-05-16 11:50:23',
            ],
            2 => [
                'id' => 2,
                'name' => 'User2',
                'email' => 'test55@example.com',
                'password' => '$2a$10$2yLXu/rmvTaewefasdAjA3LiHB.pHcKMx2OgYG.l1L8bS60KPW.Pj29d6W',
                'created_at' => '2021-05-16 11:50:23',
                'updated_at' => '2021-05-16 11:50:23',
            ],
        ]);
    }
}
