<?php

use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => 'coding',
                'description' => '编程',
            ],
            [
                'name' => 'photograph',
                'description' => '摄影',
            ],
            [
                'name' => 'guiter',
                'description' => '吉他',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
