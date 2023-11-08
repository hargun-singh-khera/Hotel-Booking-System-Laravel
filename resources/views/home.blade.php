@extends('layouts.main')

@push('title')
    <title>Heritage</title>
@endpush

@section('main-section')
    @include('layouts.carousel')
    @include('layouts.filter')
    @include('layouts.hotels')
    <hr />
    @include('layouts.facilities')
    <hr />
    @include('layouts.faqs')
    <hr />
    @include('layouts.about')
    {{-- <hr />
    @include('layouts.contact') --}}
@endsection