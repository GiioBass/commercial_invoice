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
            'id'=>'1',
            'first_name'=>'Cliente 1',
            'last_name'=>'Cliente 1',
            'phone_number'=>'111',
            'address'=>'Dir 1',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('clients')->insert([
            'id'=>'2',
            'first_name'=>'Cliente 2',
            'last_name'=>'Cliente 2',
            'phone_number'=>'222',
            'address'=>'Dir 2',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('clients')->insert([
            'id'=>'3',
            'first_name'=>'Cliente 3',
            'last_name'=>'Cliente 3',
            'phone_number'=>'3',
            'address'=>'Dir 3',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        
        DB::table('products')->insert([
            'id'=>'1',
            'name'=>'Producto 1',
            'description'=>'Descripcion 1',
            'unit_value'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('products')->insert([
            'id'=>'2',
            'name'=>'Producto 2',
            'description'=>'Descripcion 2',
            'unit_value'=>'2',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('products')->insert([
            'id'=>'3',
            'name'=>'Producto 3',
            'description'=>'Descripcion 3',
            'unit_value'=>'3',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('sellers')->insert([
            'id'=>'1',
            'first_name'=>'Vendedor 1',
            'last_name'=>'Vendedor 1',
            'email'=>'vendedor1@email',
            'phone_number'=>'1',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        DB::table('sellers')->insert([
            'id'=>'2',
            'first_name'=>'Vendedor 2',
            'last_name'=>'Vendedor 2',
            'email'=>'vendedor2@email',
            'phone_number'=>'2',
            'created_at'=>NULL,
            'updated_at'=>NULL,
        ]);
        

    }
}
