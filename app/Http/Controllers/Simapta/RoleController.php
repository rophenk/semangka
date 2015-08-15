<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\RoleModel;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
         // Tampilkan data Users
        $role = DB::table('role')
                ->orderBy('id', 'asc')
                ->get();
        $user       = $request->user();
        return view('simapta.template.admin.roleTable', ['role' => $role, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //
        $user       = $request->user();
        return view('simapta.template.admin.roleForm', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Simpan data ke database
        $role = new RoleModel;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect("/roles");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request)
    {
        $user       = $request->user();
        $roledb     = RoleModel::where('id', $request->id)
                                    ->get();
        return view('simapta.template.admin.roleFormEdit', ['role' => $roledb, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        RoleModel::where('id' ,$request->id)
            ->update([
                'name' => $request->name, 
                'description' => $request->description
                ]);
        return redirect("/roles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Menghapus data User
        DB::table('role')->where('id', '=' ,$id)->delete();
        return redirect("/roles");
    }
}
