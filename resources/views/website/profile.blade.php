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

                                                    <div> <button href="#" class="btn btn-primary"
                                                             onclick="openModal('vehicle', {{ $vehicle->id }})">><i
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

                            <a href="#" class="btn-primary " onclick="openModal('personal',1)">Edit Your Parsonal
                                Information</a>

                        </div>






                    </div>
                </div>




                <!-- Personal Information Modal -->
                <div class="modal" id="editModalpersonal1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Edit Information</h3>
                            <span class="close" onclick="closeModal('personal',1)">&times;</span>
                        </div>

                        <form id="editFormpersonal1" action="{{ route('website.edit_personal',Auth::user()->id) }}" method="post">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" id="first_name" value="{{Auth::user()->first_name  }}"
                                    name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label>Second Name</label>
                                <input type="text" id="second_name" value="{{Auth::user()->second_name  }}"
                                    name="second_name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" value="{{Auth::user()->email  }}" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" id="phone" value="{{Auth::user()->phone  }}" name="phone" required>
                            </div>
                            <div class="form-group">
                                <x-select name='unit' title="unit" value="{{Auth::user()->unit->id  }}" :array="$units">
                                </x-select>
                            </div>
                            <div class="form-group">
                                <x-select name='building' title="building" value="{{Auth::user()->building->id  }}"
                                    :array="$buildings"></x-select>
                            </div>

                            <button type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>



                @foreach (Auth::user()->vehicle as $vehicle)

                <!-- Vehicle Information Modal -->
              <div class="modal" id="editModalvehicle{{ $vehicle->id }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Edit Information</h3>
                            <span class="close" onclick="closeModal('vehicle',{{ $vehicle->id }})">&times;</span>
                        </div>

                        <form id="editFormvehicle{{ $vehicle->id }}" action="{{ route('website.edit_vehicle',$vehicle->id) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Vehicle Number</label>
                                <input type="text" id="vehicle_number" name="vehicle_number"
                                    value="{{ $vehicle->vehicle_number }}" required>
                            </div>
                            <div class="form-group">
   <label>Vehicle Type</label>
                                  <x-select name='vehicle_type' title="Vehicle Type" value="{{ $vehicle->vehicle_type->id }}" :array="$vehicles_type">
                                </x-select>

                            </div>
                            <div class="form-group">
   <label>Motor Type</label>
                                <x-select name='motor_type' title="Motor Type" value="{{ $vehicle->motor_type->id }}" :array="$motor_type">
                                </x-select>


                            </div>
                            <div class="form-group">
                                <label>Car Type</label>
                                          <x-select name='car_type' title="car Type" value="{{ $vehicle->car_type->id }}" :array="$car_type">
                                </x-select>
                            </div>
                            <div class="form-group">
                                <label>Color</label>
                                <input type="color" id="color" name="color" value="{{ $vehicle->color }}" required>
                            </div>
                            <div class="form-group">
                                <label>Date Of End</label>
                                <input type="text" id="date_end" name="date_end" value="{{ $vehicle->date_End }}"
                                    required>
                            </div>

                            <button type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
                @endforeach



            </div>

        </div>

    </section><!-- /Service Details Section -->



</main>

@endsection



