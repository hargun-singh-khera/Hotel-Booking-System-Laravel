@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')

@push('title')
    <title>Heritage | Hotels Booking Summary</title>
@endpush

@section('main-section')
{{-- {{print_r($hotels->toArray())}} --}}
<hr />

@if (session()->has('checkin') && session()->has('checkout') && session()->has('hotel') && session()->has('room') && $showAlert)
    
    {{-- <h1>Session value {{$showAlert}}</h1> --}}
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your booking has been successfully  confirmed for <strong> {{ date('d-M-Y', strtotime(session('checkin'))) }}</strong> at <strong>{{session('hotel')}}</strong>. You have reserved a <strong>{{session('room')}}</strong> Room for your stay. Thank you for choosing <strong>{{session('hotel')}}</strong> for your accommodation needs.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($showAlert)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Please provide your Check In Date, Check Out & No of Guests Date before proceeding for booking.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- <form action="{{ url('/hotel/' . $hotelId . '/room/' . $roomId . '/booking') }}" method="POST">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card shadow-lg p-3 mb-5 rounded border-0 mb-3 w-80 " >
                <div class="row g-0">
                    <div class="col">
                        <div class="d-flex card-body">
                            <span class="leading-none inline-flex items-center justify-center h-full w-full transform mt-4 me-2" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pointer-events-none max-h-full max-w-full"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"><path d="M10 3a7 7 0 107 7 7 7 0 00-7-7zM21 21l-6-6" vector-effect="non-scaling-stroke"></path></g></svg></span>
                            <div class="">
                                <label for="check_in">Check In</label>  
                                <input type="date" class="form-control" name="checkin" id="checkin" aria-describedby="emailHelp">
                            </div>
                            <div class="d-flex ms-3 me-3 h-auto">
                                <div class="vr"></div>
                            </div>
                            <div class="">
                                <label for="check_out">Check Out</label>  
                                <input type="date" class="form-control" name="checkout" id="checkout" aria-describedby="emailHelp">
                            </div>
                            <div class="d-flex ms-3 me-3 h-auto">
                                <div class="vr"></div>
                            </div>
                            <div class="">
                                <label for="guests">Guests</label>  
                                <input type="number" class="form-control" name="guests" id="guests" aria-describedby="emailHelp" placeholder="No. of Guests">
                            </div>
                            <div class="d-flex ms-3 me-3 h-auto">
                                <div class="vr"></div>
                            </div>
                            <div class="me-5">
                                <label for="location">Rooms</label>  
                                <input type="number" class="form-control" name="rooms" id="rooms" aria-describedby="emailHelp" placeholder="No. of Rooms">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="search" id="search" style="background-color: #ff6537ff; border:none; max-height:50px;width:100px;">Enter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
