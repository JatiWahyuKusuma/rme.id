@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('ghopocad/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div> <!-- Change class to 'alert-danger' -->
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter: </label>
                        <div class="col-3">
                            <select class="form-control" name="no" id="no">
                                <option value="">-- Semua --</option>
                                @foreach ($ghopocad as $i)
                                    <option value="{{ $i->no }}">{{ $i->komoditi }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Komoditi</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table-bordered table-striped table-hover table-sm table" id="table_ghopocad">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Jarak</th>
                        <th>Komoditi</th>
                        <th>Lokasi/IUP</th>
                        <th>Tipe SD/Cadangan</th>
                        <th>SD/Cadangan(ton)</th>
                        <th>Catatan</th>
                        <th>Status Penyelidikan</th>
                        <th>Acuan</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Luas(Ha)</th>
                        <th>Masa Berlaku IUP</th>
                        <th>Masa Berlaku PPKH</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .aksi-buttons {
            display: flex; /* Membuat tombol dalam satu baris (horizontal) */
            gap: 2px; /* Memberikan jarak antar tombol */
        }

        .aksi-buttons a, .aksi-buttons button {
            flex-grow: 1; /* Semua tombol memiliki lebar yang sama */
            width: 75px; /* Ukuran lebar tombol bisa diatur sesuai kebutuhan */
            text-align: center; /* Agar teks dalam tombol rata tengah */
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataLevel = $('#table_ghopocad').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('ghopocad/list') }}",
                    "type": "POST",
                    "data": function(d) {
                        d._token = '{{ csrf_token() }}'; // Add CSRF token
                        d.no = $('#no').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "jarak",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "komoditi",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "lokasi_iup",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "tipe_sd_cadangan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "sd_cadangan_ton",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "catatan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "status_penyelidikan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "acuan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "kabupaten",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "kecamatan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "luas_ha",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "masa_berlaku_iup",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "masa_berlaku_ppkh",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        render: function(data, type, row) {
                            return `
                                <div class="aksi-buttons">
                                    <a href="ghopocad/${row.no}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="ghopocad/${row.no}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="${row.no}">Hapus</button>
                                </div>
                            `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#no').on('change', function() {
                dataLevel.ajax.reload();
            });
        });
    </script>
@endpush
