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
        $brands = [
            '3Com',
            'Acer',
            'Acteck',
            'ADATA',
            'Akita',
            'Alaska',
            'Alienware',
            'Alton',
            'American Power Conversion',
            'AOpen',
            'APC',
            'Apolo',
            'Apple',
            'Artec',
            'Asaji',
            'ASUS',
            'AT&T',
            'Avaya',
            'AVC',
            'BenQ',
            'Belkin',
            'Best Power',
            'Bestec',
            'Blue Code',
            'Bose',
            'Boxlight',
            'Brother',
            'BTC',
            'Callcomp',
            'Canon',
            'Celmi',
            'Centra',
            'Cisco',
            'CNB',
            'Coin',
            'Compaq',
            'Creative',
            'Daewoo',
            'Data Shield',
            'Dell',
            'Delta',
            'Digital',
            'DSP',
            'Ecoin',
            'ECS',
            'Edge Systems',
            'EEE',
            'E-Geforce',
            'EMachines',
            'Epson',
            'Eti Palca',
            'Evotec',
            'Fabrireal',
            'Forza Power Technologies',
            'Gateway',
            'Genérico',
            'Genesis',
            'Genicom',
            'Genius',
            'Gigabyte',
            'Gigaware',
            'Green',
            'HGST',
            'Hipro',
            'Hitachi',
            'HP',
            'HS',
            'IBM',
            'IEMEX',
            'Intel',
            'ISB',
            'JBL',
            'Kingston',
            'Koblenz',
            'Kodak',
            'Lenovo',
            'LG',
            'Microsoft',
            'NVIDIA GeForce',
            'Panasonic',
            'Philips',
            'Pioneer',
            'Polaroid',
            'Samsung',
            'Steren',
            'Toshiba',
            'TP-Link',
            'Xerox',
        ];

        foreach ($brands as $brand) {
            CgBrand::create([
                'brand_name' => $brand,
            ]);
        }

    }
}
