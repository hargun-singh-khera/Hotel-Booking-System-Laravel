@extends('admin.main')

@section('main-section')
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
    <div class="container"  style="margin-top: 5rem;">
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Room Allotment to Hotels</h2>
                    
                    <form id="myForm" action="room_allot.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                        
                        <form id="myForm" action="room_allot.php" method="POST">
                            <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                            
                        </form>
                            <script>
                                var dropdown = document.getElementById("hotelname");
                                var myForm = document.getElementById("myForm");
                                dropdown.addEventListener("change", function() {
                                    // alert("Hello!");
                                    myForm.submit();
                                    // alert("Submitted!");
                                });
                            </script>
                        <hr />
                        
                        <label for="exampleInputPassword1" class="form-label">Room Type</label>
                        <select class="form-select mb-2" id="roomtype" name="roomtype" aria-label="Default select example">
                            
                        </select>
                        <div class="mb-3 mt-3">
                            <label for="formFile" class="form-label">Upload Room Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <label for="exampleInputPassword1" class="form-label mt-1">No of Rooms Available</label>
                        
                        <label for="exampleInputPassword1" class="form-label mt-1">No of Guests</label>
                        
                        <label for="exampleInputPassword1" class="form-label mt-2">Rate per Night</label>
                        
                        
                        <div class="text-center mt-4">
                        
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection