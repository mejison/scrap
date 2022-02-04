{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="container-fluid">
        <router-view></router-view>
    </div>
@endsection