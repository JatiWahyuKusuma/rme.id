<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'user']
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';

        $user = UserModel::all();

        return view('superadmin.user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('no', 'level_id', 'nama', 'email', 'password');
        if ($request->nama) {
            $users->where('nama', $request->nama);
        }

        return Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn  = '<a href="' . url('/user/' . $user->no) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->no . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->no) . '">'
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
            'title' => 'Tambah user',
            'list' => ['Home', 'user', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah user baru'
        ];

        $user = UserModel::all();
        $activeMenu = 'user';

        return view('superadmin.user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|integer',
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        UserModel::create([
            'level_id' => $request->level_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = UserModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail user',
            'list' => ['Home', 'user', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail user'
        ];

        $activeMenu = 'user';

        return view('superadmin.user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $user = UserModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit User'
        ];

        $activeMenu = 'user';

        return view('superadmin.user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_id' => 'required|integer',
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        UserModel::find($id)->update([
            'level_id' => $request->level_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy($id)
    {
        $check = UserModel::find($id);

        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);

            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
