<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // php artisan db:seed
        // php artisan migrate:refresh
        // php artisan migrate:refresh --seed

        Listing::factory(6)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // seeder enters a record into the table
        
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags'=> 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'emaill@email.com',
        //     'website' => 'https://www.acme. com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur!
        //     Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags'=> 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'emaill@email.com',
        //     'website' => 'https://www.acme. com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur!
        //     Expedita ab consectetur tenetur delensiti?'
        // ]);
    }
}
