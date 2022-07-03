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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kecamatan as $items)
                                                <tr>
                                                    <td>{{$items->provinsi}}</td>
                                                    <td>{{$items->kota}}</td>
                                                    <td>{{$items->kelurahan}}</td>
                                                    <td>{{$items->nama}}</td>
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
                        <div class="row">
                            @foreach($kecamatan as $items)
                                <div class="col-md-4">
                                    <!-- Widget: user widget style 2 -->
                                    <div class="ui-state-default banner card card-widget widget-user">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header"
                                            style="background: url({{$items->image}}); background-size: 100%; ">
                                        </div>
                                        <div class="banner card-header">
                                            <h1>{{$items->organization}}</h1>
                                            <h1>{{$items->reward}}</h1>
                                            <h2>{{$items->created_time->format('d F Y h:m')}}</h2>
                                        </div>
                                        <div class="banner card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="banner-s description-block">
                                                        <p>Status</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="banner-r description-block">
                                                        <p>{{(($items->status) == 0)? 'Unpublished': 'Published'}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__overlay">
                                            <div class="overlay__text">
                                                <a type="button" data-value="{{$items->id}}" data-toggle="modal" data-target="#confirmModal" href="#"><i class="fas fa-trash-alt"></i></a>
                                                <a type="button" href="{{url('achievement/edit', [$items->id])}}" class="btn btn-outline-light">Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteForm">
                        {{csrf_field()}}
                        {{method_field("DELETE")}}
                        <div class="modal-header" style="background-color: #dc3545; color: #ffffff;">
                            <h5 class="modal-title modal-danger" id="exampleModalLabel">Delete Banner</h5>
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
