<?php

namespace App\Database\Seeds;


class AdminSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'username'      => 'admin' . $i,
                'pass'          => password_hash("admin" . $i, PASSWORD_BCRYPT),
                'status'        => TRUE,
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),

            ];

            // Using Query Builder
            $this->db->table('tb_admin')->insert($data);
        }
    }
}
