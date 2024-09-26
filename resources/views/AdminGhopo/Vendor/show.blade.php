@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($vendorghopo)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table-bordered table-striped table-hover sm table table">
                    <tr>
                        <th>No</th>
                        <td>{{ $vendorghopo->no }}</td>
                    </tr>
                    <tr>
                        <th>Jarak</th>
                        <td>{{ $vendorghopo->jarak }}</td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>{{ $vendorghopo->latitude }}</td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td>{{ $vendorghopo->longitude }}</td>
                    </tr>
                    <tr>
                        <th>Vendor</th>
                        <td>{{ $vendorghopo->vendor }}</td>
                    </tr>
                    <tr>
                        <th>Komoditi</th>
                        <td>{{ $vendorghopo->komoditi }}</td>
                    </tr>
                    <tr>
                        <th>Desa</th>
                        <td>{{ $vendorghopo->desa }}</td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td>{{ $vendorghopo->kecamatan }}</td>
                    </tr>
                    <tr>
                        <th>Kabupaten</th>
                        <td>{{ $vendorghopo->kabupaten }}</td>
                    </tr>
                    <tr>
                        <th>Kap (ton/thn)</th>
                        <td>{{ $vendorghopo->kap_ton_thn }}</td>
                    </tr>
                    <tr>
                        <th>Konsumsi(ton/thn)</th>
                        <td>{{ $vendorghopo->konsumsi_ton_thn }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('vendorghopo') }}" class="btn btn-sm btn-primary mt-4 mb-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
<style>
    /* Add spacing and improve button styling */
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
    }
    
    /* Adjust margin and spacing for better layout */
    .mt-4 {
        margin-top: 1.5rem !important;
    }
    .mb-2 {
        margin-bottom: 0.75rem !important;
    }
</style>
@endpush

@push('js')
@endpush
