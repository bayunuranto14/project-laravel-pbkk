@extends('layouts.admin') @section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Transaksi
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Transaksi
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Konser</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->concert->title}}</td>
                                    <td>Name</td>
                                    <td>Rp. {{$item->transaction_total}}</td>
                                    <td>{{$item->transaction_status}}</td>
                                    <td>
                                        <a data-remote="{{route('transaction.show', $item->id)}}" data-toggle="modal" data-target="#myModal" class="btn btn-light">
                                            detail
                                        </a>

                                        <a href="{{route('transaction.edit', $item->id)}}" class="btn btn-primary">
                                            edit
                                        </a>

                                        <form action="{{route('transaction.destroy', $item->id)}}" method="POST" class="d-inline">
                                            @csrf @method('delete')
                                            <button class="btn btn-danger">
                                                delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Tidak ada data
                                    </td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('prepend-script')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Transaksi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endpush
@push('addon-script')
<script>
    jQuery(document).ready(function($) {
        $('#myModal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
        });
    });
</script>

@endpush