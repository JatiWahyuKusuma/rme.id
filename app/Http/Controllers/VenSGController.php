<?php

namespace App\Http\Controllers;

use App\Models\SGVenModelModel;
use App\Models\SGVenModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VenSGController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Vendor Bahan Baku di SIG - SG Rembang ',
            'list' => ['Home', ' SG Rembang']
        ];

        $page = (object)[
            'title' => 'Daftar Vendor Bahan Baku yang terdaftar dalam sistem'
        ];

        $activeMenu = 'vendorsg';

        $vendorsg = SGVenModel::all();

        return view('AdminSG.Vendor.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorsg' => $vendorsg, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $vendorsgs = SGVenModel::select('no', 'jarak', 'latitude', 'longitude', 'vendor', 'komoditi', 'desa', 'kecamatan', 'kabupaten', 'kap_ton_thn', 'konsumsi_ton_thn');
        if ($request->komoditi) {
            $vendorsgs->where('komoditi', $request->komoditi);
        }

        return Datatables::of($vendorsgs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($vendorsg) {
                $btn  = '<a href="' . url('/vendorsg/' . $vendorsg->no) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/vendorsg/' . $vendorsg->no . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/vendorsg/' . $vendorsg->no) . '">'
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

        $vendorsg = SGVenModel::all();
        $activeMenu = 'vendorsg';

        return view('AdminSG.Vendor.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorsg' => $vendorsg, 'activeMenu' => $activeMenu]);
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

        return redirect('/vendorsg')->with('success', 'Data Vendor berhasil ditambahkan');
    }

    public function show($id)
    {
        $vendorsg = SGVenModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Vendor Bahan Baku',
            'list' => ['Home', 'SG Rembang', 'Detail']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'vendorsg';

        return view('AdminSG.Vendor.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorsg' => $vendorsg, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $vendorsg = SGVenModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Data Vendor Bahan Baku',
            'list' => ['Home', 'SG Rembang', 'Edit']
        ];

        $page = (object)[
            'title' => ''
        ];

        $activeMenu = 'vendorsg';

        return view('AdminSG.Vendor.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'vendorsg' => $vendorsg, 'activeMenu' => $activeMenu]);
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
        return redirect('/vendorsg')->with('success', 'Data level berhasil diubah');
    }

    public function destroy($id)
    {
        $check = SGVenModel::find($id);

        if (!$check) {
            return redirect('/vendorsg')->with('error', 'Datatidak ditemukan');
        }

        try {
            SGVenModel::destroy($id);

            return redirect('/vendorsg')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/vendorsg')->with('error', 'Data  gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
