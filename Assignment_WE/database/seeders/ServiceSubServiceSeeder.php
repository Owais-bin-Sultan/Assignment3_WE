<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSubServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('service_sub_service')->insert([
            // Linking sub-services to "Student Photography" (ServiceID 1)
            ['ServiceID' => 1, 'SubServiceID' => 1],
            ['ServiceID' => 1, 'SubServiceID' => 2],
            ['ServiceID' => 1, 'SubServiceID' => 3],
            
            // Linking sub-services to "Wedding & Engagement Photography" (ServiceID 2)
            ['ServiceID' => 2, 'SubServiceID' => 4],
            ['ServiceID' => 2, 'SubServiceID' => 5],
            
            // Linking sub-services to "Corporate Photography" (ServiceID 3)
            ['ServiceID' => 3, 'SubServiceID' => 6],
            ['ServiceID' => 3, 'SubServiceID' => 7],
            ['ServiceID' => 3, 'SubServiceID' => 8],
            
            // Linking sub-services to "Family & Child Portraits" (ServiceID 4)
            ['ServiceID' => 4, 'SubServiceID' => 9],
            ['ServiceID' => 4, 'SubServiceID' => 10],
            
            // Linking sub-services to "Photography Competitions" (ServiceID 5)
            ['ServiceID' => 5, 'SubServiceID' => 11],
            ['ServiceID' => 5, 'SubServiceID' => 12],
            
            // Linking sub-services to "Event Photography" (ServiceID 6)
            ['ServiceID' => 6, 'SubServiceID' => 13],
            ['ServiceID' => 6, 'SubServiceID' => 14],
            
            // Linking sub-services to "Photography Sessions" (ServiceID 7)
            ['ServiceID' => 7, 'SubServiceID' => 15],
            ['ServiceID' => 7, 'SubServiceID' => 16],
            ['ServiceID' => 7, 'SubServiceID' => 17],
        ]);
    }
}

