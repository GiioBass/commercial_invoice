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



        DB::table('document_types')->insert([
           ['id' => 1, 'documentType' => 'CC', 'documentName' => 'Cedula de Ciudadania'],
           ['id' => 2, 'documentType' => 'CE', 'documentName' => 'Cedula de Extranjeria'],
           ['id' => 3, 'documentType' => 'NIT', 'documentName' => 'Numero de Identificacion Tributaria'],
           ['id' => 4, 'documentType' => 'RUT', 'documentName' =>  'Registro Unico Tributario'],

       ]);

//       $documents = [
//            [1,'CC', 'Cedula de Ciudadania'],
//            [2, 'CE', 'Cedula de Extranjeria'],
//            [3, 'NIT', 'Numero de Identificacion Tributaria'],
//            [4, 'RUT', 'Registro Unico Tributario'],
//       ];
//
//       $type = [
//           'id',
//           'documentType',
//           'documentName',
//       ];

//        $sizeArray = sizeof($documents);
//
//       for ($i = 0; $i < $sizeArray; $i ++)
//       {
//           DB::table('document_types')->insert(Array[
//
//               for ($j = 0; $j <= 2; $j++){
//
//                   $type[$j]  => $documents[$i][$j];
//               }
//
//
//           ]);
//
//       }
    }
}
