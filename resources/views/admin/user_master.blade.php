@extends('admin.main')

@section('main-section')
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
    
    <div class="container" style="margin-top:5rem;" >
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-10 ">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Manage Users</h2>
                    <hr />
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td><a href={{"user_master/delete/"}}{{$customer->customer_id}}><button type="submit" class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="form_delete">Delete</button></a></td>
                                    @php
                                        $id++;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection