<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\DataModel;
use App\Models\Simapta\ServerModel;
use App\Models\Simapta\InstansiModel;
use DB;


class DataController extends Controller
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
            $api = DB::table('data')
                   ->select('data.document_title', 'api.name as api', 'data.address as address', 'data.writer', 'data.uuid as uuid')
                   ->join('api', 'data.api_id', '=', 'api.id')
                   ->join('server', 'api.server_id', '=', 'server.id')
                   ->join('instansi', 'server.instansi_id', '=', 'instansi.id')
                   ->get();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan semua data API yang hanya miliknya
            // $api = ApiModel::all();
            $api = DB::table('data')
                   ->select('data.document_title', 'api.name as api', 'data.address as address', 'data.writer', 'data.uuid as uuid')
                   ->join('api', 'data.api_id', '=', 'api.id')
                   ->join('server', 'api.server_id', '=', 'server.id')
                   ->join('instansi', 'server.instansi_id', '=', 'instansi.id')
                   ->where('instansi.id', '=', $instansi_id)
                   ->get();
        }
        // Tampilka data dari manifest
        $data = DataModel::all();

        return view('simapta.template.admin.dataTable', ['data' => $data, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Tampilkan Form AOI
        return view('simapta.template.admin.dataForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
