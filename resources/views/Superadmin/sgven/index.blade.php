@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('sgven/create') }}">Tambah</a>
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
                                @foreach ($sgven as $i)
                                    <option value="{{ $i->no }}">{{ $i->komoditi }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Komoditi</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table-bordered table-striped table-hover table-sm table" id="table_sgven">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jarak(km)</th>
                        <th>latitude</th>
                        <th>longitude</th>
                        <th>Vendor</th>
                        <th>Komoditi</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Kap (ton/thn)</th>
                        <th>Konsumsi(ton/thn)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>

        th {
            text-align: center;
        }   
        .aksi-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .aksi-buttons a, .aksi-buttons button {
            flex-grow: 1;
            text-align: center;
        }

        table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataLevel = $('#table_sgven').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('sgven/list') }}",
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
                        data: "latitude",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "longitude",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "vendor",
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
                        data: "desa",
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
                        data: "kabupaten",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "kap_ton_thn",
                        className: "",
                        orderable: true,
                        searchable: true,
                        render: function(data, type, row){
                            return new Intl.NumberFormat('id-ID').format(data);
                        },
                        width: "150px"
                    },
                    {
                        data: "konsumsi_ton_thn",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        orderable: false,
                        searchable: false,
                        width:"170px"
                    }
                ]
            });
            $('#no').on('change', function() {
                dataLevel.ajax.reload();
            });
        });
    </script>
@endpush
