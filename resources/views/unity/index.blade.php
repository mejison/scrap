{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head d-flex mb-0 mb-lg-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600">Unity Search</h2>
                <p class="mb-0">Current unity list</p>
            </div>
        </div>	
        <router-view></router-view>
    </div>
@endsection			