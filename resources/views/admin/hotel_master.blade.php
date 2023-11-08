@extends('admin.main')

@section('main-section')
    <div class="container" style="margin-top:5rem;" >
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-10 ">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Manage Hotels</h2>
                    <form action="/HotelBookingSystem/admin/hotel_master.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                            <input type="text" class="form-control" id="hotelname" name="hotelname" required/>
                            <div class="mb-3 mt-3">
                                <label for="formFile" class="form-label">Upload Hotel Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <label for="exampleInputPassword1" class="form-label">Hotel Location</label>
                            <select class="form-select" aria-label="Default select example" id="location" name="location">
                                
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection