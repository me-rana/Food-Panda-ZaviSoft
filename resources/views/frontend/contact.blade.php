@extends('frontend.theme.layout')
@section('main')
      <!-- Page Header Start -->
      <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">{{Route::currentRouteName()}}</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">{{Route::currentRouteName()}}</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @if ($errors->any())
    <script>
      window.location.hash = '#contact';
    </script>
  @endif

    <!-- Contact Start -->
    <div class="container-fluid pt-5">

@if (session('message'))
<div class="container">
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <div class="row">
        <div class="col-11"><strong>Success!</strong> {{session('message')}}</div>
        <div class="col-1"><button type="button" class="btn-close btn-danger" data-bs-dismiss="alert" aria-label="Close">X</button></div>
    </div>
  </div>
</div>
  @endif

        <div class="text-center mb-4" id="contact">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                <form action="{{route('Contact Submitted')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{old('name')}}" placeholder="Rana Bepari">
                        <small><span class="text-danger"> @error('name') {{$message}} @enderror </span></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" value="{{old('email')}}" id="exampleFormControlInput1" placeholder="contact@ranasvc.com">
                        <small><span class="text-danger"> @error('email') {{$message}} @enderror </span></small>
                    </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Subject</label>
                        <input name="subject" type="text" class="form-control" value="{{old('subject')}}" id="exampleFormControlInput1" placeholder="Ask something">
                        <small><span class="text-danger"> @error('subject') {{$message}} @enderror </span></small>
                    </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Meesage</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('message')}}</textarea>
                        <small><span class="text-danger"> @error('message') {{$message}} @enderror </span></small>
                    </div>
                    <button class="btn btn-primary">Send a Message</button>
                </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">

                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Mirpur, Dhaka-1216, Bangladesh</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>contact@rana.com.bd</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+01521380065 (Whatsapp)</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->


@endsection
