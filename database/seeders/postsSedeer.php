<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Seeder;

class postsSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'fried rice',
                'category' => 'food',
                'description' => 'fried rice is my favourite food',
            ],
            [
                'title' => 'ice tea',
                'category' => 'drink',
                'description' => 'fried rice is my favourite drink',
            ],
            [
                'title' => 'gorengan',
                'category' => 'snack',
                'description' => 'fried rice is my favourite snack',
            ],
        ];

        Posts::insert($data);
    }
}
