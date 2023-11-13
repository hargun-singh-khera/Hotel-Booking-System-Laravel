@extends('admin.main')

@section('main-section')
@if ($showAlert)
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{$showAlert}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
    <div class="container"  style="margin-top: 5rem;">
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Room Allotment to Hotels</h2>
                    {{-- {{print_r($roomToHotels)}} --}}
                    {{-- <form id="myForm" action="{{url('/')}}/admin/room_allot" method="POST" enctype="multipart/form-data">
                        @csrf --}}
                        {{-- {{$url}} --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                            <form id="myForm" action="{{ url('/admin/room_allot/show') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @php
                                    $isPresent = false;
                                @endphp
                                @if ($isUpdate)
                                    <input class="form-control" type="text" value="{{$updateRoomToHotels[0]->name}}" name="hotelname" aria-label="Disabled input example" readonly>
                                    {{-- <input type="hidden" id="updatedHotelId" name="updatedHotelId" value="{{$updateRoomToHotels[0]->hotel_id}}"> --}}
                                @else
                                    <select class="form-select mb-2" id="hotelname" name="hotelname" aria-label="Default select example">
                                        @foreach ($hotels as $hotel)
                                            @if ($hotel->hotel_id == $selectedHotelId)
                                                @php
                                                    $isPresent = true
                                                @endphp
                                                @break   
                                            @endif
                                        @endforeach
                                        @if ($isPresent)
                                            <option value="{{$hotel->hotel_id}}" selected>{{$hotel->name}}</option>
                                        @else
                                            <option selected>Choose from Hotel Names</option>
                                        @endif
                                        
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->hotel_id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                        <input type="hidden" id="selectedHotelId" name="selectedHotelId" value="">
                                    @endif
                            </form>
                            <script>
                                var dropdown = document.getElementById("hotelname");
                                var selectedHotelIdInput = document.getElementById("selectedHotelId");
                                var myForm = document.getElementById("myForm");
                                var initialSelectedValue = dropdown.value;
                                dropdown.addEventListener("change", function(event) {
                                    selectedHotelIdInput.value = dropdown.value;
                                    initialSelectedValue = dropdown.value;
                                    event.preventDefault(); 
                                    myForm.submit();
                                });
                                selectedHotelIdInput.value = initialSelectedValue;
                            </script>
                        <hr />
                        <form id="myForm2" action="{{$url}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="hotelId" name="hotelId" value="">
                            <label for="exampleInputPassword1" class="form-label">Room Type</label>
                            <select class="form-select mb-2" id="roomtype" name="roomtype" aria-label="Default select example">
                                @if ($isUpdate)
                                    <option value="{{$updateRoomToHotels[0]->room_id}}" selected>{{$updateRoomToHotels[0]->room_type}}</option>
                                @else
                                    <option selected>Choose from Room Types</option>
                                @endif
                                @foreach ($rooms as $room)
                                    <option value="{{$room->room_id}}">{{$room->room_type}}</option>
                                @endforeach
                            </select>
                            <div class="mb-3 mt-3">
                                <label for="formFile" class="form-label">Upload Room Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <label for="exampleInputPassword1" class="form-label mt-1">No of Rooms Available</label>
                            @if ($isUpdate)
                                <input type="number" value="{{$updateRoomToHotels[0]->no_of_rooms}}" class="form-control mb-2" id="noofrooms" name="noofrooms" min="0" aria-describedby="emailHelp">
                            @else
                                <input type="number"  class="form-control mb-2" id="noofrooms" name="noofrooms" value="1" min="0" aria-describedby="emailHelp">
                            @endif
                            <label for="exampleInputPassword1" class="form-label mt-1">No of Guests</label>
                            @if ($isUpdate)
                                <input type="number" value="{{$updateRoomToHotels[0]->no_of_guests}}" class="form-control" id="noofguests" name="noofguests" min="0" aria-describedby="emailHelp">
                            @else
                                <input type="number" class="form-control" id="noofguests" name="noofguests" value="1" min="0" aria-describedby="emailHelp">
                            @endif
                            <label for="exampleInputPassword1" class="form-label mt-2">Rate per Night</label>
                            @if ($isUpdate)
                                <input type="text" value="{{$updateRoomToHotels[0]->rate_per_night}}" class="form-control" id="ratepernight" name="ratepernight" min="0" aria-describedby="emailHelp">
                            @else
                                <input type="text"  class="form-control" id="ratepernight" name="ratepernight" min="0" aria-describedby="emailHelp">
                            @endif
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">{{$title}}</button>
                            </div>
                        </form>
                        <script>
                            var hotelId = document.getElementById("hotelId");
                            var selectedHotelIdInput = document.getElementById("selectedHotelId");
                            hotelId.value = selectedHotelIdInput.value;
                        </script>
                    </div>
                    {{-- </form> --}}
                    @if (count($roomToHotels) > 0)
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
                                        <form action="{{ route('admin.room_allot_edit', ['hotelId' => $roomToHotel->hotel_id, 'roomId' => $roomToHotel->room_id]) }}">
                                            <td>
                                                <input type="hidden" name="hotelId" value="{{ $roomToHotel->hotel_id }}">
                                                <input type="hidden" name="roomId" value="{{ $roomToHotel->room_id }}">
                                                <button class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="update" id="update">Update</button>
                                            </td>
                                        </form>
                                        <form action="{{route('admin.room_allot_delete', ['hotelId' => $roomToHotel->hotel_id, 'roomId' => $roomToHotel->room_id])}}">
                                            <td>
                                                <button class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="delete" id="delete">Delete</button>
                                            </td>
                                        </form>
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