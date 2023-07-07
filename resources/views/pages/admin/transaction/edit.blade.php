@extends('layouts.admin')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Edit Wisata
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Edit Wisata
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
                    <form action="{{ route('transaction.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Status</label>
                            <select name="transaction_status" required class="form-control">
                                <option value="{{ $item->transaction_status }}">Status Saat Ini ({{ $item->transaction_status }})</option>
                                <option value="IN_CART">In Cart</option>
                                <option value="PENDING">Pending</option>
                                <option value="SUCCESS">Success</option>
                                <option value="CANCEL">Cancel</option>
                                <option value="FAILED">Failed</option>
                            </select>
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