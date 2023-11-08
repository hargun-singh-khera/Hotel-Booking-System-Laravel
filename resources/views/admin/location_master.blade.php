@extends('admin.main')

@section('main-section')
<div class="container" style="margin-top:5rem;">
    <div class="row d-flex align-items-center justify-content-center mb-5">
        <div class="col-md-8 ">
            <div class="card shadow p-5 border-0 rounded me-5">
                <h2 >Manage Locations</h2>
                <form action="/HotelBookingSystem/admin/location_master.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Location</label>
                        
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection