<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name' => 'Tatlı Kutusu'],
            ['name' => 'Meyveli Çikolatalı Kaplar'],
            ['name' => 'Şerbetli Tatlılar'],
            ['name' => 'Sütlü Tatlılar'],
            ['name' => 'Waffles'],
        ]);
    }
}
