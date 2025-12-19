<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        try {

            DB::beginTransaction();

            $data["kategori"] = Kategori::orderBy("created_at", "DESC")->get();

            DB::commit();

            return view("pages.modules.master-data.kategori.index", $data);
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard")->with("error", $e->getMessage());
        }
    }

    public function create()
    {
        return view("pages.modules.master-data.kategori.create");
    }

    public function edit($id)
    {
        try {

            DB::beginTransaction();

            $data["edit"] = Kategori::where("id", $id)->first();

            DB::commit();

            return view("pages.modules.master-data.kategori.edit", $data);
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard")->with("error", $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            Kategori::create([
                "nama_kategori" => $request->nama_kategori,
                "slug_kategori" => Str::slug($request->nama_kategori),
                "created_by" => 1
            ]);

            DB::commit();

            return redirect()->to("/kategori")->with("success", "Data Berhasil di Tambahkan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error", "Data Gagal Ditambahkan");
        }
    }

    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();

            Kategori::where("id", $id)->update([
                "nama_kategori" => $request->nama_kategori,
                "slug_kategori" => Str::slug($request->nama_kategori),
                "updated_by" => 1,
                "updated_at" => date("Y-m-d H:i:s")
            ]);

            DB::commit();

            return redirect()->to("/kategori")->with("success", "Data Berhasil di Simpan");
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with("error", "Data Gagal Ditambahkan");
        }
    }

    public function delete($id)
    {
        try {

            DB::beginTransaction();

            Kategori::where("id", $id)->delete();

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

            $cek = Kategori::where('id', $id)->first();

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
