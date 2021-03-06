<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	['name' => 'Ambient'],
        	['name' => 'Art'],
        	['name' => 'Culture'],
        	['name' => 'Economic'],
        	['name' => 'Education'],
        	['name' => 'Heath'],
        	['name' => 'More'],
        	['name' => 'Opinion'],
        	['name' => 'Politic'],
        	['name' => 'Science'],
        	['name' => 'Sport'],
        	['name' => 'Technology'],
        	['name' => 'World'],
        	['name' => 'More']       	
        ]);
    }
}
