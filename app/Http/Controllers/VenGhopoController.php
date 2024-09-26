<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GhopoVenModel;
use Yajra\DataTables\Facades\DataTables;

class VenGhopoController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Vendor Bahan Baku di SIG - GHOPO Tuban ',
            'list' => ['Home', ' GHOPO Tuban']
        ];

        $page = (object)[
            'title' => 'Daftar Vendor Bahan Baku yang terdaftar dalam sistem'
        ];

        $activeMenu = 'vendorghopo';

        $vendorghopo = GhopoVenModel::all();

        return view('AdminGhopo.Vendor.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorghopo' => $vendorghopo, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $vendorghopos = GhopoVenModel::select('no', 'jarak', 'latitude', 'longitude', 'vendor', 'komoditi', 'desa', 'kecamatan', 'kabupaten', 'kap_ton_thn', 'konsumsi_ton_thn');
        if ($request->komoditi) {
            $vendorghopos->where('komoditi', $request->komoditi);
        }

        return Datatables::of($vendorghopos)
            ->addIndexColumn()
            ->addColumn('aksi', function ($vendorghopo) {
                $btn  = '<a href="' . url('/vendorghopo/' . $vendorghopo->no) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/vendorghopo/' . $vendorghopo->no . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/vendorghopo/' . $vendorghopo->no) . '">'
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
            'title' => 'Tambah Data Vendor Bahan Baku di SIG - GHOPO Tuban',
            'list' => ['Home', 'GHOPO Tuban', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Vendor Bahan Baku baru'
        ];

        $vendorghopo = GhopoVenModel::all();
        $activeMenu = 'vendorghopo';

        return view('AdminGhopo.Vendor.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorghopo' => $vendorghopo, 'activeMenu' => $activeMenu]);
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

        GhopoVenModel::create([
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

        return redirect('/vendorghopo')->with('success', 'Data Vendor berhasil ditambahkan');
    }

    public function show($id)
    {
        $vendorghopo = GhopoVenModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Vendor Bahan Baku',
            'list' => ['Home', 'GHOPO Tuban', 'Detail']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'vendorghopo';

        return view('AdminGhopo.Vendor.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorghopo' => $vendorghopo, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $vendorghopo = GhopoVenModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Data Vendor Bahan Baku',
            'list' => ['Home', 'GHOPO Tuban', 'Edit']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'vendorghopo';

        return view('AdminGhopo.Vendor.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorghopo' => $vendorghopo, 'activeMenu' => $activeMenu]);
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

        GhopoVenModel::find($id)->update([
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
        return redirect('/vendorghopo')->with('success', 'Data level berhasil diubah');
    }

    public function destroy($id)
    {
        $check = GhopoVenModel::find($id);

        if (!$check) {
            return redirect('/vendorghopo')->with('error', 'Datatidak ditemukan');
        }

        try {
            GhopoVenModel::destroy($id);

            return redirect('/vendorghopo')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/vendorghopo')->with('error', 'Data  gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
