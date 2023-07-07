@extends('layouts.checkout')

@section('title')
Checkout
@endsection

@section('content')

<main>
    <section class="section section-details-header">

    </section>

    <section class="section section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Tiket Konser
                            </li>
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <h1>Ticket</h1>
                        <p>
                            Ticket to {{ $item->concert->title }}, {{ $item->concert->location }}
                        </p>
                        <div class="anttendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Photo</td>
                                        <td>Name</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle" />
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{route('checkout-remove', $detail->id)}}">
                                                <img src="{{asset('frontend/images/ic_remove.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No Visitor
                                        </td>

                                        @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form class="form-inline" method="post" action="{{route('checkout-create',$item->id)}}">
                                @csrf
                                <label for="username" class="sr-only">Name</label>
                                <input type="text" name="username" id="username" class="form-control mb-2 mr-sm-2" placeholder="Username" required>
                                <button type="submit" class="btn btn-add-now mb-2 px-4">
                                    Add Now
                                </button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Information</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">
                                    {{ $item->details->count() }} person
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Total</th>
                                <td width="50%" class="text-right">
                                    Rp. {{ $item->transaction_total }}
                                </td>
                            </tr>
                        </table>
                        <hr />
                        <h2>Payment Instructions</h2>
                        <p class="payment-instruntion">
                            Please complete your payment before to continue
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{asset('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT. Traveling Indonesia</h3>
                                    <p>
                                        0812-812-812-812<br />
                                        Bank Central Asia (BCA)
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{asset('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT. Traveling Indonesia</h3>
                                    <p>
                                        0888-112-112-112<br />
                                        Bank Mandiri (Mandiri)
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{route('checkout-success',$item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">
                            I Have Made Payment
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{route('detail', $item->concert->slug)}}" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
    </section>
</main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{asset('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
<script src="{{asset('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="http://ujicoba.test/frontend/images/ic_doe.png" alt="" />'
            }
        });
    });
</script>
@endpush