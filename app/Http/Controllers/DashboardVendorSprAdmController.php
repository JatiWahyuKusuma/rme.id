<?php

namespace App\Http\Controllers;

use App\Models\GhopoVenModel;
use App\Models\SGVenModel;
use Illuminate\Http\Request;

class DashboardVendorSprAdmController extends Controller
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
        $dashboardcadangan = GhopoVenModel::all();
        $kapTonThn = GhopoVenModel::count(); // Count of Ghopo
        $kapTonThnGhopo = GhopoVenModel::sum('kap_ton_thn'); // Ensure this column exists in GhopoCadModel
        $kapTonThnSG = SGVenModel::sum('kap_ton_thn'); // Ensure this column exists in SGVenModel
        $totalKapTonThn = $kapTonThnGhopo + $kapTonThnSG; // Combine the totals
        $formattedtotalKapTonThn = number_format($totalKapTonThn);

        //Total Potensi BB (Komoditi)
        $dashboardcadangan = GhopoVenModel::all();
        $totalIupGhopo = GhopoVenModel::count();
        $komoditiGhopo = GhopoVenModel::count('komoditi'); // Ensure this column exists in GhopoCadModel
        $komoditiSG = SGVenModel::count('komoditi'); // Ensure this column exists in SGVenModel
        $totalKomoditi = $komoditiGhopo + $komoditiSG; // Combine the totals

        //Total Vendor
        $dashboardcadangan = GhopoVenModel::all();
        $totalVendorGhopo = GhopoVenModel::count();
        $vendorGhopo = GhopoVenModel::count('vendor'); // Ensure this column exists in GhopoCadModel
        $vendorSG = SGVenModel::count('vendor'); // Ensure this column exists in SGVenModel
        $jumlahMasaBerlakuPPKH = $vendorGhopo + $vendorSG; // Combine the totals

        //bar chart
        $ghopoData = GhopoVenModel::all();
        $sgData = SGVenModel::all();

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
            // 'sdCadanganGhopo' => $sdCadanganGhopo,
            // 'sdCadanganTon' => $formattedTotalSdCadanganTon, // Use the formatted value
            'totalberlakuIUP' => $totalKomoditi,
            'totalIupGhopo' => $totalIupGhopo,
            'totalVendorGhopo' => $totalVendorGhopo,
            'totalberlakuPPKH' => $jumlahMasaBerlakuPPKH,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'ghopocad' => $dashboardcadangan,
            'activeMenu' => $activeMenu,
            'chartData' => json_encode($chartData), // Convert to JSON for the view

        ]);
    }
}
