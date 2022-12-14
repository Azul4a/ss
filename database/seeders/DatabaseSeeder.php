<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Ptag;
use App\Models\Status;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();

        $posts = Post::factory(200)->create();

        $tags = Tag::factory(35)->create();

        foreach ($posts as $post) {
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }

        ProductCategory::factory(30)->create();

        $products = Product::factory(300)->create();
        $prod_tags = Ptag::factory(45)->create();

        foreach ($products as $product) {
            $prod_tagsIds = $prod_tags->random(5)->pluck('id');
            $product->tags()->attach($prod_tagsIds);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
