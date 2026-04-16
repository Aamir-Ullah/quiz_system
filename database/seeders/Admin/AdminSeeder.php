<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => "Admin1",
                "email" => "admin@123.com",
                "password" => bcrypt("admin123"),
                'role' => "admin"
            ],
            [
                'name' => "Admin2",
                "email" => "admin2@123.com",
                "password" => bcrypt("admin123"),
                'role' => "admin"
            ]
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
