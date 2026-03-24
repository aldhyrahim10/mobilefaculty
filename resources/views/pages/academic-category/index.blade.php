@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Kategori Akademik</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item">Kategori Akademik
                        </li>
                        <li class="breadcrumb-item active">Data Kategori Akademik
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAdd">
                <i class="feather icon-plus-circle"></i> Tambah Data
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data-data Kategori Akademik</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th style="width: 60%;">Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                    <tr class="item-content text-center">
                                        <td style="width: 2%">
                                            {{ $loop->iteration }}
                                            <input type="hidden" class="hdnCategoryID" value="{{$item->id}}">
                                        </td>
                                        <td style="width: 60%">{{ $item->academic_category_name}}</td>
                                        
                                        <td class="text-center">
                                            <div class="btn btn-warning btn-update" data-toggle="modal" data-target="#modalUpdate">
                                                <i class="feather icon-edit"></i></div>
                                            <div class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalDelete">
                                                <i class="feather icon-trash"></i></div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Modal Tambah --}}
<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger m-2 alert-validation-msg alert-section" style="display: none;" role="alert">
                <div class="alert-list">

                </div>
            </div>
            <form id="formAddCategory">
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Kategori Akademik</label>
                                <input type="text" class="form-control" id="academic_category_name" name="academic_category_name"
                                    placeholder="Masukkan Nama Kategori Akademik">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modat Edit --}}
<div class="modal fade text-left" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Ubah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger m-2 alert-validation-msg alert-section" style="display: none;" role="alert">
                <div class="alert-list">

                </div>
            </div>
            <form id="formUpdateCategory">
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <input type="hidden" id="hdnCategoryID" value="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Kategori Akademik</label>
                                <input type="text" class="form-control" id="academic_category_name" name="academic_category_name"
                                    placeholder="Masukkan Nama Kategori Akademik">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                
                
            </form>
        </div>
    </div>
</div>

{{-- Modal Hapus --}}

<div class="modal fade text-left" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <input type="hidden" class="hdnCategoryID" value="">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                <p>Apakah anda yakin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-delete-execute">Ya, Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        
        $("#formAddCategory").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);

            $.ajax({
                url: "{{ route('add-academic-category') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Data berhasil ditambahkan");
                    location.reload();
                },
                error: function (xhr, status, error) {
                    $(".alert-section").empty();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            const message = value[0];

                            const alertHTML = `
                            <div class="alert-point">
                                <i class="feather icon-info align-middle"></i>
                                <span>${message}</span>
                            </div>
                            `
                            $(".alert-section").append(alertHTML);
                        });

                        $(".alert-section").show();
                    }

                }
            });
        });
        
        $(document).on('click', '.btn-update', function () {
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnCategoryID").val();

            $.ajax({
                url: "{{ route('get-one-academic-category') }}",
                type: "GET",
                data: {
                    'query': id
                },
                success: function (data) {
                    var formEditContent = $("#formUpdateCategory");
                    formEditContent.find("#hdnCategoryID").val(data.id);
                    formEditContent.find("#academic_category_name").val(data.academic_category_name);
                }
            });
        });

        $("#formUpdateCategory").submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);
            formData.append('_method', 'PATCH');

            var id = $(this).find("#hdnCategoryID").val();

            $.ajax({
                url: "{{ route('update-academic-category', ':id') }}".replace(':id', id),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert("Data berhasil diubah");
                    location.reload();
                },
                error: function(xhr) {

                    $(".alert-section").empty();

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            const message = value[0];

                            const alertHTML = `
                            <div class="alert-point">
                                <i class="feather icon-info align-middle"></i>
                                <span>${message}</span>
                            </div>
                            `
                            $(".alert-section").append(alertHTML);
                        });

                        $(".alert-section").show();
                    }
                }
            });

        });

        $(document).on('click', '.btn-delete', function () {
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnCategoryID").val();

            var modalContent = $("#modalDelete");

            modalContent.find(".hdnCategoryID").val(id);
        });

        $(document).on('click', '.btn-delete-execute', function () {
            var modalContent = $("#modalDelete");
            var id = modalContent.find(".hdnCategoryID").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('delete-academic-category', ':id') }}".replace(':id', id),
                type: "POST",
                data: {
                    '_token': csrfToken,
                    '_method': 'DELETE',
                },
                success: function (data) {
                    alert("Data berhasil dihapus");
                    location.reload();    
                }
            });
        });
        
    });

</script>
@endsection
