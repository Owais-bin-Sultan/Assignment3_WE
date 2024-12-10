<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubService;

class SubServicesTableSeeder extends Seeder
{
    public function run()
    {
        SubService::insert([
            [
                'Name' => 'School Dance Photography',
                'Price' => '$150 per hour',
                'Details' => 'Includes candid and posed shots of the event.'
            ],
            [
                'Name' => 'Graduation Portraits',
                'Price' => '$200 per session',
                'Details' => 'Includes cap and gown, group shots, and individual portraits.'
            ],
            [
                'Name' => 'Team Photos',
                'Price' => '$100 per team',
                'Details' => 'Formal team photos and candid shots during events.'
            ],
            [
                'Name' => 'Engagement Photoshoot',
                'Price' => '$300 per session',
                'Details' => 'Up to 2 hours of photography at a location of your choice.'
            ],
            [
                'Name' => 'Wedding Photography',
                'Price' => '$1,500 - $3,000',
                'Details' => 'Full-day coverage, including pre-ceremony, ceremony, and reception.'
            ],
            [
                'Name' => 'Formal Event Photography',
                'Price' => '$200 per hour',
                'Details' => 'Covers formal corporate events like conferences and galas.'
            ],
            [
                'Name' => 'Corporate Headshots',
                'Price' => '$100 per person',
                'Details' => 'Includes professional lighting and editing.'
            ],
            [
                'Name' => 'Team Portraits',
                'Price' => '$250 per team',
                'Details' => 'Group photos of your entire team in a professional setting.'
            ],
            [
                'Name' => 'Studio Portrait Session',
                'Price' => '$250 per session',
                'Details' => 'Includes 1-hour session in a professional studio with props.'
            ],
            [
                'Name' => 'Outdoor Portrait Session',
                'Price' => '$300 per session',
                'Details' => '1.5 hours at an outdoor location of your choice.'
            ],
            [
                'Name' => 'Student Photography Contest',
                'Price' => '$25',
                'Details' => 'Free photoshoot session for the winner.'
            ],
            [
                'Name' => 'Wedding & Engagement Contest',
                'Price' => '$50',
                'Details' => 'Full-day wedding photography package for the winner.'
            ],
            [
                'Name' => 'Private Event Photography',
                'Price' => '$200 per hour',
                'Details' => 'Includes coverage of birthdays, anniversaries, and more.'
            ],
            [
                'Name' => 'Corporate Event Photography',
                'Price' => '$250 per hour',
                'Details' => 'Perfect for company parties, conferences, and formal gatherings.'
            ],
            [
                'Name' => 'Beginner Photography',
                'Price' => '$150',
                'Details' => 'One night a week for three weeks, 6:00 PM - 8:00 PM'
            ],
            [
                'Name' => 'Intermediate Photography',
                'Price' => '$200',
                'Details' => 'One night a week for three weeks, 6:00 PM - 8:00 PM'
            ],
            [
                'Name' => 'Advanced Photography',
                'Price' => '$250',
                'Details' => 'One night a week for three weeks, 6:00 PM - 8:00 PM'
            ],
        ]);
    }
}
