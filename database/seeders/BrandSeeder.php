<?php

namespace Database\Seeders;

use App\Models\CgBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CgBrand::create([
            'brand_name' => 'Apple'
        ]);
        CgBrand::create([
            'brand_name' => 'Samsung'
        ]);
        CgBrand::create([
            'brand_name' => 'Epson'
        ]);
        CgBrand::create([
            'brand_name' => 'Dell'
        ]);
        CgBrand::create([
            'brand_name' => 'HP'
        ]);
        CgBrand::create([
            'brand_name' => 'Lenovo'
        ]);
        CgBrand::create([
            'brand_name' => 'Sony'
        ]);
        CgBrand::create([
            'brand_name' => 'Canon'
        ]);
        CgBrand::create([
            'brand_name' => 'ASUS'
        ]);
        CgBrand::create([
            'brand_name' => 'Acer'
        ]);
        CgBrand::create([
            'brand_name' => 'Microsoft'
        ]);
        CgBrand::create([
            'brand_name' => 'JBL'
        ]);
        CgBrand::create([
            'brand_name' => 'LG'
        ]);
        CgBrand::create([
            'brand_name' => 'MSI'
        ]);
        CgBrand::create([
            'brand_name' => 'AMD'
        ]);
        CgBrand::create([
            'brand_name' => 'Intel'
        ]);
        CgBrand::create([
            'brand_name' => 'NVidia'
        ]);
        CgBrand::create([
            'brand_name' => 'Kingston'
        ]);
        CgBrand::create([
            'brand_name' => 'Cisco'
        ]);
        CgBrand::create([
            'brand_name' => 'Logitech'
        ]);
        CgBrand::create([
            'brand_name' => 'Razer'
        ]);

    }
}
