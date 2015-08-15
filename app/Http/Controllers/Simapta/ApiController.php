<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\ApiModel;
use App\Models\Simapta\ServerModel;
use App\Models\Simapta\InstansiModel;
use DB;

class ApiController extends Controller
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

            // Tampilkan semua data API
            $api = DB::table('api')
                   ->select('api.name as name', 'api.type as type', 'server.name as server', 'instansi.name as instansi', 'api.uuid as uuid', 'api.address as address')
                   ->join('server', 'api.server_id', '=', 'server.id')
                   ->join('instansi', 'server.instansi_id', '=', 'instansi.id')
                   ->get();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan semua data API yang hanya miliknya
            // $api = ApiModel::all();
            $api = DB::table('api')
                   ->select('api.name as name', 'api.type as type', 'server.name as server', 'instansi.name as instansi', 'api.uuid as uuid', 'api.address as address')
                   ->join('server', 'api.server_id', '=', 'server.id')
                   ->join('instansi', 'server.instansi_id', '=', 'instansi.id')
                   ->where('instansi.id', '=', $instansi_id)
                   ->get();
        }
        

        return view('simapta.template.admin.apisTable', ['api' => $api, 'user' => $user]);
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

            //Populasi dropdown Server
            $server_options = DB::table('server')
                           ->select('server.name as name', 'server.id as id')
                           ->join('instansi', 'server.instansi_id', '=', 'instansi.id')
                           ->get();

        } else {

            $instansi_id = $request->user()->instansi_id;

            //Populasi dropdown Server
            $server_options = DB::table('server')
                           ->select('server.name as name', 'server.id as id')
                           ->join('instansi', 'server.instansi_id', '=', 'instansi.id')
                           ->where('instansi.id', '=', $instansi_id)
                           ->get();
        }
        
        // Tampilkan Form AOI
        return view('simapta.template.admin.apisForm', ['server_options' => $server_options, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $api = new ApiModel;
        $api->uuid = Uuid::uuid4();
        $api->server_id = $request->server_id;
        $api->name = $request->name;
        $api->address = $request->address;
        $api->type = $request->type;
        $api->save();
        return redirect("/apis");
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
        $uuid = $request->uuid;
        $user       = $request->user();
        $role_id    = $request->user()->role_id;
        $instansi_id = $request->user()->instansi_id;

        // Tampilkan data API
        $apis = ApiModel::where('uuid', $uuid)
                                    ->get();

        if($role_id <= 2) {

            // Tampilkan semua data Server
            $server_options = ServerModel::all();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan data Server hanya miliknya
            $server_options = ServerModel::where('instansi_id', $instansi_id)
                         ->get();

        }

        //Tampilkan Form yang terisi data
        return view('simapta.template.admin.apisFormEdit', ['apis' => $apis, 'server_options' => $server_options, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        // Validate the request...
        $updateAPI = ApiModel::where('uuid' ,$request->uuid)
        ->update([
            'server_id' => $request->server_id, 
            'name' => $request->name, 
            'type' => $request->type, 
            'address' => $request->address 
            ]);
        return redirect("/apis");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($uuid)
    {
        //Menghapus data API
        DB::table('api')->where('uuid', '=' ,$uuid)->delete();
        return redirect("/apis");
    }
}
