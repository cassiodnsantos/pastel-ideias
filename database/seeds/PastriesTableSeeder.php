<?php

use Illuminate\Database\Seeder;

class PastriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Carne',
            'price'         => 6,
            'photo'         => 'pastel-de-carne.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Cane Seca',
            'price'         => 9,
            'photo'         => 'pastel-de-carne-seca.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Abobora com Carnde de Sol e Pupunha',
            'price'         => 7,
            'photo'         => 'pastel-de-abobora-carne-de-sol-e-pupunha.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Queijo',
            'price'         => 6,
            'photo'         => 'pastel-queijo.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Linguiça Toscana com Queijo Coalho',
            'price'         => 7,
            'photo'         => 'pastel-linguica-toscana-queijo-coalho.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel Baião de Dois com Queijo Coalho',
            'price'         => 8,
            'photo'         => 'receita-pastel-baiao-dois-queijo-coalho.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Bauro',
            'price'         => 8,
            'photo'         => 'pastel-bauro.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Pizza',
            'price'         => 8,
            'photo'         => 'pastel-pizza.jpg'
        ]);
        DB::table('pastries')->insert([
            'name'          => 'Pastel de Frango Com Catupiry',
            'price'         => 8,
            'photo'         => 'ppastel-frango-catupiry.jpg'
        ]);
    }
}
