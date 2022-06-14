@extends('dashboard.app')
@section('activeMenu')
@php
    $activeMenu="user";
@endphp
@endsection
@section('pageheading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
@endsection
@section('content')
    <!-- DataTales Example -->
    <div class="coontainer">
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (Session::get('fail'))
                {{Session::get('fail')}}
            @endif
            <form action="{{route('user.store')}}" method="post"  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                @csrf
                <div class="row">
                    <div class="input-group col-md-6 mb-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control bg-light border-0 small" placeholder="Name">
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control bg-light border-0 small" placeholder="Username">
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control bg-light border-0 small" placeholder="Email">
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control bg-light border-0 small" placeholder="Password">
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" class="form-control bg-light border-0 small" placeholder="Password">
                    </div>
                    <div class="input-group col-md-6 mb-4 align-right">
                        {{-- <div class="input-group-append"> --}}
                            <button class="btn btn-primary" type="submit" value="submit">
                                <i class="fas fa-plus fa-sm"></i> Save
                            </button>
                        {{-- </div> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection