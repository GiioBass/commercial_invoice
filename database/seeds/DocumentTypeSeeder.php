<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run(){

        Schema::disableForeignKeyConstraints();

        DB::table('document_types')->truncate();

        Schema::enableForeignKeyConstraints();

        DB::table('document_types')->insert([
           ['id' => 1, 'documentType' => 'CC', 'documentName' => 'Cedula de Ciudadania'],
           ['id' => 2, 'documentType' => 'CE', 'documentName' => 'Cedula de Extranjeria'],
           ['id' => 3, 'documentType' => 'NIT', 'documentName' => 'Numero de Identificacion Tributaria'],
           ['id' => 4, 'documentType' => 'RUT', 'documentName' =>  'Registro Unico Tributario'],

       ]);

    }
}
