<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    public function index()
    {
        try {

            DB::beginTransaction();

            $data["bahan"] = Resep::with("detail_resep")
                ->orderBy("created_at", "DESC")
                ->get();

            DB::commit();

            return view("pages.modules.master-data.resep.index", $data);
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard")->with("error", $e->getMessage());
        }
    }

    public function create()
    {
        try {

            DB::beginTransaction();

            $data["bahan"] = Bahan::where("status", "1")->get();

            DB::commit();

            return view("pages.modules.master-data.resep.create", $data);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->to("/bahan")->with("error", "Ada Kesalahan Data");
        }
    }

    public function edit($id)
    {
        try {

            DB::beginTransaction();

            $data["edit"] = Resep::where("id", $id)->first();

            DB::commit();

            return view("pages.modules.master-data.resep.edit", $data);
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard")->with("error", $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            Resep::create([
                "nama_resep" => $request->nama_resep,
                "created_by" => 1
            ]);

            DB::commit();

            return redirect()->to("/resep")->with("success", "Data Berhasil di Tambahkan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error",  $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();

            Resep::where("id", $id)->update([
                "nama_resep" => $request->nama_resep,
                "updated_by" => 1,
                "updated_at" => date("Y-m-d H:i:s")
            ]);

            DB::commit();

            return redirect()->to("/resep")->with("success", "Data Berhasil di Simpan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error", "Data Gagal Ditambahkan");
        }
    }

    public function delete($id)
    {
        try {

            DB::beginTransaction();

            Resep::where("id", $id)->delete();

            DB::commit();

            return back()->with("success", "Data Berhasil di Hapus");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error", "Data Gagal Hapus");
        }
    }

    public function change_status($id)
    {
        try {

            DB::beginTransaction();

            $cek = Resep::where('id', $id)->first();

            if ($cek->status == "1") {
                $status = "0";
            } else if ($cek->status == "0") {
                $status = "1";
            }

            $cek->update([
                "status" => $status,
                "updated_by" => 1,
                "updated_at" => date("Y-m-d H:i:s")
            ]);

            DB::commit();

            return back()->with("success", "Status Berhasil Disimpan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error", "Data Gagal Hapus");
        }
    }
}
