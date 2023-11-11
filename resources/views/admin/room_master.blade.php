@extends('admin.main')

@section('main-section')
@if ($showAlert)
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{$showAlert}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container" style="margin-top:5rem;">
    <div class="row d-flex align-items-center justify-content-center mb-5">
        <div class="col-md-8 ">
            <div class="card shadow p-5 border-0 rounded me-5">
                <h2 >Manage Rooms</h2>
                <form action="{{$url}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Room Type</label>
                        
                        @if ($isUpdate)
                            <input type="text" class="form-control" id="room_type" name="room_type" value="{{$room->room_type}}" >
                        @else    
                            <input type="text" class="form-control" id="room_type" name="room_type" value="" >
                        @endif
                        <span class="text-danger">
                            @error('room_type')
                                {{$message}}
                            @enderror
                        </span>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100" name="button" style="background-color: #ff6537ff; border:none;">{{$title}}</button>
                        </div>
                    </div>
                </form>
                @php
                    $i = 1;
                @endphp
                @if (count($rooms) > 0) 
                    <hr />
                    <h4>Recently Added Rooms</h4>
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Rooms</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody> 
                        @foreach ($rooms as $room)
                        {{-- <h1>{{$room->room_type}}</h1> --}}
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$room->room_type}}</td>
                                <form action="{{ route('admin.room_edit', ['id' => $room->room_id]) }}">
                                    <td>
                                        <button class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="update" id="update">Update</button>
                                    </td>
                                    </form>
                                    <form action="{{route('admin.room_delete', ['id' => $room->room_id])}}">
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
@endsection