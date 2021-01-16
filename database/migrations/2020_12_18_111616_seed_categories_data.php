<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => 'Share',
                'description' => 'Share your ideas',
            ],
            [
                'name'        => 'Tutorial',
                'description' => 'Tutorials',
            ],
            [
                'name'        => 'Q&A',
                'description' => 'Questions and answers',
            ],
            [
                'name'        => 'Notice',
                'description' => 'What you should know',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
