<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('Roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('role.edit', $role->id)
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return void
     */
    public function show(Role $role)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();

        return view('Roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->all());

        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('role.edit', $role->id)
            ->with('message', 'Usuario modificado con éxito');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Role::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
