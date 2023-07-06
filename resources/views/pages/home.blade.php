@extends('layouts.app')

@section('title')
    TREVGO
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center">
      <h1>Explore The Wonderful Indonesia 
        <br/>
        As Easy One Click
      </h1>
      <p class="mt-3">
        You will see beautiful 
        <br/>
        moment you never see before
       </p>
       <a href="#popular" class="btn btn-get-started px-4 mt-4">
         Get Started
       </a>
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
            <p>Destinations</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <p>Hotels</p>
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
              <h2>Wisata Popular</h2>
              <p>
                Something that you never try
                <br/>
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
              <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');" >
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

      <section class="section-testimonials-heading" id="testimonialsHeading">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>They Are Loving Us</h2>
              <p>
                Moments were giving them
                <br />
                the best experience
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="section-testimonials-content" id="testimonialsContent">
        <div class="container">
          <div
            class="section-popular-travel row justify-content-center match-height"
          >
          @forelse ($testimonies as $testimony )
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card card-testimonial text-center">
              <div class="testimonial-content">
                <img
                  {{-- src="frontend/images/avatar-1.png" --}}
                  alt=""
                  class="mb-4 rounded-circle"
                />
                <h3 class="mb-4">{{ $testimony->name }}</h3>
                <p class="testimonials">
                  “ {{ $testimony->comment }} “
                </p>
              </div>
              <hr />
              <p class="trip-to mt-2">Trip to {{ $testimony->trip }}</p>
            </div>
          </div>
        @empty
          <h1> Not Yet Implemented </h1>
        @endforelse
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                I Need Help
              </a>
              <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                Get Started
              </a>
            </div>
          </div>
        </div>
      </section>
      
    </main>

@endsection
