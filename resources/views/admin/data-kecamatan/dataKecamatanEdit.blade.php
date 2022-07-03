@extends('layouts.app')

@section('title', 'Edit Data Kecamatan')

@section('third_party_stylesheets')
    <link href="{{ asset('css/kecamatan.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="banner container-fluid">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1><b>Edit Data Kecamatan</b></h1>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="banner breadcrumb float-sm-left">
                            <li class="banner breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="banner breadcrumb-item"><a href="{{url('/data-kecamatan')}}">Data Kecamatan</a></li>
                            <li class="banner breadcrumb-item"><a href="#"> Edit Data Kecamatan</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <div class="news container-fluid col-md-12">
            <form method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card card-default">
                    <div class="card card-default" style="margin: 15px 15px 15px 15px">
                        <div class="card-header">
                            <h1>Edit Kecamatan</h1>
                        </div>
                    <div class="card-body">
                        <div class="card-default">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-input form-group">
                                        <label for="">Provinsi <span style="color:#d9534f">(*)</span></label>
                                        <input type="text" name="provinsi" class="form-control" id="provinsi" maxlength="100" placeholder="Tulis Provinsi" autocomplete="on" value="{{$first->provinsi}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-input form-group">
                                        <label for="">Kota <span style="color:#d9534f">(*)</span></label>
                                        <input type="text" name="kota" class="form-control" id="kota" maxlength="100" placeholder="Tulis Kota" autocomplete="on" value="{{$first->kota}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-input form-group">
                                        <label for="">Provinsi <span style="color:#d9534f">(*)</span></label>
                                        <input type="text" name="kelurahan" class="form-control" id="kelurahan" maxlength="100" placeholder="Tulis Kelurahan" autocomplete="on" value="{{$first->kelurahan}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-input form-group">
                                        <label for="">Provinsi <span style="color:#d9534f">(*)</span></label>
                                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" maxlength="100" placeholder="Tulis Kecamatan" autocomplete="on" value="{{$first->kecamatan}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <div class="col-md-2 offset-10">
                            <button type="submit" class="btn btn-block btn-lg float-right btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <section class="content">
            <div class="header container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-md-8 align-self-center">
                                <h2 class="card-title"><b>Import Data Kecamatan</b></h2>
                            </div>
                            <div class="col-md-2">
                                <a type="button" href="{{url('/data-kecamatan/export')}}" class="btn-block btn-lg btn-border-primary">Download to Excel</a>
                            </div>
                            <div class="col-md-2">
                                <a type="button" href="#" class="btn-block btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">Import Data Kecamatan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Province</th>
                                                <th>Kota</th>
                                                <th>Kelurahan</th>
                                                <th>Kecamatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kecamatan as $items)
                                                <tr>
                                                    <td>{{$items->provinsi}}</td>
                                                    <td>{{$items->kota}}</td>
                                                    <td>{{$items->kelurahan}}</td>
                                                    <td>{{$items->nama}}</td>
                                                    <!-- Mohon maaf sementara saya buat seperti ini dahulu -->
                                                    <td>
                                                        <a type="button" href="{{url('achievement/edit', [$items->id])}}" class="btn btn-outline-light">Ubah</a>
                                                        <a type="button" data-value="{{$items->id}}" data-toggle="modal" data-target="#confirmModal" href="#">Hapus</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div><div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                            </li>
                                            <li class="paginate_button page-item ">
                                                <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="example2_next">
                                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('third_party_scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $( function() {
        $( "#sortable" ).sortable({
            opacity:0.5
        });
        } );
    </script>

    <script>

        // deletion modals
        $('#confirmModal').on('shown.bs.modal', function (e) {
            var btn = $(e.relatedTarget);
            $('#deleteForm').attr('action', '/data-kecamatan/delete/' + btn.data('value'));
        });
    </script>
@endsection
