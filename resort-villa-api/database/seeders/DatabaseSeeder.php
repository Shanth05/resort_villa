<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Villa;
use App\Models\MenuItem;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Villa::create([
            'name' => 'Ocean Breeze Villa',
            'description' => 'A luxurious villa with a stunning ocean view, perfect for families.',
            'price_per_night' => 25000.00,
            'capacity' => 6,
            'image_url' => 'https://example.com/images/ocean-breeze.jpg',
        ]);

        Villa::create([
            'name' => 'Hill Country Retreat',
            'description' => 'A cozy villa nestled in the lush hills of Kandy.',
            'price_per_night' => 18000.00,
            'capacity' => 4,
            'image_url' => 'https://example.com/images/hill-retreat.jpg',
        ]);

        MenuItem::create([
            'name' => 'Rice and Curry',
            'description' => 'Authentic Sri Lankan rice and curry with pol sambol and dhal.',
            'price' => 1200.00,
            'category' => 'food',
            'image_url' => 'https://example.com/images/rice-curry.jpg',
        ]);

        MenuItem::create([
            'name' => 'Kottu Roti',
            'description' => 'Spicy chopped roti mixed with vegetables and chicken.',
            'price' => 800.00,
            'category' => 'food',
            'image_url' => 'https://example.com/images/kottu-roti.jpg',
        ]);

        MenuItem::create([
            'name' => 'Ceylon Tea',
            'description' => 'Freshly brewed tea from the hills of Nuwara Eliya.',
            'price' => 300.00,
            'category' => 'beverage',
            'image_url' => 'https://example.com/images/ceylon-tea.jpg',
        ]);
    }
}