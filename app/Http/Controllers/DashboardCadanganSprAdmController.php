<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SGCadModel;
use App\Models\GhopoCadModel;

class DashboardCadanganSprAdmController extends Controller
{
    public function index()
    {
        // Breadcrumb data
        $breadcrumb = (object) [
            'title' => 'DASHBOARD CADANGAN DAN POTENSI BAHAN BAKU DI SIG',
            'list' => ['Home', 'Dashboard']
        ];

        // Page data
        $page = (object)[
            'title' => 'Daftar Cadangan dan Potensi Bahan Baku yang terdaftar dalam sistem'
        ];

        // Active menu identifier
        $activeMenu = 'dashboardcadangan';

        // Total SD/Cadangan
        $dashboardcadangan = GhopoCadModel::all();
        $sdCadanganGhopo = GhopoCadModel::count(); // Count of Ghopo
        $sdCadanganTonGhopo = GhopoCadModel::sum('sd_cadangan_ton'); // Ensure this column exists in GhopoCadModel
        $sdCadanganTonSG = SGCadModel::sum('sd_cadangan_ton'); // Ensure this column exists in SGCadModel
        $totalSdCadanganTon = $sdCadanganTonGhopo + $sdCadanganTonSG; // Combine the totals
        $formattedTotalSdCadanganTon = number_format($totalSdCadanganTon);

        //Total IUP
        $dashboardcadangan = GhopoCadModel::all();
        $totalIupGhopo = GhopoCadModel::count();
        $masaberlakuIUPGhopo = GhopoCadModel::count('masa_berlaku_iup'); // Ensure this column exists in GhopoCadModel
        $masaberlakuIUPSG = SGCadModel::count('masa_berlaku_iup'); // Ensure this column exists in SGCadModel
        $jumlahMasaBerlakuIUP = $masaberlakuIUPGhopo + $masaberlakuIUPSG; // Combine the totals

        //Total PPKH
        $dashboardcadangan = GhopoCadModel::all();
        $totalPpkhGhopo = GhopoCadModel::count();
        $masaberlakuPPKHGhopo = GhopoCadModel::count('masa_berlaku_ppkh'); // Ensure this column exists in GhopoCadModel
        $masaberlakuPPKHSG = SGCadModel::count('masa_berlaku_ppkh'); // Ensure this column exists in SGCadModel
        $jumlahMasaBerlakuPPKH = $masaberlakuPPKHGhopo + $masaberlakuPPKHSG; // Combine the totals

        //bar chart
        $ghopoData = GhopoCadModel::all();
        $sgData = SGCadModel::all();

        // Prepare data for the bar chart
        $chartData = [];

        // Fetching data from ghopo_cad_bb
        foreach ($ghopoData as $item) {
            $chartData[] = [
                'komoditi' => $item->komoditi, // Make sure this property exists
                'sd_cadangan_ton' => $item->sd_cadangan_ton // Ensure this property exists
            ];
        }
         // Fetching data from sg_cad_bb
         foreach ($sgData as $item) {
            $chartData[] = [
                'komoditi' => $item->komoditi, // Make sure this property exists
                'sd_cadangan_ton' => $item->sd_cadangan_ton // Ensure this property exists
            ];
        }


        // Pass the data to the view using an associative array
        return view('Superadmin.dashboardCadangan.index', [
            'sdCadanganGhopo' => $sdCadanganGhopo,
            'sdCadanganTon' => $formattedTotalSdCadanganTon, // Use the formatted value
            'totalberlakuIUP' => $jumlahMasaBerlakuIUP,
            'totalIupGhopo' => $totalIupGhopo,
            'totalPpkhGhopo' => $totalPpkhGhopo,
            'totalberlakuPPKH' => $jumlahMasaBerlakuPPKH,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'ghopocad' => $dashboardcadangan,
            'activeMenu' => $activeMenu,
            'chartData' => json_encode($chartData), // Convert to JSON for the view

        ]);
    }
}
