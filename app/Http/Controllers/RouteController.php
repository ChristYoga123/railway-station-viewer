<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Station;

class RouteController extends Controller
{
    public function index()
    {
        return view("pages.routes.index");
    }
    // Fungsi untuk mencari rute dari stasiun A sampai stasiun Z
    public function findRoute($start, $end, $path = []) {
        // Menambahkan stasiun awal ke daftar rute
        $path[] = $start;
        // Jika stasiun awal sama dengan stasiun akhir, maka rute sudah ditemukan
        if ($start == $end) {
            return $path;
        }
        // Query untuk mengambil stasiun-stasiun yang terhubung dengan stasiun awal
        $connections = Route::where('station_start_id', $start)->get();
        foreach ($connections as $connection) {
            $next_station = $connection->station_end_id;
            // Jika stasiun belum ada di daftar rute, cari rute ke stasiun tersebut
            if (!in_array($next_station, $path)) {
                $new_path = $this->findRoute($next_station, $end, $path);
                if ($new_path) {
                    return $new_path;
                }
            }
        }
        return $path;
    }

    // Fungsi untuk menampilkan rute dari stasiun A sampai stasiun Z
    public function showRoute(Request $request) {
        $start = $request->input('start');
        $end = $request->input('end');
        // Mencari rute dari stasiun A sampai stasiun Z
        $routes = $this->findRoute($start, $end);
        $station_name_list = [];
        foreach($routes as $route){
            $name = Station::find($route);
            $station_name_list[] = $name->name;
        }
        // Menampilkan rute yang ditemukan
        return response()->json([
            'status' => 'success',
            'station' => $station_name_list
        ]);
    }
}