@endif
<form action="{{ url('/hotel/' . $hotelId . '/room/' . $roomId . '/booking') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            {{-- looping --}}
            @foreach ($hotels as $hotel)
            <div class="col-md-8 mt-3">
                <div class="card shadow-lg border-0" style="border-radius: 12px;">
                    <div class="card-body">
                        <h4 class="ms-2">HOTEL INFO</h4>
                        <hr/>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="/images/{{$hotel->image}}" class="card-img-top" alt="..." style="border-radius: 12px;">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3 " >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                </svg>
                            </div>
                            <h4 class="card-title mt-1" style="margin-bottom:2px;">{{$hotel->name}}</h4>
                            {{session()->put('hotel', $hotel->name)}}
                            <small>{{$hotel->location}}</small>
                            </div>
                        </div>
                    </div>
                    
                    @php
                        $room = $hotel->room_type;
                        if(session()->has('checkin') && session()->has('checkout') && session()->has('rooms') && session()->has('guests')) {
                            echo '<div class="card ms-5 me-5 mt-3 mb-3 shadow-sm border-0" style="background-color: #e8f3ffff; border-radius:15px;">
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <small>Check In</small>
                                                <h5 class="card-title">' . date('d M Y', strtotime(session("checkin"))) . '</h5>
                                                <small style="margin-top: -55rem;">12:00 PM</small>
                                            </div>
                                            <div class="col">
                                                <small>Check Out</small>
                                                <h5 class="card-title">' . date('d M Y', strtotime(session("checkout"))) . '</h5>
                                                <small style="margin-top: -55rem;">11:00 AM</small>
                                            </div>
                                            <div class="col">
                                                <small>Guests</small>
                                                <h5 class="card-title">' . session("guests") . ' Guests | ' . session("rooms") . ' Room</h5>';
                                                $date1 = new DateTime(session("checkin"));
                                                $date2 = new DateTime(session("checkout"));
                                                $diff = date_diff($date1, $date2)->format('%a');
                                                if($diff > 1) {
                                                    echo '<small style="margin-top: -55px;">' . $diff . ' Nights</small>';
                                                } else {
                                                    echo '<small style="margin-top: -55px;">' . $diff . ' Night</small>';
                                                }
                                                
                                            echo '</div>
                                            <div class="col">
                                                <small>Room Selected</small>
                                                <h5 class="card-title">'.$room.'</h5>
                                            </div>
                                        </div>
                                </div>
                            </div>';
                            
                        }
                        @endphp
                    </div>
                </div>
                <div class="col-md-4 mt-3 ">
                    <div class="card shadow-lg border-0" style="border-radius: 12px;">
                        <div class="card-body">
                            <h4 class="card-title">Price Summary</h4>
                        </div>
                        <hr style="margin-top:-12px;"/>
                        <div class="card-body" style="margin-top: -20px;">
                            <div class="row">
                                <div class="col">
                                    Room Charges<br/>
                                    @php
                                // echo "Rooms: " . session('rooms') ."<br/>";
                                if(session()->has('rooms') && session()->has('checkin') && session()->has('checkout')) {
                                    $noofrooms = session('rooms');
                                    $date1 = new DateTime(session('checkin'));
                                    $date2 = new DateTime(session('checkout'));
                                    $interval = $date1->diff($date2); 
    
                                    $nights = $interval->days; 
                                    
                                    if ($noofrooms == 1 && $nights == 1) {
                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">(1 room X 1 night)</small>';
                                    } elseif ($noofrooms > 1) {
                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">(' . $noofrooms . ' rooms X 1 night)</small>';
                                    } elseif ($nights > 1) {
                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">(1 room X ' . $nights . ' nights)</small>';
                                    } else {
                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">(' . $noofrooms . ' rooms X ' . $nights . ' nights)</small>';
                                    }
                                }
                                else {
                                    echo '<small style="color: rgba(0, 0, 0, 0.752);">(1 room X 1 night)</small>';
                                }
                            @endphp
                                </div>
                               
                                <div class="col text-end">
                                    @php
                                        if(session()->has('rooms') && session()->has('checkin') && session()->has('checkout')) {
                                            $price = $hotel->rate_per_night*$noofrooms*$nights;
                                            echo "₹ " . $price. '.00';
                                        }
                                        else {
                                            $price = $hotel->rate_per_night;
                                            echo "₹ " . $price;
                                        }
                                    @endphp
                                </div>
                                </div>
                            <div class="row">
                                <div class="col mt-1">
                                    Taxes &amp; Fees<br/>
                                    <small style="color: rgba(0, 0, 0, 0.752);">(GST @18%)</small>
                                </div>
                                
                                <div class="col text-end">
                                    @php
                                        $tax = 0.18*$price;
                                    @endphp
                                    ₹ {{$tax}}.00
                                </div>
                            </div>
                        </div>
                        <hr class="my-auto"/>
                        <div class="card-body" style="margin-top: -10px; margin-bottom:-10px;">
                            <div class="row">
                                <div class="col">
                                    <h6><strong>Amount Payable</strong></h6>
                                </div>
                                <div class="col text-end">
                                    @php
                                        $total = $price + $tax;
                                    @endphp
                                    <h6><strong>₹ {{$total}}.00</strong></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card shadow-lg border-0" style="border-radius: 12px;">
                    <div class="card-body">
                    <h4 class="ms-2">GUESTS INFO</h4>
                    <hr/>
                    <div class="mb-3 ms-2">
                        <label for="name" class="form-label mt-2">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" />
                        <span class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 ms-2">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
                        <span class="text-danger">
                        @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 ms-2">
                        <label for="number" class="form-label">Your Mobile Number</label>
                        <input type="tel" class="form-control" id="number" name="number" placeholder="Enter your mobile number" />
                        <span class="text-danger">
                            @error('number')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary w-100 mt-3 mb-4" name="paybtn" id="paybtn" style="background-color: #ff6537ff; border:none; height:65px; border-radius:1.2rem;font-size:1.6rem;font-family: Quicksand;font-weight:bold; ">Confirm Your Booking</button>
            </div>
        </div>
    </div>
</form>
@endsection