<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\DataModel;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Menampilkan Halaman Index
        // Menampilkan 3 Data Terbaru
        $data = DB::table('data')
                    ->orderBy('id', 'desc' )
                    ->skip(0)
                    ->take(3)
                    ->get();

        $instansi = DB::table('instansi')
                    ->get();
        return view('simapta.template.materialdesign.index', ['data' => $data, 'instansi' => $instansi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function latest()
    {
        // Menampilkan 3 Data Terbaru
        $data = DB::table('data')
                    ->orderBy('id', 'desc')
                    ->skip(0)
                    ->take(3)
                    ->get();
        return view('simapta.template.materialdesign.latest', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function result(Request $request)
    {
        // Menampilkan 6 Data Terbaru
        $data = DB::table('data')
                    ->where('document_title' , 'LIKE' , "%{$request->keyword}%")
                    ->orWhere('description', 'LIKE' , "%{$request->keyword}%" )
                    ->get();

        return view('simapta.template.materialdesign.result', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function resultJSON(Request $request)
    {
        // Menampilkan 6 Data Terbaru
        $data = DB::table('data')
                    ->where('document_title' , 'LIKE' , "%{$request->keyword}%")
                    ->orWhere('description', 'LIKE' , "%{$request->keyword}%" )
                    ->get();

        return response()->json(
            $data, 200
            );
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
    public function show($uuid)
    {
        // Menampilkan Detail data
        $data = DB::table('data')
                    ->where('uuid', $uuid)
                    ->get();

         return view('simapta.template.materialdesign.show', ['data' => $data]);
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
