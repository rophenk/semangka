<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\ServerModel;
use App\Models\Simapta\InstansiModel;
use DB;

class ServerController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user       = $request->user();
        $role_id    = $request->user()->role_id;

        if($role_id <= 2) {

            // Tampilkan semua data Server
            $server = ServerModel::all();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan semua data Instansi
             $server = ServerModel::where('instansi_id', $instansi_id)
                         ->get();

        }

        return view('simapta.template.admin.serverTable', ['server' => $server, 'user' => $user, 'role_id' => $role_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        $user       = $request->user();
        $role_id    = $request->user()->role_id;

        if($role_id <= 2) {

            // Tampilkan semua data Server
            $instansi_options = InstansiModel::all();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan data Instansi hanya miliknya
             $instansi_options = InstansiModel::where('id', $instansi_id)
                         ->get();

        }

        // Tampilkan Form Server
        return view('simapta.template.admin.serverForm', ['instansi_options' => $instansi_options, 'user' => $user]);
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $server = new ServerModel;
        $server->uuid = Uuid::uuid4();
        $server->instansi_id = $request->instansi_id;
        $server->name = $request->name;
        $server->address = $request->address;
        $server->token = Uuid::uuid4();
        $server->save();
        return redirect("/server");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
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
        $uuid       = $request->uuid;
        $user       = $request->user();
        $role_id    = $request->user()->role_id;
        $instansi_id = $request->user()->instansi_id;

        // Tampilka data Server
        $server = ServerModel::where('uuid', $uuid)
                                    ->get();
        
        if($role_id <= 2) {

            // Tampilkan semua data Server
            $instansi_options = InstansiModel::all();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan data Instansi hanya miliknya
             $instansi_options = InstansiModel::where('id', $instansi_id)
                         ->get();

        }

        //Tampilkan Form yang terisi data
        return view('simapta.template.admin.serverFormEdit', ['server' => $server, 'instansi_options' => $instansi_options, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        //// Validate the request...
        ServerModel::where('uuid' ,$request->uuid)
        ->update([
            'instansi_id' => $request->instansi_id, 
            'name' => $request->name, 
            'address' => $request->address 
            ]);
        return redirect("/server");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function destroy($uuid)
    {
        //Menghapus data Server
        DB::table('server')->where('uuid', '=' ,$uuid)->delete();
        return redirect("/server");
    }
}
