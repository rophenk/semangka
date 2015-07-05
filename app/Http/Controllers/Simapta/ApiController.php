<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\ApiModel;
use App\Models\Simapta\ServerModel;
use DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Tampilka data API
        $api = ApiModel::all();

        return view('simapta.template.admin.apisTable', ['api' => $api]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Populasi dropdown Server
        $server_options = ServerModel::all();
        // Tampilkan Form AOI
        return view('simapta.template.admin.apisForm', ['server_options' => $server_options]);
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
    public function edit($uuid)
    {
        // Tampilkan data API
        $apis = ApiModel::where('uuid', $uuid)
                                    ->get();

        $server_options = ServerModel::all();

        //Tampilkan Form yang terisi data
        return view('simapta.template.admin.apisFormEdit', ['apis' => $apis, 'server_options' => $server_options]);
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
}
