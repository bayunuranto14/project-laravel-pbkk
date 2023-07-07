@extends('layouts.success')

@section('title')
Checkout Success
@endsection

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{asset('frontend/images/ic_mail.gif')}}" alt="" style="width : 400px;">
            <h1>Yey! Success</h1>
            <p>
                Your payment has been successfuly processed.
                <br>
                Please check your email for trip information.
            </p>
            <a href="{{route('home')}}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection