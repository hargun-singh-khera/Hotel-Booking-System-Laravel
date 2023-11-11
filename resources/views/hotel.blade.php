@extends('layouts.main')
@push('title')
    <title>Heritage | Hotels</title>
@endpush

@section('main-section')
    <hr />
    <div class="container"> 
        <div class="d-flex">
            @foreach ($hotels as $hotel)
                <div class="col-md-6">
                    <img src="/images/{{$hotel->image}}" alt="image" width="650px" style="border-radius: 15px;"/>
                    </div>
                    <div class="col-md-5 mx-auto ">
                        <div class="card align-items-center shadow" style="border-radius: 12px">
                            <div class="card-body">
                                <h3 style="font-size: 35px;">{{$hotel->name}}</h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-md-3 " >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                            &nbsp;{{$hotel->location}}
                                    </div>
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
                                    <div class="col-md-3 ">
                                        <h5 class="m-auto" style="color:#ff6537ff;"><b>₹ {{$hotel->rate_per_night}}</b></h5>
                                    </div>
                                </div>
                                <p class="description mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde laudantium reiciendis facilis libero, praesentium, voluptatibus nostrum autem temporibus itaque obcaecati earum iure quidem quod totam assumenda quaerat provident. Sapiente sed dolor debitis nobis officia in maxime nemo, beatae et corrupti, cumque veritatis ut deserunt, blanditiis perspiciatis vitae. Fugit eius, deserunt ratione ipsam facilis molestiae maiores illo tempora qui! Aut obcaecati cupiditate ab nesciunt doloremque sit debitis sunt ratione, error velit vitae, perspiciatis veritatis repellat. Sit quos doloribus blanditiis possimus excepturi quod quam culpa iste at nostrum sed asperiores minus minima dicta expedita recusandae, saepe laborum quibusdam fugiat aliquid temporibus facere?</p>
                                <a href="#select_room" style="color: white;text-decoration:none;"><button class="btn btn-primary w-100 mt-2" style="background-color: #ff6537ff; border:none">Select Room</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr/>
    <div class="container">
        <h4>Rooms Available</h4>
        <div id="select_room" class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mt-4">
                    <div class="card mb-5 shadow border-0" style="width: 25rem; border-radius:12px;">
                    <img src="/images/RoomImages/{{$room->room_image}}" class="card-img-top" alt="..." height="230px" style="border-top-left-radius:12px; border-top-right-radius:12px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title" style="margin-top: -5px">{{$room->room_type}}</h5>

                            </div>
                            <div class="col text-end">
                                <h5 class="m-auto" style="color:#ff6537ff;"><b>₹ {{$room-> rate_per_night}}</b></h5>
                                <small class="text-body-secondary m-auto"><strong>1 room</strong> per night</small>
                            
                            </div>
                        
                        </div>
                        {{-- <form action="" method="POST"> --}}
                            <input type="hidden" name="roomid" id="roomid" value="" />
                            <a href="{{url('/')}}/hotel/{{$room->hotel_id}}/room/{{$room->room_id}}/booking"><button class="btn btn-primary mb-3 mt-3 w-100" name="bookroom" id="booknow" style="background-color: #ff6537ff;border:none;">Book Now</button></a>
                        {{-- </form> --}}
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
  </div>
@endsection