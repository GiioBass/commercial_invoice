<?php


use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*  Schema::disableForeignKeyConstraints();

        DB::table('permissions')->truncate();

        Schema::enableForeignKeyConstraints();*/

        //      Clients
        Permission::create([
            'name' => 'Navegar Clientes',
            'slug' => 'client.index',
            'description' => 'Lista clientes ',
        ]);
        Permission::create([
            'name' => 'Crear Clientes',
            'slug' => 'client.create',
            'description' => 'Crea clientes ',
        ]);
        Permission::create([
            'name' => 'Editar de Clientes',
            'slug' => 'client.edit',
            'description' => 'Editar Clientes',
        ]);
        Permission::create([
            'name' => 'Eliminar Clientes',
            'slug' => 'client.delete',
            'description' => 'Eliminar Cliente',
        ]);
        Permission::create([
            'name' => 'Importar Clientes',
            'slug' => 'client.import',
            'description' => 'Importar Clientes',
        ]);
        Permission::create([
            'name' => 'Exportar Clientes',
            'slug' => 'client.export',
            'description' => 'Exportar Clientes',
        ]);

//        Products
        Permission::create([
            'name' => 'Navegar Productos',
            'slug' => 'product.index',
            'description' => 'Lista Productos ',
        ]);
        Permission::create([
            'name' => 'Crear Productos',
            'slug' => 'product.create',
            'description' => 'Crear productos ',
        ]);
        Permission::create([
            'name' => 'Editar de productos',
            'slug' => 'product.edit',
            'description' => 'Editar productos',
        ]);
        Permission::create([
            'name' => 'Eliminar Productos',
            'slug' => 'product.delete',
            'description' => 'Eliminar Producto',
        ]);
        Permission::create([
            'name' => 'Importar Productos',
            'slug' => 'product.import',
            'description' => 'Importar Productos',
        ]);
        Permission::create([
            'name' => 'Exportar Productos',
            'slug' => 'product.export',
            'description' => 'Exportar Productos',
        ]);


//        Seller
        Permission::create([
            'name' => 'Navegar Vendedor',
            'slug' => 'seller.index',
            'description' => 'Lista Vendedor ',
        ]);
        Permission::create([
            'name' => 'Crear Vendedor',
            'slug' => 'seller.create',
            'description' => 'Crear Vendedor ',
        ]);
        Permission::create([
            'name' => 'Editar de Vendedor',
            'slug' => 'seller.edit',
            'description' => 'Editar Vendedor',
        ]);
        Permission::create([
            'name' => 'Eliminar Vendedor',
            'slug' => 'seller.delete',
            'description' => 'Eliminar Vendedor',
        ]);
        Permission::create([
            'name' => 'Importar Vendedor',
            'slug' => 'seller.import',
            'description' => 'Importar Vendedor',
        ]);
        Permission::create([
            'name' => 'Exportar Vendedor',
            'slug' => 'seller.export',
            'description' => 'Exportar Vendedor',
        ]);


//        Invoice
        Permission::create([
            'name' => 'Navegar Factura',
            'slug' => 'invoice.index',
            'description' => 'Lista Factura ',
        ]);
        Permission::create([
            'name' => 'Ver Detalles Factura',
            'slug' => 'invoice.show',
            'description' => 'Detalles Factura ',
        ]);
        Permission::create([
            'name' => 'Crear Factura',
            'slug' => 'invoice.create',
            'description' => 'Crear Factura',
        ]);
        Permission::create([
            'name' => 'Editar de Factura',
            'slug' => 'invoice.edit',
            'description' => 'Editar Factura',
        ]);
        Permission::create([
            'name' => 'Eliminar Factura',
            'slug' => 'invoice.delete',
            'description' => 'Eliminar Factura',
        ]);
        Permission::create([
            'name' => 'Importar Factura',
            'slug' => 'invoice.import',
            'description' => 'Importar Factura',
        ]);
        Permission::create([
            'name' => 'Exportar Factura',
            'slug' => 'invoice.export',
            'description' => 'Exportar Factura',
        ]);

        //        Report

        Permission::create([
            'name' => 'Mostrar Historico de Pagos',
            'slug' => 'report.show',
            'description' => 'Lista Reporte ',
        ]);
        Permission::create([
            'name' => 'Realizar Pagos',
            'slug' => 'report.create',
            'description' => 'Crear Reporte',
        ]);


        //        User
        Permission::create([
            'name' => 'Navegar Usuario',
            'slug' => 'user.index',
            'description' => 'Lista Usuario ',
        ]);
        Permission::create([
            'name' => 'Crear Usuario',
            'slug' => 'user.create',
            'description' => 'Crear Usuario',
        ]);
        Permission::create([
            'name' => 'Editar de Usuario',
            'slug' => 'user.edit',
            'description' => 'Editar Usuario',
        ]);
        Permission::create([
            'name' => 'Eliminar Usuario',
            'slug' => 'user.delete',
            'description' => 'Eliminar Usuario',
        ]);
        //        Role
        Permission::create([
            'name' => 'Navegar Roles',
            'slug' => 'role.index',
            'description' => 'Lista Roles ',
        ]);
        Permission::create([
            'name' => 'Crear Roles',
            'slug' => 'role.create',
            'description' => 'Crear Rol',
        ]);
        Permission::create([
            'name' => 'Editar de Roles',
            'slug' => 'role.edit',
            'description' => 'Editar Roles',
        ]);
        Permission::create([
            'name' => 'Eliminar Rol',
            'slug' => 'role.delete',
            'description' => 'Eliminar Rol',
        ]);



        Permission::create([
            'name' => 'Agregar Orden',
            'slug' => 'order.create',
            'description' => 'Agregar Productos',
        ]);


        Permission::create([
            'name' => 'Eliminar Orden',
            'slug' => 'order.delete',
            'description' => 'Eliminar Orden',
        ]);

        Permission::create([
            'name' => 'Accesos API',
            'slug' => 'access_api',
            'description' => 'Panel de permisos API',
        ]);
    }
}
