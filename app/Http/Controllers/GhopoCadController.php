<?php

namespace App\Http\Controllers;

use App\Models\GhopoCadModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GhopoCadController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Cadangan dan Potensi Bahan Baku di SIG - GHOPO Tuban',
            'list' => ['Home', 'GHOPO Tuban']
        ];

        $page = (object)[
            'title' => 'Daftar Cadangan dan Potensi Bahan Baku yang terdaftar dalam sistem'
        ];

        $activeMenu = 'ghopocad';

        $ghopocad = GhopoCadModel::all();

        return view('superadmin.ghopocad.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ghopocad' => $ghopocad, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $ghopocad = GhopoCadModel::select('no', 'jarak', 'latitude', 'longitude', 'no_id', 'komoditi', 'lokasi_iup', 'tipe_sd_cadangan','sd_cadangan_ton', 'catatan', 'status_penyelidikan', 'acuan', 'kabupaten', 'kecamatan', 'luas_ha', 'masa_berlaku_iup', 'masa_berlaku_ppkh');
        if ($request->komoditi) {
            $ghopocad->where('komoditi', $request->komoditi);
        }

        return Datatables::of($ghopocad)
            ->addIndexColumn()
            ->addColumn('aksi', function ($ghopocad) {
                $btn  = '<a href="' . url('/ghopocad/' . $ghopocad->no) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/ghopocad/' . $ghopocad->no . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/ghopocad/' . $ghopocad->no) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Cadangan dan Potensi Bahan Baku di SIG - GHOPO Tuban',
            'list' => ['Home', 'GHOPO Tuban', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah data Cadangan / Potensi Bahan Baku baru'
        ];

        $ghopocad = GhopoCadModel::all();
        $activeMenu = 'ghopocad';

        return view('superadmin.ghopocad.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ghopocad' => $ghopocad, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jarak' => 'required|numeric',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric',
            'no_id' => 'nullable|integer',
            'komoditi' => 'required|string',
            'lokasi_iup' => 'required|string',
            'tipe_sd_cadangan' => 'required|string',
            'sd_cadangan_ton' => 'required|integer',
            'catatan' => 'nullable|string',
            'status_penyelidikan' => 'nullable|string',
            'acuan' => 'nullable|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'luas_ha' => 'nullable|numeric',
            'masa_berlaku_iup' => 'nullable',
            'masa_berlaku_ppkh' => 'nullable',
            
        ]);

        GhopoCadModel::create([
            'jarak' => $request->jarak,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'no_id' => $request->no_id,
            'komoditi' => $request->komoditi,
            'lokasi_iup' => $request->lokasi_iup,
            'tipe_sd_cadangan' => $request->tipe_sd_cadangan,
            'sd_cadangan_ton' => $request->sd_cadangan_ton,
            'catatan' => $request->catatan,
            'status_penyelidikan' => $request->status_penyelidikan,
            'acuan' => $request->acuan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'luas_ha' => $request->luas_ha,
            'masa_berlaku_iup' => $request->masa_berlaku_iup,
            'masa_berlaku_ppkh' => $request->masa_berlaku_ppkh

        ]);

        return redirect('/ghopocad')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $ghopocad = GhopoCadModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Data GHOPO Cadangan dan Potensi Bahan Baku di SIG',
            'list' => ['Home', 'GHOPO Tuban', 'Detail']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'ghopocad';

        return view('superadmin.ghopocad.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ghopocad' => $ghopocad, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $ghopocad = GhopoCadModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Data Cadangan atau Potensi Bahan Baku',
            'list' => ['Home', 'GHOPO Tuban', 'Edit']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'ghopocad';

        return view('superadmin.ghopocad.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ghopocad' => $ghopocad, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jarak' => 'required|numeric',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric',
            'no_id' => 'nullable|integer',
            'komoditi' => 'required|string',
            'lokasi_iup' => 'required|string',
            'tipe_sd_cadangan' => 'required|string',
            'sd_cadangan_ton' => 'required|integer',
            'catatan' => 'nullable|string',
            'status_penyelidikan' => 'nullable|string',
            'acuan' => 'nullable|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'luas_ha' => 'nullable|numeric',
            'masa_berlaku_iup' => 'nullable',
            'masa_berlaku_ppkh' => 'nullable',
        ]);

        GhopoCadModel::find($id)->update([
            'jarak' => $request->jarak,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'no_id' => $request->no_id,
            'komoditi' => $request->komoditi,
            'lokasi_iup' => $request->lokasi_iup,
            'tipe_sd_cadangan' => $request->tipe_sd_cadangan,
            'sd_cadangan_ton' => $request->sd_cadangan_ton,
            'catatan' => $request->catatan,
            'status_penyelidikan' => $request->status_penyelidikan,
            'acuan' => $request->acuan,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'luas_ha' => $request->luas_ha,
            'masa_berlaku_iup' => $request->masa_berlaku_iup,
            'masa_berlaku_ppkh' => $request->masa_berlaku_ppkh
        ]);
        return redirect('/ghopocad')->with('success', 'Data berhasil diubah');
    }
    public function destroy($id)
    {
        $check = GhopoCadModel::find($id);

        if (!$check) {
            return redirect('/ghopocad')->with('error', 'Data tidak ditemukan');
        }

        try {
            GhopoCadModel::destroy($id);

            return redirect('/ghopocad')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/ghopocad')->with('error', 'Data gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}

