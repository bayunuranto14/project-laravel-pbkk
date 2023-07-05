@extends('layouts.admin')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Edit Galeri
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Edit Galeri
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Wisata</label>
                            <input type="text" class="form-control" name="tour_packages_title" readonly placeholder="Title" value="{{$item->tour_package->title}}">
                            <input type="text" class="form-control" name="tour_packages_id" hidden placeholder="Title" value="{{$item->tour_package->id}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Image">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection