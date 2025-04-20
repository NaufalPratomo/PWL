{{-- Halaman yang menampilkan daftar sepatu dalam bentuk tabel dengan fitur DataTables dan filter berdasarkan kategori. --}}

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('sepatu/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah </button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">- Semua -</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori Sepatu</small>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_sepatu">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori Sepatu</th>
                    <th>Kode Sepatu</th>
                    <th>Nama Sepatu</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-
backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataSepatu;
    $(document).ready(function() {
        dataSepatu = $('#table_sepatu').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('sepatu/list') }}",
                "dataType": "json", 
                "type": "POST",
                "data": function (d) {
                    d.kategori_id = $('#kategori_id').val();
                }
            },
            columns: [{
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            }, {
                data: "kategori.kategori_nama",
                className: "",
                orderable: false,
                searchable: false
            }, {
                data: "sepatu_kode",
                className: "",
                orderable: true,
                searchable: true
            }, {
                data: "sepatu_nama",
                className: "",
                orderable: true,
                searchable: true
            }, {
                data: "harga_beli",
                className: "",
                orderable: true,
                searchable: true,
                render: function(data) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(data);
                }
            }, {
                data: "harga_jual",
                className: "",
                orderable: true,
                searchable: true,
                render: function(data) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(data);
                }
            }, {
                data: "supplier.supplier_nama",
                className: "",
                orderable: false,
                searchable: false
            }, {
                data: "aksi",
                className: "",
                orderable: false,
                searchable: false
            }]
        });

        $('#kategori_id').on('change', function() {
            dataSepatu.ajax.reload();
        });
    });
</script>
@endpush