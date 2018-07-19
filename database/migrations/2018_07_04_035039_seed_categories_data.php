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
                'color' => 'purple'
            ],
            [
                'name' => 'photography',
                'description' => '摄影',
                'color' => 'indigo'
            ],
            [
                'name' => 'guitar',
                'description' => '吉他',
                'color' => 'orange'
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
