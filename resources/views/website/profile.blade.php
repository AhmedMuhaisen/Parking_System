@extends('website.main')
@section('content')


<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade">
        <div class="container position-relative">
            <h1>Profile Page</h1>

            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Profile</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-8 order-lg-1 order-2">
                    <div class="service-main-content">
                        <div class="service-header" data-aos="fade-up">
                            <h1>{{ Auth::user()->first_name .' '. Auth::user()->second_name }}</h1>
                            <div class="service-meta">
                                <span><i class="bi bi-building"></i> {{ Auth::user()->building->name }} Building</span>
                                <span><i class="bi "></i> </span>
                                <span><i class="bi bi-star"></i> {{ Auth::user()->unit->name }} Unit</span>

                            </div>
                            <div class="service-features-list d-flex flex-wrap" data-aos="fade-up" data-aos-delay="200">

                                <div>

                                    <div>
                                        <h5> <i class="bi bi-clock-history"></i> Date Of Barth</h5>
                                        <p>{{ Auth::user()->date_birth }}</p>
                                    </div>
                                </div>
                                <div>

                                    <div>
                                        <h5><i class="bi bi-telephone-fill"></i> Phone Number</h5>
                                        <p>{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>

                                <div>

                                    <div>
                                        <h5> <i class="bi bi-envelope-fill"></i> Email Address</h5>
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="service-tabs" data-aos="fade-up" data-aos-delay="200">
                            <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#service-details-tab-2" type="button" role="tab"
                                        aria-controls="Vehicles" aria-selected="false">
                                        <i class="bi bi-car-front"></i> Vehicle
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#service-details-tab-3" type="button" role="tab"
                                        aria-controls="benefits" aria-selected="false">
                                        <i class="bi bi-graph-up-arrow"></i> Guests
                                    </button>
                                </li>

                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#service-details-tab-4" type="button" role="tab"
                                        aria-controls="benefits" aria-selected="false">
                                        <i class="bi bi-graph-up-arrow"></i> Testimonials
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade" id="service-details-tab-2" role="tabpanel"
                                    aria-labelledby="process-tab">
                                    <div class="process-timeline">

                                        @foreach (Auth::user()->vehicle as $vehicle)


                                        <div class="timeline-item mb-5">
                                            <div class="timeline-marker">{{ $loop->iteration }}</div>

                                            <div class="timeline-content">
                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <div>
                                                        <h4>Vehicle {{ $loop->iteration }} details</h4>
                                                    </div>

                                                    <div> <button href="#" class="btn btn-primary"><i
                                                                class="bi bi-pencil"></i></button>
                                                        <button href="#" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </div>

                                                <div class="row g-4">
                                                    <div class="col-md-4">
                                                        <div class="benefit-card">
                                                            <div class="benefit-icon">
                                                                <i class="bi bi-card-text"></i>
                                                            </div>
                                                            <h4>Vehicle Number</h4>
                                                            <p>{{ $vehicle->vehicle_number }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="benefit-card">
                                                            <div class="benefit-icon">
                                                                <i class="bi bi-bus-front"></i>
                                                            </div>
                                                            <h4>Vehicle Type</h4>
                                                            <p>{{ $vehicle->vehicle_type->name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="benefit-card">
                                                            <div class="benefit-icon">
                                                                <i class="bi bi-list"></i>
                                                            </div>
                                                            <h4>Motor</h4>
                                                            <p>{{ $vehicle->motor_type->name }}</p>
                                                        </div>
                                                    </div>
                                                    @if($vehicle->vehicle_type->name =='Car')
                                                    <div class="col-md-4">
                                                        <div class="benefit-card">
                                                            <div class="benefit-icon">
                                                                <i class="bi bi-car-front"></i>
                                                            </div>
                                                            <h4>car type</h4>
                                                            <p>{{ $vehicle->car_type->name }}</p>
                                                        </div>
                                                    </div>


                                                    @endif

                                                    <div class="col-md-4">
                                                        <div class="benefit-card">
                                                            <div class="benefit-icon">
                                                                <i class="bi bi-bootstrap"></i>
                                                            </div>
                                                            <h4>Color</h4>
                                                            <p><input type="color" name="" id=""
                                                                    value="{{ $vehicle->color }}" disabled></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="benefit-card">
                                                            <div class="benefit-icon">
                                                                <i class="bi bi-clock"></i>
                                                            </div>
                                                            <h4>Date Of End</h4>
                                                            <p>{{ $vehicle->date_End }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endforeach

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="service-details-tab-3" role="tabpanel"
                                    aria-labelledby="benefits-tab">
                                    <div class="row g-4">
                                        @foreach (Auth::user()->guests as $guest)
                                        <div class="col-md-6">
                                            <div class="benefit-card">


                                                <h4> <i class="bi bi-person"></i> {{ $guest->name }}</h4>
                                                <div class="contact-method">
                                                    <i class="bi bi-car-front-fill"></i>
                                                    <div>
                                                        <span>vehicle_number</span>
                                                        <p>{{ $guest->vehicle_number }}</p>
                                                    </div>
                                                </div>
                                                <div class="contact-method">
                                                    <i class="bi bi-clock-history"></i>
                                                    <div>
                                                        <span>Login Time</span>
                                                        <p>{{ $guest->login_date }} - {{ $guest->login_time }}</p>
                                                    </div>
                                                </div>

                                                <div class="contact-method">
                                                    <i class="bi bi-clock"></i>
                                                    <div>
                                                        <span>Logout Time</span>
                                                        <p>{{ $guest->logOut_date }} - {{ $guest->logOut_time }}</p>
                                                    </div>
                                                </div>

                                                <div class="d-flex mx-5"> <button href="#"
                                                        class="btn btn-primary mx-2"><i
                                                            class="bi bi-pencil"></i></button>
                                                    <button href="#" class="btn btn-danger mx-2"><i
                                                            class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>




                                   <div class="tab-pane fade" id="service-details-tab-4" role="tabpanel"
                                    aria-labelledby="benefits-tab">
                                    <div class="row g-4">
                                        @foreach (Auth::user()->testimonials as $testimonial)
                                        <div class="col-md-6">
        <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
                            <div class="testimonial-header">
                                <i class="bi bi-quote"></i>
                                <div class="rating">
                               @for($i = 0; $i < $testimonial->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                      @endfor

                                </div>
                            </div>
                            <p class="testimonial-text">
                              {{ $testimonial->text }}
                            </p>
                            <div class="client-info">
                                <div> <button href="#" class="btn btn-primary"><i
                                                                class="bi bi-pencil"></i></button>
                                                        <button href="#" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                            </div>
                        </div>







                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="service-sidebar" data-aos="fade-left">
                        <div class="action-card" data-aos="zoom-in" data-aos-delay="100">
                            <img src="{{ asset('assets/users/me.jpg')}}" class="profile-img" alt="">

                            <a href="#" class="btn-primary">Edit Your Parsonal Information</a>

                        </div>






                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Service Details Section -->

</main>

@endsection