@section('javascript')
{{-- Edit Personal Information --}}
<script>
    function openModal(type, id) {
    document.getElementById('editModal' + type + id).style.display = 'flex';
  }

  function closeModal(type, id) {
    document.getElementById('editModal' + type+ id).style.display = 'none';
  }

  function setupFormHandler(type ,id) {
    const form = document.getElementById('editForm' + type + id);

    if (!form) return;

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      let data = {};

      if (type === "personal") {
        data = {
          first_name: document.getElementById('first_name').value,
          second_name: document.getElementById('second_name').value,
          email: document.getElementById('email').value,
          phone: document.getElementById('phone').value,
          building_id: document.getElementById('building_id').value,
          unit_id: document.getElementById('unit_id').value,
        };
      } else if (type === "vehicle") {
        data = {
          vehicle_number: document.getElementById('vehicle_number').value,
          vehicle_type: document.getElementById('vehicle_type').value,
          motor_type: document.getElementById('motor_type').value,
          car_type: document.getElementById('car_type').value,
          color: document.getElementById('color').value,
          date_end: document.getElementById('date_end').value,
        };
      } else if (type === "guest") {
        data = {
          guest_name: document.getElementById('guest_name').value,
          vehicle_number: document.getElementById('vehicle_number').value,
          login_date: document.getElementById('login_date').value,
          login_time: document.getElementById('login_time').value,
          logout_date: document.getElementById('logout_date').value,
          logout_time: document.getElementById('logout_time').value,
        };
      } else if (type === "testimonial") {
        data = {
          rating: document.getElementById('rating').value,
          message: document.getElementById('message').value,
        };
      }

      console.log('Form submitted with:', data);

      alert('Information updated successfully!');
      closeModal(type);
    });
  }

  // Set up all form handlers after DOM is loaded
  document.addEventListener('DOMContentLoaded', function () {
    setupFormHandler('personal');
    setupFormHandler('vehicle');
    setupFormHandler('guest');
    setupFormHandler('testimonial');
  });

//

// <script>
//   function openModal(type, id) {
//     document.getElementById('editModal' + type + id).style.display = 'flex';
//   }

//   function closeModal(type, id) {
//     document.getElementById('editModal' + type + id).style.display = 'none';
//   }

//   function setupFormHandler(type, id) {
//     const form = document.getElementById('editForm' + type + id);
//     if (!form) return;

//     form.addEventListener('submit', function (e) {
//       e.preventDefault();

//       let data = {};
//       let url = form.getAttribute('action');

//       if (type === "personal") {
//         data = {
//           first_name: document.getElementById('first_name').value,
//           second_name: document.getElementById('second_name').value,
//           email: document.getElementById('email').value,
//           phone: document.getElementById('phone').value,
//           building_id: document.getElementById('building_id').value,
//           unit_id: document.getElementById('unit_id').value,
//         };
//       } else if (type === "vehicle") {
//         data = {
//           vehicle_number: document.getElementById('vehicle_number').value,
//           vehicle_type: document.getElementById('vehicle_type').value,
//           motor_type: document.getElementById('motor_type').value,
//           car_type: document.getElementById('car_type').value,
//           color: document.getElementById('color').value,
//           date_end: document.getElementById('date_end').value,
//         };
//       } else if (type === "guest") {
//         data = {
//           guest_name: document.getElementById('guest_name').value,
//           vehicle_number: document.getElementById('vehicle_number').value,
//           login_date: document.getElementById('login_date').value,
//           login_time: document.getElementById('login_time').value,
//           logout_date: document.getElementById('logout_date').value,
//           logout_time: document.getElementById('logout_time').value,
//         };
//       } else if (type === "testimonial") {
//         data = {
//           rating: document.getElementById('rating').value,
//           message: document.getElementById('message').value,
//         };
//       }

//       fetch(url, {
//         method: 'POST', // Use PUT if needed
//         headers: {
//           'Content-Type': 'application/json',
//           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//         body: JSON.stringify(data)
//       })
//       .then(res => res.json())
//       .then(response => {
//         console.log('Success:', response);
//         alert('Information updated successfully!');
//         closeModal(type, id);
//       })
//       .catch(error => {
//         console.error('Error:', error);
//         alert('Error updating information.');
//       });
//     });
//   }

//   // Setup handlers after DOM is ready
//   document.addEventListener('DOMContentLoaded', function () {
//     @foreach(Auth::user()->vehicle as $vehicle)
//       setupFormHandler('vehicle', {{ $vehicle->id }});
//     @endforeach

//     setupFormHandler('personal', {{ Auth::user()->id }});
//     setupFormHandler('guest', 1); // Adjust ID if needed
//     setupFormHandler('testimonial', 1); // Adjust ID if needed
//   });
//


</script>

@endsection
