@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Dokumentasi</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item">Dokumentasi
                        </li>
                        <li class="breadcrumb-item active">Data Dokumentasi
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
                    <h4 class="card-title">Data-data Dokumentasi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Foto Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($documentations as $item)
                                        <tr class="item-content">
                                            <td style="width: 2%">
                                                {{ $loop->iteration }}
                                                <input type="hidden" class="hdnPostID" value="{{ $item->id }}">
                                            </td>
                                            <td style="width: 40%">{{ $item->title }}</td>
                                            <td style="width: 30%">
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    width="150px" alt="">
                                            </td>

                                            <td class="text-center">

                                                <div class="btn btn-warning btn-update" data-toggle="modal"
                                                    data-target="#modalUpdate">
                                                    <i class="feather icon-edit"></i></div>
                                                <div class="btn btn-danger btn-delete" data-toggle="modal"
                                                    data-target="#modalDelete">
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
            <form id="formAddDocumentation">
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <div class="row">
                        <input type="hidden" id="post_category_id" value="1">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Masukkan Judul">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Konten</label>
                                <textarea class="form-control content-desc-add" name="content" id="content" cols="30"
                                    rows="5" placeholder="Masukkan Konten"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Foto Kegiatan</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label for="">Hastag</label>
                                <select name="tags[]" id="tags" class="form-control" multiple="multiple"></select>
                            </div>
                        </div> --}}

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
            <form id="formUpdateDocumentation">
                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                    <input type="hidden" id="hdnPostID" value="">
                    <div class="row">
                        <input type="hidden" id="post_category_id" value="1">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Masukkan Judul">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Konten</label>
                                <textarea class="form-control content-desc-edit" name="content" id="content" cols="30"
                                    rows="5" placeholder="Masukkan Konten"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Foto Kegiatan</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <small class="mt-2">Gambar sebelumnya</small>
                                <br>
                                <img id="img-now" src="" alt="" style="width: 150px; height: auto;">
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label for="">Hastag</label>
                                <select name="edit_tags[]" id="edit_tags" class="form-control" multiple="multiple"></select>
                            </div>
                        </div> --}}

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
            <input type="hidden" class="hdnPostID" value="">
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    let editorDescription;

    ClassicEditor
        .create(document.querySelector('.content-desc-add'))
        .catch(error => console.error(error));

    ClassicEditor
        .create(document.querySelector('.content-desc-edit'))
        .then(editor => {
            editorDescription = editor;
        }).catch(error => console.error(error));

</script>

<script>
    $(document).ready(function () {
        // Inisialisasi Select2 dengan kemampuan membuat tag baru
        // $('#tags').select2({
        //     tags: true,
        //     tokenSeparators: [',', ' '],
        //     placeholder: 'Ketik tag, lalu tekan Enter',
        //     width: '100%'
        // });

        // $('#edit_tags').select2({
        //     tags: true,
        //     tokenSeparators: [',', ' '],
        //     placeholder: 'Ubah tag atau tambahkan baru',
        //     dropdownParent: $('#modalEdit'),
        //     width: '100%'
        // });


        $("#formAddDocumentation").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var type = $("#post_category_id").val();

            formData.append('_token', csrfToken);
            formData.append('post_category_id', type);

            $.ajax({
                url: "{{ route('add-documentation') }}",
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
            var id = item.find(".hdnPostID").val();

            $.ajax({
                url: "{{ route('get-one-documentation') }}",
                type: "GET",
                data: {
                    'query': id
                },
                success: function (data) {
                    var formEditContent = $("#formUpdateDocumentation");
                    formEditContent.find("#hdnPostID").val(data.id);
                    formEditContent.find("#title").val(data.title);
                    editorDescription.setData(data.content);
                    let imageUrl = '/storage/' + data.image;
                    formEditContent.find("#img-now").attr('src', imageUrl);
                }
            });
        });

        $("#formUpdateDocumentation").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var type = $("#post_category_id").val();

            formData.append('_token', csrfToken);
            formData.append('_method', 'PATCH');
            formData.append('post_category_id', type);

            var id = $(this).find("#hdnPostID").val();

            $.ajax({
                url: "{{ route('update-documentation', ':id') }}"
                    .replace(':id', id),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Data berhasil diubah");
                    location.reload();
                },
                error: function (xhr) {

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
            var id = item.find(".hdnPostID").val();

            var modalContent = $("#modalDelete");

            modalContent.find(".hdnPostID").val(id);
        });

        $(document).on('click', '.btn-delete-execute', function () {
            var modalContent = $("#modalDelete");
            var id = modalContent.find(".hdnPostID").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('delete-documentation', ':id') }}"
                    .replace(':id', id),
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
