<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'image' => 'testimonial_pic1.png',
                'text' => 'Bryant has an incredible eye for capturing the love and joy in family moments. Our family portraits turned out beyond beautiful.',
                'name' => 'Sarah Thompson',
            ],
            [
                'image' => 'testimonial_pic2.png',
                'text' => 'Bryant did an amazing job with my senior photos. He knew how to make me feel comfortable in front of the camera.',
                'name' => 'Jessica Lee',
            ],
            [
                'image' => 'testimonial_pic3.png',
                'text' => 'We couldn’t have asked for a better photographer for our wedding day. The photos are absolutely stunning!',
                'name' => 'Emily and Jake Williams',
            ],
            [
                'image' => 'testimonial_pic4.png',
                'text' => 'Bryant’s one-on-one photography lessons were a game-changer! He helped me develop my skills tremendously.',
                'name' => 'Michael Rogers, CEO of Nexa Solutions',
            ],
            [
                'image' => 'testimonial_pic5.png',
                'text' => 'Bryant’s creativity helped bring photos of our food to life. The high-quality images now proudly feature on our website and menu!',
                'name' => 'David Harris',
            ],
        ];

        return view('home', compact('testimonials'));
    }
}
