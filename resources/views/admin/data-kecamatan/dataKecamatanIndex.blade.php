@extends('layouts.app')

@section('title', 'Data Kecamatan')

@section('third_party_stylesheets')
    <link href="{{ asset('css/kecamatan.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="banner container-fluid">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1><b>Data Kecamatan</b></h1>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="banner breadcrumb float-sm-left">
                            <li class="banner breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="banner breadcrumb-item"><a href="{{url('/data-kecamatan')}}">Data Kecamatan</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        @if(Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('deleted'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{Session::get('deleted')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Main content -->
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
        <!-- Import Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="file" name="file" class="form-control">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteForm">
                        {{csrf_field()}}
                        {{method_field("DELETE")}}
                        <div class="modal-header" style="background-color: #dc3545; color: #ffffff;">
                            <h5 class="modal-title modal-danger" id="exampleModalLabel">Delete Kelurahan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this data? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                            <a role="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
                            <button class="btn btn-danger delBtn"  role="button" type="submit" name="delBtn">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
