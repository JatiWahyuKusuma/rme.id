<?php

namespace App\Http\Controllers;

use App\Models\SGVenModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SGVenController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Vendor Bahan Baku di SIG - SG Rembang ',
            'list' => ['Home', ' SG Rembang']
        ];

        $page = (object)[
            'title' => 'Daftar Vendor Bahan Baku yang terdaftar dalam sistem'
        ];

        $activeMenu = 'sgven';

        $sgven = SGVenModel::all();

        return view('superadmin.sgven.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgven' => $sgven, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $sgvens = SGVenModel::select('no', 'jarak', 'latitude', 'longitude', 'vendor', 'komoditi', 'desa', 'kecamatan', 'kabupaten', 'kap_ton_thn', 'konsumsi_ton_thn');
        if ($request->komoditi) {
            $sgvens->where('komoditi', $request->komoditi);
        }

        return Datatables::of($sgvens)
            ->addIndexColumn()
            ->addColumn('aksi', function ($sgven) {
                $btn  = '<a href="' . url('/sgven/' . $sgven->no) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/sgven/' . $sgven->no . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/sgven/' . $sgven->no) . '">'
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
            'title' => 'Tambah Data Vendor Bahan Baku di SIG - SG Rembang',
            'list' => ['Home', 'SG Rembang', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Vendor Bahan Baku baru'
        ];

        $sgven = SGVenModel::all();
        $activeMenu = 'sgven';

        return view('superadmin.sgven.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgven' => $sgven, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jarak' => 'required|numeric',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric',
            'vendor' => 'required|string',
            'komoditi' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'kap_ton_thn' => 'required',
            'konsumsi_ton_thn' => 'required|string',      
        ]);

        SGVenModel::create([
            'jarak' => $request->jarak,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'vendor' => $request->vendor,
            'komoditi' => $request->komoditi,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kap_ton_thn' => $request->kap_ton_thn,
            'konsumsi_ton_thn' => $request->konsumsi_ton_thn,
        ]);

        return redirect('/sgven')->with('success', 'Data Vendor berhasil ditambahkan');
    }

    public function show($id)
    {
        $sgven = SGVenModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Vendor Bahan Baku',
            'list' => ['Home', 'SG Rembang', 'Detail']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'sgven';

        return view('superadmin.sgven.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgven' => $sgven, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $sgven = SGVenModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Data Vendor Bahan Baku',
            'list' => ['Home', 'SG Rembang', 'Edit']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'sgven';

        return view('superadmin.sgven.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'sgven' => $sgven, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jarak' => 'required|numeric',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric',
            'vendor' => 'required|string',
            'komoditi' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'kap_ton_thn' => 'required',
            'konsumsi_ton_thn' => 'required|string',  
        ]);

        SGVenModel::find($id)->update([
            'jarak' => $request->jarak,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'vendor' => $request->vendor,
            'komoditi' => $request->komoditi,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kap_ton_thn' => $request->kap_ton_thn,
            'konsumsi_ton_thn' => $request->konsumsi_ton_thn,
        ]);
        return redirect('/sgven')->with('success', 'Data level berhasil diubah');
    }

    public function destroy($id)
    {
        $check = SGVenModel::find($id);

        if (!$check) {
            return redirect('/sgven')->with('error', 'Datatidak ditemukan');
        }

        try {
            SGVenModel::destroy($id);

            return redirect('/sgven')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/sgven')->with('error', 'Data  gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
