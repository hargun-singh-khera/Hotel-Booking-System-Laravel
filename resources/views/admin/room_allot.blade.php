@extends('admin.main')

@section('main-section')
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
    <div class="container"  style="margin-top: 5rem;">
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Room Allotment to Hotels</h2>
                    
                    <form id="myForm" action="{{url('/')}}/admin/room_allot" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                            <form id="myForm2" action="{{url('/')}}/admin/room_allot/show/{id}" method="POST">
                                @csrf
                                <select class="form-select mb-2" id="hotelname" name="hotelname" aria-label="Default select example">
                                    <option selected>Choose from Hotel Names</option>
                                    @foreach ($hotels as $hotel)

                                        <option value="{{$hotel->hotel_id}}">{{$hotel->name}}</option>
                                        @endforeach
                                </select>
                            </form>
                            
                            <script>
                                // var dropdown = document.getElementById("hotelname");
                                var myForm = document.getElementById("myForm2");
                                dropdown.addEventListener("change", function() {
                                    alert("Hello!");
                                    myForm.submit();
                                    alert("Submitted!");
                                });
                            </script>
                            
                        <hr />
                        
                        <label for="exampleInputPassword1" class="form-label">Room Type</label>
                        <select class="form-select mb-2" id="roomtype" name="roomtype" aria-label="Default select example">
                            <option selected>Choose from Room Types</option>
                            @foreach ($rooms as $room)
                                <option value="{{$room->room_id}}">{{$room->room_type}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3 mt-3">
                            <label for="formFile" class="form-label">Upload Room Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <label for="exampleInputPassword1" class="form-label mt-1">No of Rooms Available</label>
                        <input type="number" class="form-control mb-2" id="noofrooms" name="noofrooms" value="1" min="0" aria-describedby="emailHelp">
                        <label for="exampleInputPassword1" class="form-label mt-1">No of Guests</label>
                        <input type="number" class="form-control" id="noofguests" name="noofguests" value="1" min="0" aria-describedby="emailHelp">
                        <label for="exampleInputPassword1" class="form-label mt-2">Rate per Night</label>
                        <input type="text" class="form-control" id="ratepernight" name="ratepernight" min="0" aria-describedby="emailHelp">
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                        </div>
                    </div>
                    </form>
                    @if (count($hotels) > 0)
                        <hr />
                        {{-- {{print_r($hotels->toArray())}} --}}
                        <h4>Rooms Alloted to Hotels</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">No of Rooms </th>
                                    <th scope="col">No of Guests</th>
                                    <th scope="col">Rate per Night</th>
                                    <th scope="col">Action</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($roomToHotels as $roomToHotel)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$roomToHotel->room_type}}</td>
                                        <td>{{$roomToHotel->no_of_rooms}}</td>
                                        <td>{{$roomToHotel->no_of_guests}}</td>
                                        <td>{{$roomToHotel->rate_per_night}}</td>
                                        <form action="{{ route('admin.room_allot_edit', ['id' => $roomToHotel->hotel_id]) }}">
                                            <td>
                                                <button class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="update" id="update">Update</button>
                                            </td>
                                            </form>
                                            <form action="{{route('admin.room_allot_delete', ['id' => $roomToHotel->hotel_id])}}">
                                            <td>
                                                <button class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="delete" id="delete">Delete</button>
                                            </td>
                                    </tr>   
                                    @php
                                        $i++;
                                    @endphp 
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection