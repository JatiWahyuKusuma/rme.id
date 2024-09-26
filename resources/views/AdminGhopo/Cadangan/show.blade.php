@extends('layoutGhopo.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($cadanganghopo)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table-bordered table-striped table-hover sm table table">
                    <tr>
                        <th>No</th>
                        <td>{{ $cadanganghopo->no }}</td>
                    </tr>
                    <tr>
                        <th>Jarak</th>
                        <td>{{ $cadanganghopo->jarak }}</td>
                    </tr>
                    <tr>
                        <th>latitude</th>
                        <td>{{ $cadanganghopo->latitude }}</td>
                    </tr>
                    <tr>
                        <th>longitude</th>
                        <td>{{ $cadanganghopo->longitude }}</td>
                    </tr>
                    <tr>
                        <th>No ID</th>
                        <td>{{ number_format($cadanganghopo->no_id, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Komoditi</th>
                        <td>{{ $cadanganghopo->komoditi }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi IUP</th>
                        <td>{{ $cadanganghopo->lokasi_iup }}</td>
                    </tr>
                    <tr>
                        <th>Tipe SD/Cadangan</th>
                        <td>{{ $cadanganghopo->tipe_sd_cadangan }}</td>
                    </tr>
                    <tr>
                        <th>SD/Cadangan(ton)</th>
                        <td>{{ number_format($cadanganghopo->sd_cadangan_ton, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>catatan</th>
                        <td>{{ $cadanganghopo->catatan }}</td>
                    </tr>
                    <tr>
                        <th>Status Penyelidikan</th>
                        <td>{{ $cadanganghopo->status_penyelidikan }}</td>
                    </tr>
                    <tr>
                        <th>Acuan</th>
                        <td>{{ $cadanganghopo->acuan }}</td>
                    </tr>
                    <tr>
                        <th>Kabupaten</th>
                        <td>{{ $cadanganghopo->kabupaten }}</td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td>{{ $cadanganghopo->kecamatan }}</td>
                    </tr>
                    <tr>
                        <th>Luas(ha)</th>
                        <td>{{ $cadanganghopo->luas_ha}}</td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku IUP</th>
                        <td>{{ $cadanganghopo->masa_berlaku_iup }}</td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku PPKH</th>
                        <td>{{ $cadanganghopo->masa_berlaku_ppkh }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('cadanganghopo') }}" class="btn btn-sm btn-primary mt-4 mb-2">Kembali</a>
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
