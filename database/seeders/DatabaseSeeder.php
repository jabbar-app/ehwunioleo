<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Provider;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Waste;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $wastes = [
      ['waste_name' => 'Activated Carbon',    'waste_code' => 'A 110 D', 'packaging' => 'Jumbo Bag',       'capacity' => '0',  'used' => '0'],
      ['waste_name' => 'Ex Chemical Solid',   'waste_code' => 'A 338-1', 'packaging' => 'Jumbo Bag',  'capacity' => '0',  'used' => '0'],
      ['waste_name' => 'Ex Chemical Liquid',  'waste_code' => 'A 338-1', 'packaging' => 'IBC',        'capacity' => '12', 'used' => '0'],
      ['waste_name' => 'Ex Packaging',        'waste_code' => 'B 104 D', 'packaging' => 'Box',        'capacity' => '12', 'used' => '0'],
      ['waste_name' => 'Filter Bekas',        'waste_code' => 'B 109 D', 'packaging' => 'Jumbo Bag',  'capacity' => '0',  'used' => '0'],
      ['waste_name' => 'Glycerine Pitch',     'waste_code' => 'A 343-1', 'packaging' => 'Jumbo Bag',       'capacity' => '32', 'used' => '0'],
      ['waste_name' => 'Lampu Bekas',         'waste_code' => 'B 107 D', 'packaging' => 'Jumbo Bag',  'capacity' => '1',  'used' => '0'],
      ['waste_name' => 'Nickel Catalyst',     'waste_code' => 'B 343-1', 'packaging' => 'Jumbo Bag',       'capacity' => '20', 'used' => '0'],
      ['waste_name' => 'Refigrant Bekas',     'waste_code' => 'A 111 D', 'packaging' => 'Jumbo Bag',       'capacity' => '0',  'used' => '0'],
      ['waste_name' => 'Spent Bleaching Earth', 'waste_code' => 'B 413', 'packaging' => 'Jumbo Bag',       'capacity' => '20', 'used' => '0'],
      ['waste_name' => 'Used Oil',            'waste_code' => 'B 105 D', 'packaging' => 'Jumbo Bag',       'capacity' => '24', 'used' => '0'],
      ['waste_name' => 'Used Rags',           'waste_code' => 'B 110 D', 'packaging' => 'Jumbo Bag',  'capacity' => '12', 'used' => '0'],
      ['waste_name' => 'WWTP Sludge',         'waste_code' => 'B 343-2', 'packaging' => 'IBC',        'capacity' => '22', 'used' => '0'],
    ];

    foreach ($wastes as $waste) {
      Waste::create($waste);
    }

    $providers = [
      ['name' => 'PT. Sumatera Deli Lestari Indah (SDLI)', 'waste' => 'Glycerine Pitch, Ex Chemical Solid, Ex Chemical Liquid', 'address' => 'Sei Jernih Dusun XIX, Desa, Sampali, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371', 'contract' => '2014-12-12 s.d. 2015-12-12'],
      ['name' => 'PT. Prasadha Pamunah Limbah Industri (PPLI)', 'waste' => 'Glycerine Pitch, Ex Chemical Solid, Ex Chemical Liquid', 'address' => 'Sei Jernih Dusun XIX, Desa, Sampali, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371', 'contract' => '2014-12-12 s.d. 2015-12-12'],
    ];

    foreach ($providers as $provider){
      Provider::create($provider);
    }


    $schedules = [
      ['user_name' => 'Jabbar Ali Panggabean', 'user_id' => '1', 'waste_name' => 'Glycerine Pitch', 'waste_code' => 'A 343-1', 'source' => 'Fatty Acid', 'amount' => '3', 'weight' => '3', 'packaging' => 'Jumbo Bag', 'dispose_to' => 'PT. Sumatera Deli Lestari Indah (SDLI)', 'status' => 'On Request'],
      ['user_name' => 'Kamadou Tanjiro', 'user_id' => '2', 'waste_name' => 'Activated Carbon', 'waste_code' => 'A 110 D', 'source' => 'Soap', 'amount' => '5', 'weight' => '3', 'packaging' => 'Jumbo Bag', 'dispose_to' => 'PT. Sumatera Deli Lestari Indah (SDLI)', 'status' => 'Correction'],
    ];

    foreach ($schedules as $schedule){
      Schedule::create($schedule);
    }


    $reports = [
      ['date_in' => '2023-01-01', 'date' => '2023-01-01', 'user_name' => 'Jabbar Ali Panggabean', 'user_id' => '1', 'waste_name' => 'Glycerine Pitch', 'waste_code' => 'A 343-1', 'source' => 'Fatty Acid', 'amount' => '3', 'weight' => '2',  'packaging' => 'Jumbo Bag', 'dispose_to' => 'PT. Sumatera Deli Lestari Indah (SDLI)', 'cost' => '1000', 'note' => 'Catatan'],
      ['date_in' => '2023-01-01', 'date' => '2023-01-01', 'user_name' => 'Kamadou Tanjiro', 'user_id' => '2', 'waste_name' => 'Activated Carbon', 'waste_code' => 'A 110 D', 'source' => 'Soap', 'amount' => '5', 'weight' => '2', 'packaging' => 'Jumbo Bag', 'dispose_to' => 'PT. Sumatera Deli Lestari Indah (SDLI)', 'cost' => '1000', 'note' => 'Catatan'],
      ['date_in' => '2023-01-01', 'date' => '2023-01-01', 'user_name' => 'Kamadou Tanjiro', 'user_id' => '2', 'waste_name' => 'Activated Carbon', 'waste_code' => 'A 110 D', 'source' => 'Soap', 'amount' => '5', 'weight' => '5', 'packaging' => 'Jumbo Bag', 'dispose_to' => 'PT. Sumatera Deli Lestari Indah (SDLI)', 'cost' => '4000', 'note' => 'Catatan'],
    ];

    foreach ($reports as $report){
      Report::create($report);
    }

    $sources = [
      ['name' => 'Fatty Acid'],
      ['name' => 'Dove'],
      ['name' => 'Soap'],
      ['name' => 'Betaine'],
      ['name' => 'WWTP'],
      ['name' => 'Warehouse'],
      ['name' => 'Flacking Bagging'],
      ['name' => 'Tank Farm'],
    ];

    DB::table('sources')->insert($sources);

    User::factory()->create([
      'name' => 'Super Admin',
      'nik' => '123456789',
      'department' => 'SHE',
      'title' => 'Team Leader',
      'role' => 'Super Admin',
      'email' => 'jabbarpanggabean@gmail.com',
    ]);

    User::factory()->create([
      'name' => 'Kamadou Tanjiro',
      'nik' => '123456786',
      'department' => 'Logistics',
      'title' => 'Team Leader',
      'role' => 'User',
      'email' => 'jabbarp17@gmail.com',
    ]);

    // User::factory(10)->create();

    DB::table('departments')->insert([
      ['name' => 'Fatty Acid'],
      ['name' => 'Dove'],
      ['name' => 'Soap'],
      ['name' => 'Betaine'],
      ['name' => 'Logistic'],
      ['name' => 'HRBP'],
      ['name' => 'Procurement'],
      ['name' => 'Sales'],
      ['name' => 'SHE'],
      ['name' => 'Community Engagement'],
      ['name' => 'Planning'],
    ]);

    DB::table('titles')->insert([
      ['title' => 'Admin'],
      ['title' => 'Operator'],
      ['title' => 'Team Leader'],
      ['title' => 'Engineer'],
      ['title' => 'Assistant Manager'],
      ['title' => 'Manager'],
    ]);
  }
}
