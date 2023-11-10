@php
    use App\Models\HotelMaster;
@endphp
<form action="{{url('/')}}" method="POST">
    @csrf
    <div class="d-flex align-items-center justify-content-center" style="margin-top:-60px;">
        <div class="card shadow-lg p-3 mb-5 rounded border-0 mb-3 w-80 " >
            <div class="row g-0">
                <div class="col">
                    <div class="d-flex card-body">
                        <span class="leading-none inline-flex items-center justify-center h-full w-full transform mt-4 me-2" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pointer-events-none max-h-full max-w-full"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"><path d="M10 3a7 7 0 107 7 7 7 0 00-7-7zM21 21l-6-6" vector-effect="non-scaling-stroke"></path></g></svg></span>
                        <div class="ms-2">
                            <label for="location">Location</label>  
                            {{-- {{print_r($locations->toArray())}} --}}
                            <select class="form-select" aria-label="Default select example" name="locations" id="locations" required>
                                <option selected>Where to?</option>
                                @foreach ($locations as $location)
                                    <option value="{{$location->location_id}}">{{$location->location}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="d-flex ms-3 me-3 h-auto">
                            <div class="vr"></div>
                        </div>
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
                        <button type="submit" class="btn btn-primary mt-3" name="search" id="search" style="background-color: #ff6537ff; border:none; max-height:50px;width:100px;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>