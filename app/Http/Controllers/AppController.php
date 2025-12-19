<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Kategori;
use App\Models\Resep;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        $data["kategori"] = Kategori::where("status", "1")->count();
        $data["bahan"] = Bahan::where("status", "1")->count();
        $data["resep"] = Resep::where("status", "1")->count();

        return view("pages.modules.dashboard", $data);
    }
}
