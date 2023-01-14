<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use App\Models\Station;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Index extends Component
{
    public $search_station_start;
    public $search_station_end;
    // data rute
    public $stationRoute;
    public $statusUpdate = false;
    protected $listeners = [
        "routeStored",
        "errorStored",
        "routeUpdated",
        "cancelUpdate"
    ];


    public function render()
    {   
        // menampilkan rute
        if($this->search_station_start)
        {   
            $routes = $this->findRoute($this->search_station_start, $this->search_station_end);

            $station_name_list = [];
            foreach($routes as $route){
                $name = Station::find($route);
                $station_name_list[] = $name->name;
            }
            $this->stationRoute = $station_name_list;
        }

        // menampilkan data untuk keperluan select dan data nama stasiun di tabel
        return view('livewire.route.index')->with([
            'stations' => Station::all(),
            "routes" => Route::with(["StartStation", "EndStation"])->get(),
            "filter_station_routes" => $this->stationRoute
        ]);
    }

    // fungsi mencari rute
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

    public function routeStored($route)
    {
        session()->flash("success", "Data rute sukses disimpan");
    }

    public function errorStored($error)
    {
        session()->flash("error", "Stasiun awal tidak boleh sama stasiun akhir");
    }

    public function edit($route_id)
    {
        $this->statusUpdate = true;
        $route = Route::find($route_id);
        $this->emit("getRoute", $route);
    }

    public function cancelUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }

    public function routeUpdated($route)
    {
        $this->statusUpdate = false;
        session()->flash("success", "Data berhasil dirubah");
    }

    public function destroy($route_id)
    {
        $this->statusUpdate = false;
        $route = Route::find($route_id);
        $route->delete();
        session()->flash("success", "Data berhasil dihapus");
    }
}
