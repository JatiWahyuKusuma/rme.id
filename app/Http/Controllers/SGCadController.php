<?php

namespace App\Http\Controllers;

use App\Models\SGCadModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SGCadController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Cadangan dan Potensi Bahan Baku di SIG - SG Rembang',
            'list' => ['Home', 'SG Rembang']
        ];

        $page = (object)[
            'title' => 'Daftar Cadangan dan Potensi Bahan Baku yang terdaftar dalam sistem'
        ];

        $activeMenu = 'sgcad';

        $sgcad = SGCadModel::all();

        return view('superadmin.sgcad.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgcad' => $sgcad, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $sgcad = SGCadModel::select('no', 'jarak', 'latitude', 'longitude', 'no_id', 'komoditi', 'lokasi_iup', 'tipe_sd_cadangan','sd_cadangan_ton', 'catatan', 'status_penyelidikan', 'acuan', 'kabupaten', 'kecamatan', 'luas_ha', 'masa_berlaku_iup', 'masa_berlaku_ppkh');
        if ($request->komoditi) {
            $sgcad->where('komoditi', $request->komoditi);
        }

        return Datatables::of($sgcad)
            ->addIndexColumn()
            ->addColumn('aksi', function ($sgcad) {
                $btn  = '<a href="' . url('/sgcad/' . $sgcad->no) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/sgcad/' . $sgcad->no . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/sgcad/' . $sgcad->no) . '">'
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
            'title' => 'Tambah Data Cadangan dan Potensi Bahan Baku di SIG - SG Rembang',
            'list' => ['Home', 'SG Rembang', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah data Cadangan / Potensi Bahan Baku baru'
        ];

        $sgcad = SGCadModel::all();
        $activeMenu = 'sgcad';

        return view('superadmin.sgcad.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgcad' => $sgcad, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jarak' => 'required|integer',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric',
            'no_id' => 'required|integer',
            'komoditi' => 'required|string',
            'lokasi_iup' => 'required|string',
            'tipe_sd_cadangan' => 'required|string',
            'sd_cadangan_ton' => 'required|integer',
            'catatan' => 'required|string',
            'status_penyelidikan' => 'required|string',
            'acuan' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'luas_ha' => 'required|string',
            'masa_berlaku_iup' => 'required',
            'masa_berlaku_ppkh' => 'required',
            
        ]);

        SGCadModel::create([
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

        return redirect('/sgcad')->with('success', 'Data sgcad berhasil ditambahkan');
    }

    public function show($id)
    {
        $sgcad = SGCadModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Data GHOPO Cadangan dan Potensi Bahan Baku di SIG',
            'list' => ['Home', 'sgcad', 'Detail']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'sgcad';

        return view('superadmin.sgcad.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgcad' => $sgcad, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $sgcad = SGCadModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Data Cadangan atau Potensi Bahan Baku',
            'list' => ['Home', 'SG Rembang', 'Edit']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'sgcad';

        return view('superadmin.sgcad.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgcad' => $sgcad, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jarak' => 'required|integer',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric',
            'no_id' => 'required|integer',
            'komoditi' => 'required|string',
            'lokasi_iup' => 'required|string',
            'tipe_sd_cadangan' => 'required|string',
            'sd_cadangan_ton' => 'required|integer',
            'catatan' => 'required|string',
            'status_penyelidikan' => 'required|string',
            'acuan' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'luas_ha' => 'required|string',
            'masa_berlaku_iup' => 'required',
            'masa_berlaku_ppkh' => 'required',
        ]);

        SGCadModel::find($id)->update([
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
        return redirect('/sgcad')->with('success', 'Data sgcad berhasil diubah');
    }
    public function destroy($id)
    {
        $check = SGCadModel::find($id);

        if (!$check) {
            return redirect('/sgcad')->with('error', 'Data tidak ditemukan');
        }

        try {
            SGCadModel::destroy($id);

            return redirect('/sgcad')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/sgcad')->with('error', 'Data gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
