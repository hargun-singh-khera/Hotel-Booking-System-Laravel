@extends('layouts.main')

@push('title')
    <title>Heritage | Contact Us</title>
@endpush

@section('main-section')
<section id="contact">
    <div class="container text-center mt-5">
        <div class="row text-center">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img class="img-fluid" src="images/contact.gif" alt="" width="400" />
            </div>
            <div class="col-md-6">
                <h1 class="display-6 fw-bold lh-1 mb-5">We'd <span style="color: #ff6537ff;">love to hear </span>from you!</h1>
                <form class="w-auto m-auto" action="{{url('/')}}/register" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control text-start" id="name" name="name" placeholder="Enter your Name" value="{{old('name')}}" />
                        <span class="text-danger ">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                        <label for="name">Enter your Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control text-start" id="email" name="email" placeholder="email@example.com" value="{{old('email')}}" />
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                        <label for="email">Enter your Email</label>
                    </div>
                    <div class="form-floating mb-3 ">
                        <input type="tel" class="form-control text-start" id="pnumber" name="phone_number" placeholder="Enter your Phone Number" value="{{old('phone_number')}}" />
                        <span class="text-danger">
                            @error('phone_number')
                                {{$message}}
                            @enderror
                        </span>
                        <label for="pnumber">Enter your Phone Number</label>
                    </div>
                    <div class="form-floating">
                    <textarea class="form-control text-start" placeholder="Elaborate your Concern here" name="concern" id="floatingTextarea2" style="height: 100px;" >{{old('concern')}}</textarea>
                    <span class="text-danger">
                        @error('concern')
                            {{$message}}
                        @enderror
                    </span>
                    <label for="concern">Elaborate your Concern</label>
                    </div>
                    <div class="row-md-3 mt-5">
                        <button class="btn btn-primary w-100" id="submit" name="submit" style="background-color:#ff6537ff; border:none;">Submit</button>
                    </div>  
                </form>
            </div>
            
        </div>
</section>
@endsection