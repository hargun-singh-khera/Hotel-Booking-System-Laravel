@extends('admin.main')

@section('main-section')
    <div class="container" style="margin-top:5rem;" >
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-10 ">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Manage Hotels</h2>
                    <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- {{print_r($hotel->toArray())}} --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                            @if ($isUpdate)
                                <input type="text" class="form-control" id="hotelname" name="hotelname" value="{{$hotel[0]->name}}" required/>
                            @else
                                <input type="text" class="form-control" id="hotelname" name="hotelname" required/>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="formFile" class="form-label">Upload Hotel Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <label for="exampleInputPassword1" class="form-label">Hotel Location</label>
                            <select class="form-select" aria-label="Default select example" id="location" name="location">
                                @if ($isUpdate)
                                    <option value="{{$hotel[0]->location_id}}" >{{$hotel[0]->location}}</option>
                                @else
                                    <option selected>Choose from Locations</option>  
                                @endif
                                @foreach ($locations as $location)
                                    <option value="{{$location->location_id}}">{{$location->location}}</option>
                                @endforeach
                            </select>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-100" name="form4_update" style="background-color: #ff6537ff; border:none;">{{$title}}</button>
                            </div>
                        </div>
                    </form>
                    @php
                    $i = 1;
                @endphp
                @if (count($hotels) > 0) 
                    <hr />
                    <h4>Recently Added Rooms</h4>
                    {{-- <form action="{{$url}}" method="POST"> --}}
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody> 
                        @foreach ($hotels as $hotel)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$hotel->name}}</td>
                                <td>{{$hotel->location}}</td>
                                <form action="{{ route('admin.hotel_edit', ['id' => $hotel->hotel_id]) }}">
                                    <td>
                                        <button class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="update" id="update">Update</button>
                                    </td>
                                    </form>
                                    <form action="{{route('admin.hotel_delete', ['id' => $hotel->hotel_id])}}">
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
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection