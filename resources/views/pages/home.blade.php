@extends('layouts.app')

@section('title')
SUMMERSONIC
@endsection

@section('content')
<!-- Header -->
<header class="text-center">
    <h1>SUMMERSONIC FESTIVAL
        <br />
        World Largest Music Festival
    </h1>
    <p class="mt-3">
        Music Is Shorthand Of Emotions
    </p>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>200</h2>
                <p>Artist</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>100</h2>
                <p>Conserts</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>80</h2>
                <p>Patners</p>
            </div>

        </section>
    </div>

    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Konser Popular</h2>
                    <p>
                        Something that you never try
                        <br />
                        before in this world
                    </p>
                </div>
            </div>
    </section>

    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center ">
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                        <div class="travel-country">{{$item->location}}</div>
                        <div class="travel-location">{{$item->title}}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{route('detail',$item->slug)}}" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-networks" id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 aos-init aos-animate" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <h2>Our Networks</h2>
                    <p>
                        We are member of some great network
                        <br />
                        that help us to connect with our customers
                    </p>
                </div>
                <div class="col-md-8 text-center aos-init aos-animate" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <img src="frontend/images/partner.png" class="img-patner" />
                </div>
            </div>
        </div>
    </section>

</main>

@endsection