<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BahanController extends Controller
{
    public function index()
    {
        try {

            DB::beginTransaction();

            $data["bahan"] = Bahan::orderBy("created_at", "DESC")
                ->get();

            DB::commit();

            return view("pages.modules.master-data.bahan.index", $data);
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard")->with("error", $e->getMessage());
        }
    }

    public function create()
    {
        try {

            DB::beginTransaction();

            $data["kategori"] = Kategori::where("status", "1")->get();

            DB::commit();

            return view("pages.modules.master-data.bahan.create", $data);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->to("/bahan")->with("error", "Ada Kesalahan Data");
        }
    }

    public function edit($id)
    {
        try {

            DB::beginTransaction();

            $data["kategori"] = Kategori::where("status", "1")->get();
            $data["edit"] = Bahan::where("id", $id)->first();

            DB::commit();

            return view("pages.modules.master-data.bahan.edit", $data);
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard")->with("error", $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            Bahan::create([
                "nama_bahan" => $request->nama_bahan,
                "kategori_id" => $request->kategori_id,
                "slug" => Str::slug($request->nama_bahan),
                "created_by" => 1
            ]);

            DB::commit();

            return redirect()->to("/bahan")->with("success", "Data Berhasil di Tambahkan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error",  $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();

            Bahan::where("id", $id)->update([
                "nama_bahan" => $request->nama_bahan,
                "kategori_id" => $request->kategori_id,
                "slug" => Str::slug($request->nama_bahan),
                "updated_by" => 1,
                "updated_at" => date("Y-m-d H:i:s")
            ]);

            DB::commit();

            return redirect()->to("/bahan")->with("success", "Data Berhasil di Simpan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error", "Data Gagal Ditambahkan");
        }
    }

    public function delete($id)
    {
        try {

            DB::beginTransaction();

            Bahan::where("id", $id)->delete();

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

            $cek = Bahan::where('id', $id)->first();

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
