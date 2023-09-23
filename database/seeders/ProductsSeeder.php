<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Wireless Keyboard',
                'price' => 1399,
                'description' => 'Wireless Bluetooth Multi-Device Keyboard for Windows, Apple iOS Android Or Chrome, Compact Space-Saving Design, for Pc/Mac/Laptop/Smartphone/Tablet.',
            ],
            [
                'name' => 'USB Stick',
                'price' => 2299,
                'description' => 'Amazon Basics 4G LTE WiFi USB Dongle Stick with All SIM Support | Plug & Play Data Card with up to 150Mbps Data Speed, Hotspot for 10 People, Premium QUALCOMM Chipset, Single_Band, Black.',
            ],
            [
                'name' => 'Pen Drive',
                'price' => 299,
                'description' => 'SanDisk Cruzer Blade 32GB USB Flash Drive. Store more with capacities up to 16gb 5-year limited warranty , High-Capacity Drive Accommodates Your Favorite Media Files. Write Speed : 20 MB/s (USB 2.0).',
            ],
            [
                'name' => 'Adapder',
                'price' => 150,
                'description' => 'AGARO Dual Port Wall Charger, Fast Charging, 3.1 Amps, Compatible with USB Type C, Micro Cable, Charger for All Smartphones & Tablets- Black.',
            ],
            [
                'name' => 'Cable',
                'price' => 129,
                'description' => 'Portronics Konnect L POR-1081 Fast Charging 3A Type-C Cable 1.2Meter with Charge & Sync Function for All Type-C Devices (Grey).',
            ],
            [
                'name' => 'Modem',
                'price' => 1549,
                'description' => 'TP-LINK TD-W8961N 300 MbpsWireless N300 ADSL2+ Wi-Fi Modem Router, 2x 5dBi Omni directional Fixed antennas, Input ISPs supported- BSNL, MTNL, Tata Indicom (RJ-11 Port), Dual band , White.'
            ],
            [
                'name' => 'Keyboard Skin',
                'price' => 85,
                'description' => 'Gizga Essentials Universal Silicone Keyboard Protector Skin for 15.6 Inch Laptop |Keyboard Dust Cover | 15.6" Keyguard (36.5 x 13.5 cm).',
            ],
            [
                'name' => 'Laptop Case',
                'price' => 249,
                'description' => 'Dyazo Slim 15" to 15.6 Inch Laptop Sleeve, Laptop Case with Handle & Accessories Pocket Universal Compatible for Dell, HP, Lenovo, Asus and All Other Notebook etc. (Grey).',
            ],
            [
                'name' => 'Laptop Table',
                'price' => 599,
                'description' => 'Callas Multipurpose Foldable Laptop Table with Cup Holder | Drawer | Mac Holder | Table Holder Study Table, Breakfast Table, Foldable and Portable/Ergonomic & Rounded Edges/Non-Slip Legs (WA-27-Black).',
            ],
            [
                'name' => 'Mouse',
                'price' => 595,
                'description' => 'Logitech B170 Wireless Mouse, 2.4 GHz with USB Nano Receiver, Optical Tracking, 12-Months Battery Life, Ambidextrous, PC/Mac/Laptop - Black.',
            ],
            [
                'name' => 'Laptop Bag',
                'price' => 349,
                'description' => 'Gizga Essentials Laptop Bag Sleeve Case Cover Pouch for 15.6 Inch Laptop for Men & Women, Padded Laptop Compartment, Free Accessories Pouch, Premium Zipper Closure, Water Repellent Nylon Fabric, Grey.'
            ],
            [
                'name' => 'Soft Brush',
                'price' => 85,
                'description' => 'Sounce Cleaning Soft Brush Keyboard Cleaner 5-in-1 Multi-Function Computer Cleaning Tools Kit Corner Gap Duster Keycap Puller for Bluetooth Earphones Lego Laptop AirPods Pro Camera Lens (Red).'
            ]

        ];
        Product::insert($products);
    }
}
