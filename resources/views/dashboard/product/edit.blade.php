@extends('dashboard.app')
@section('pageheading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
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
            <form action="{{route('product.update',$product->id)}}" method="post"  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-group col-md-6 mb-4">
                        <label for="product_name">Product Name</label>
                        <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control bg-light border-0 small" placeholder="Product Name">
                        {{-- <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div> --}}
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="product_code">Product Code</label>
                        <input type="text" value="{{$product->product_code}}" name="product_code" class="form-control bg-light border-0 small" placeholder="Product Code">
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="product_price">Product Price</label>
                        <input type="number" value="{{$product->product_price}}" name="product_price" class="form-control bg-light border-0 small" placeholder="Product Price">
                    </div>
                    <div class="input-group col-md-6 mb-4">
                        <label for="product_cost">Product Cost</label>
                        <input type="number" value="{{$product->product_cost}}" name="product_cost" class="form-control bg-light border-0 small" placeholder="Product Cost">
                    </div>
                    <div class="input-group col-md-12 mb-4">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <label for="product_desc" class="">Product Desc</label>
                        </div>
                        <textarea name="product_desc" value="{{$product->product_desc}}" class="form-control bg-light border-0 small" placeholder="Product Code"></textarea>
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