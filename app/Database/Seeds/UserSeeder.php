<?php

namespace App\Database\Seeds;


class UserSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                        'username'      => 'jd-01',
                        'pass'          => password_hash("user", PASSWORD_BCRYPT),
                        'name'          => 'Muhammad Iqbal',
                        'phone'         => '0802191727',
                        'status'        => TRUE,
                        'created_at'    => date('Y-m-d h:i:s'),
                        'updated_at'    => date('Y-m-d h:i:s'),

                ];

                // Using Query Builder
                $this->db->table('tb_user')->insert($data);
        }
}
