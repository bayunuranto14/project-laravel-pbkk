@extends('layouts.admin')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Data Galeri
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Data Galeri
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
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Konser</td>
                                    <td>Gambar</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)

                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->concerts->title}}</td>
                                    <td>
                                        <img src="{{Storage::url($item->image)}}" alt="" style="width:200px;" />
                                    </td>
                                    <td>
                                        <a href="{{route('gallery.edit', $item->id)}}" class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{route('gallery.destroy', $item->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
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