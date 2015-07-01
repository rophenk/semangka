<?php
namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use App\AuthTraits\RedirectsUsers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\InstansiModel;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Tampilka data Instansi
        $instansi = InstansiModel::all();

        return view('simapta.template.admin.instansiTable', ['instansi' => $instansi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Tampilkan Form Instansi
        return view('simapta.template.admin.instansiForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $instansi = new InstansiModel;
        $instansi->uuid = Uuid::uuid4();
        $instansi->name = $request->name;
        $instansi->alias = $request->alias;
        $instansi->save();
        return redirect("/instansi");
        
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
        $instansi = InstansiModel::where('uuid', $uuid)
                                    ->get();

        //Tampilkan Form yang terisi data
        return view('simapta.template.admin.instansiFormEdit', ['instansi' => $instansi]);
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
        InstansiModel::where('uuid' ,$request->uuid)
        ->update([
            'name' => $request->name, 
            'alias' => $request->alias 
            ]);
        return redirect("/instansi");
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
