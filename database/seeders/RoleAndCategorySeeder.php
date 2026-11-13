<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAndCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'journalist'],
            ['name' => 'reader'],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Наука'],
            ['name' => 'Технологии'],
            ['name' => 'Спорт'],
        ]);
    }
}