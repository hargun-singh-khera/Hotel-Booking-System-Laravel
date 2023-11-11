@extends('admin.main')

@section('main-section')
    <div class="container" style="margin-top:5rem;" >
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-10 ">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Manage Hotels</h2>
                    <form action="{{url('/')}}/admin/hotel_master" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                            <input type="text" class="form-control" id="hotelname" name="hotelname" required/>
                            <div class="mb-3 mt-3">
                                <label for="formFile" class="form-label">Upload Hotel Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <label for="exampleInputPassword1" class="form-label">Hotel Location</label>
                            <select class="form-select" aria-label="Default select example" id="location" name="location">
                                <option selected>Choose from Locations</option>
                                @foreach ($locations as $location)
                                    <option value="{{$location->location_id}}">{{$location->location}}</option>
                                @endforeach
                            </select>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-100" name="form4_update" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection