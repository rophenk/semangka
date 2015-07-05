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
    public function index()
    {
        // Tampilka data Server
        $server = ServerModel::all();

        return view('simapta.template.admin.serverTable', ['server' => $server]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $instansi_options = InstansiModel::all();

        // Tampilkan Form Server
        return view('simapta.template.admin.serverForm', ['instansi_options' => $instansi_options]);
        //return $instansi_options;
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
    public function edit($uuid)
    {
        // Tampilka data Instansi
        $server = ServerModel::where('uuid', $uuid)
                                    ->get();

        $instansi_options = InstansiModel::all();

        //Tampilkan Form yang terisi data
        return view('simapta.template.admin.serverFormEdit', ['server' => $server, 'instansi_options' => $instansi_options]);
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
