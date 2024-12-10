<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        Service::insert([
            [
                'Name' => 'Student Photography',
                'Description' => 'Capture the moments that define your school years. We specialize in creating memorable photography experiences for students, including school dances, graduations, and team photos!',
                'TableDescriptionText' => 'We specialize in capturing key moments from your school years, whether it\'s a school dance, graduation, or sports team photo. Our professional services ensure you have memorable images that last a lifetime.',
                'ScheduleComment' => 'Available on weekends and school holidays. Advance booking is required.',
                'Image' => 'images/1.jpg'
            ],
            [
                'Name' => 'Wedding & Engagement Photography',
                'Description' => 'Let us capture your most special moments. From engagement sessions to wedding day photography, we offer customized services to ensure your memories are timeless.',
                'TableDescriptionText' => 'Your special moments deserve to be beautifully captured. We offer customized engagement sessions and full-day wedding photography packages.',
                'ScheduleComment' => 'Wedding services are booked months in advance. Please inquire early to secure your date.',
                'Image' => 'images/2.jpg'
            ],
            [
                'Name' => 'Corporate Photography',
                'Description' => 'Professional corporate photography services to present your business in the best light. We cover formal events, team portraits, and more!',
                'TableDescriptionText' => 'Our corporate photography services are ideal for formal events, team portraits, and professional headshots to help your business stand out.',
                'ScheduleComment' => 'Available during weekdays. Flexible scheduling to fit your business needs.',
                'Image' => 'images/3.jpeg'
            ],
            [
                'Name' => 'Family & Child Portraits',
                'Description' => 'Create timeless family memories with our specialized portrait sessions. We offer both studio and outdoor settings to capture your family\'s unique connection!',
                'TableDescriptionText' => 'We create timeless portraits that showcase the unique bond between family members. Choose between studio or outdoor settings.',
                'ScheduleComment' => 'Sessions available on weekends. Weekday sessions by special appointment.',
                'Image' => 'images/4.jpg'
            ],
            [
                'Name' => 'Photography Competitions',
                'Description' => 'Join our regular photography competitions for a chance to win prizes and showcase your best work. Open to students, couples, and businesses!',
                'TableDescriptionText' => 'Showcase your skills by joining our regular photography competitions. Prizes include free photoshoots, gift cards, and more!',
                'ScheduleComment' => 'Competitions are held quarterly. Check back for the next event date!',
                'Image' => 'images/5.jpg'
            ],
            [
                'Name' => 'Event Photography',
                'Description' => 'Capture the essence of your special events with our professional event photography services. From birthday parties to corporate gatherings, we ensure every moment is documented beautifully!',
                'TableDescriptionText' => 'Capture the essence of your special events, from birthday parties to corporate gatherings. We provide professional event coverage to document every moment.',
                'ScheduleComment' => 'Available by appointment only. Contact us to reserve your event date.',
                'Image' => 'images/6.jpg'
            ],
            [
                'Name' => 'Photography Sessions',
                'Description' => 'Join our comprehensive photography courses designed for all skill levels, from beginners to advanced. Learn techniques, editing, and composition to capture stunning images and build a professional portfolio!',
                'TableDescriptionText' => 'Join our photography courses designed for beginners to advanced learners. Learn the basics or fine-tune your skills in a friendly, hands-on environment.',
                'ScheduleComment' => 'Personalized photography lessons available at $75 per hour. Tailored to your specific needs and skill level.',
                'Image' => 'images/7.jpg'
            ],
        ]);
    }
}
