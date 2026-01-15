<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Annual Tech Conference 2024',
                'description' => 'Join us for the biggest tech conference of the year featuring industry leaders and innovative workshops.',
                'event_date' => '2024-03-15',
            ],
            [
                'title' => 'Spring Programming Workshop',
                'description' => 'A hands-on workshop covering modern web development technologies and best practices.',
                'event_date' => '2024-04-20',
            ],
            [
                'title' => 'Career Fair 2024',
                'description' => 'Meet recruiters from top companies and explore internship and full-time opportunities.',
                'event_date' => '2024-05-10',
            ],
            [
                'title' => 'AI & Machine Learning Symposium',
                'description' => 'Deep dive into the latest trends in artificial intelligence and machine learning.',
                'event_date' => '2024-06-05',
            ],
            [
                'title' => 'Web Development Bootcamp',
                'description' => 'Intensive bootcamp for aspiring web developers. Learn HTML, CSS, JavaScript, and more.',
                'event_date' => '2024-07-15',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('Events seeded successfully!');
    }
}

