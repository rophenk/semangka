<?php
namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use App\AuthTraits\RedirectsUsers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Simapta\InstansiModel;
use DB;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response Display View
     */
    public function index(Request $request)
    {

        $user       = $request->user();
        $role_id    = $request->user()->role_id;

        if($role_id <= 2) {

            // Tampilkan semua data Instansi
             $instansi = InstansiModel::all();

        } else {

            $instansi_id = $request->user()->instansi_id;

            // Tampilkan semua data Instansi
             $instansi = InstansiModel::where('id', $instansi_id)
                         ->get();

        }

        return view('simapta.template.admin.instansiTable', ['instansi' => $instansi, 'user' => $user, 'role_id' => $role_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $user       = $request->user();
        // Tampilkan Form Instansi
        return view('simapta.template.admin.instansiForm', ['user' => $user]);
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
    public function edit(Request $request)
    {
        $user       = $request->user();
        // Tampilka data Instansi
        $instansi = InstansiModel::where('uuid', $request->uuid)
                                    ->get();

        //Tampilkan Form yang terisi data
        return view('simapta.template.admin.instansiFormEdit', ['instansi' => $instansi, 'user' => $user]);
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
     * @param  uuid  $uuid
     * @return Response Redirect to route
     */
    public function destroy($uuid)
    {
        // Menghapus data Instansi
        DB::table('instansi')->where('uuid', '=' ,$uuid)->delete();
        return redirect("/instansi");
    }

}
