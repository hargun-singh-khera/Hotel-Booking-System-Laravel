@extends('admin.main')

@section('main-section')
@if ($showAlert)
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{$showAlert}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
    
    <div class="container" style="margin-top:5rem;" >
        <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-10 ">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Manage Users</h2>
                    @if (count($customers) > 0)
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
                                        <form action="{{ route('admin.delete_user', ['id' => $customer->id]) }}">
                                            <td>
                                                <button class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="delete" id="delete">Delete</button>
                                            </td>
                                        </form>
                                        @php
                                            $id++;
                                        @endphp
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <hr />
                        <h3 class="text-center mt-5">No User Record Found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection