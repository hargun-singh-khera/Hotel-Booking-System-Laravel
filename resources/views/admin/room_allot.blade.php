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
                            <form id="myForm2" action="{{url('/')}}/admin/room_allot/show" method="POST">
                                @csrf
                                <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                                <select class="form-select mb-2" id="hotelname" name="hotelname" aria-label="Default select example">
                                    <option selected>Choose from Hotel Names</option>
                                    @foreach ($hotels as $hotel)
                                        <option value="{{$hotel->hotel_id}}">{{$hotel->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                            
                            {{-- <script>
                                var dropdown = document.getElementById("hotelname");
                                var myForm = document.getElementById("myForm");
                                dropdown.addEventListener("change", function() {
                                    alert("Hello!");
                                    myForm.submit();
                                    alert("Submitted!");
                                });
                            </script> --}}
                            
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection