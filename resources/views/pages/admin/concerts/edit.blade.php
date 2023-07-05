@extends('layouts.admin')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Edit Event
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Edit Event
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
                    <h3 class="card-title">{{$item->title}}</h3>
                    <form action="{{ route('tour-package.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Location" value="{{ $item->location }}">
                        </div>
                        <div class="form-group">
                            <label for="about">Description</label>
                            <textarea name="description" rows="10" class="ckeditor form-control">{{ $item->about }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured_event">Guest Star</label>
                            <input type="text" class="form-control" name="guest_star" placeholder="Guest Star" value="{{ $item->featured_event }}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $item->type }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('addon-script')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
@endpush