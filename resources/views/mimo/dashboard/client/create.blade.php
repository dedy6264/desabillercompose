@extends('dashboard.app')
@section('activeMenu')
@php
    $activeMenu="client";
@endphp
@endsection
@section('pageheading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Client</h1>
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
            <form action="{{route('client.store')}}" method="post"  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                @csrf
                <div class="row">
                    <div class="input-group col-md-6 mb-4">
                        <label for="client_name">Client Name</label>
                        <input type="text" name="client_name" class="form-control bg-light border-0 small" placeholder="Client Name">
                    </div>
                    <div class="input-group col-md-6 mb-4 align-right">
                            <button class="btn btn-primary" type="submit" value="submit">
                                <i class="fas fa-plus fa-sm"></i> Save
                            </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection