<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert(
        [
            'name' => 'nguyenthanh88',
            'alias' => 'nguyenthanhabc@gmail.com',
            'price' => 5785474,
            'intro' => 'Áo Măng tô giẻ rách',
            'content' => '<p>Áo măng tô rẻ giách</p>',
            'image' => 'ao-so-mi-hollister-mau-den.png',
            'keywords' => 'ao-mang-to',
            'description' => 'áo măng tô hiệu giẻ rách...',
            'user_id' => 7,
            'cate_id' => 2
        ]
      );
    }
}
