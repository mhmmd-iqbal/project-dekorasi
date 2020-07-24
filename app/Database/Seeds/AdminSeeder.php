<?php

namespace App\Database\Seeds;


class AdminSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'admin',
            'pass'          => password_hash("admin", PASSWORD_BCRYPT),
            'status'        => TRUE,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),

        ];

        // Using Query Builder
        $this->db->table('tb_admin')->insert($data);
    }
}
