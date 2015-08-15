<?php

namespace App\Http\Controllers\Simapta;

use Illuminate\Http\Request;

use App\Http\Requests;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;
use App\AuthTraits\RedirectsUsers;
use App\Http\Controllers\Controller;
use App\Models\Simapta\InstansiModel;
use App\Models\Simapta\ApiModel;
use App\Models\Simapta\ServerModel;
use App\Models\Simapta\DataModel;
use DB;

class DashboardController extends Controller
{
    /**
     * Display total instansi.
     *
     * @return Response integer
     */
    public function totalInstansi()
    {
        // Tampilkan data Instansi
        $instansi = InstansiModel::all()->count();
        return $instansi;
    }

    /**
     * Display total api.
     *
     * @return Response integer
     */
    public function totalAPI()
    {
        // Tampilkan data API
        $api = ApiModel::all()->count();
        return $api;
    }

    /**
     * Display total server.
     *
     * @return Response integer
     */
    public function totalServer()
    {
        // Tampilkan data Server
        $server = ServerModel::all()->count();
        return $server;
    }

    /**
     * Display total data.
     *
     * @return Response integer
     */
    public function totalData()
    {
        // Tampilkan data Data
        $data = DataModel::all()->count();
        return $data;
    }

    /**
     * Display total api.
     *
     * @return Response integer
     */
    public function index(Request $request)
    {
        $instansi   = DashboardController::totalInstansi();
        $api        = DashboardController::totalAPI();
        $server     = DashboardController::totalServer();
        $data       = DashboardController::totalData();
        $user       = $request->user();
        $name   = $request->user()->name;
        return view('simapta.template.admin.dashboard', ['instansi' => $instansi, 'api' => $api, 'server' => $server, 'data' => $data, 'user' => $user, 'fullname' => $name]);
    }



    
}
