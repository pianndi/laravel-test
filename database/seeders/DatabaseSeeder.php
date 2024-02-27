<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::factory(4)->create();
    User::create([
      'name' => 'Pian',
      'username' => 'pianndi',
      'email' => 'pian@gmail.com',
      'password' => bcrypt("rahasia"),
    ]);
    Category::create([
      'name' => 'Wisata',
      'slug' => 'travel',
    ]);
    Category::create([
      'name' => 'Pemrograman',
      'slug' => 'programming',
    ]);
    Category::create([
      'name' => 'Desain',
      'slug' => 'design',
    ]);

    Post::factory(20)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
