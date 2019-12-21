<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Expr\Cast\Int_;

class ClientsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'id'=>'1234567',
            'first_name'=>'Joseph',
            'last_name'=>'Snow',
            'phone_number'=>'111',
            'address'=>'Dir 1',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('clients')->insert([
            'id'=>'2345678',
            'first_name'=>'Rose',
            'last_name'=>'Target',
            'phone_number'=>'222',
            'address'=>'Dir 2',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('clients')->insert([
            'id'=>'34567890',
            'first_name'=>'Julia',
            'last_name'=>'String',
            'phone_number'=>'3',
            'address'=>'Dir 3',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        
        DB::table('products')->insert([
            'id'=>'1',
            'name'=>'Tablet',
            'description'=>'Descripcion 1',
            'unit_value'=>'10000',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('products')->insert([
            'id'=>'2',
            'name'=>'PC',
            'description'=>'Descripcion 2',
            'unit_value'=>'20000',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('products')->insert([
            'id'=>'3',
            'name'=>'Cel Phone',
            'description'=>'Descripcion 3',
            'unit_value'=>'30000',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('sellers')->insert([
            'id'=>'1',
            'first_name'=>'Michelle',
            'last_name'=>'Glass',
            'email'=>'michelle.glass@email',
            'phone_number'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('sellers')->insert([
            'id'=>'2',
            'first_name'=>'Alexander',
            'last_name'=>'Vine',
            'email'=>'alexander.vine@email',
            'phone_number'=>'2',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        

    }
}
