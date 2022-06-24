@extends('dashboard.app')
@section('activeMenu')
@php
    $activeMenu="transaction";
@endphp
@endsection
@section('customLink')
{{-- <link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568; 			/*text-gray-700*/
        padding-left: 1rem; 		/*pl-4*/
        padding-right: 1rem; 		/*pl-4*/
        padding-top: .5rem; 		/*pl-2*/
        padding-bottom: .5rem; 		/*pl-2*/
        line-height: 1.25; 			/*leading-tight*/
        border-width: 2px; 			/*border-2*/
        border-radius: .25rem; 		
        border-color: #edf2f7; 		/*border-gray-200*/
        background-color: #edf2f7; 	/*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;	/*bg-indigo-100*/
    }
    
    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button		{
        font-weight: 700;				/*font-bold*/
        border-radius: .25rem;			/*rounded*/
        border: 1px solid transparent;	/*border border-transparent*/
    }
    
    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }
    
    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }
    
    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #667eea !important; /*bg-indigo-500*/
    }

</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@endsection

@section('pageheading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
    {{-- <form action="{{route('transaction.export')}}" method="post">
        <input type="datetime" name="startDate" id="startDate" value={{ $main[0]['created_at'] }}hidden>
        <input type="datetime" name="endDate" id="endDate" value={{ $main[count($main)-1]['created_at'] }}hidden>
        <input type="text" name="sales" id="sales" value={{  }}hidden>
        <input type="text" name="status" id="status" value={{  }}hidden>
        <button type="submit" value="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
    </form> --}}
    <a href="{{route('transaction.export')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
@endsection

@section('content')
{{-- fiter --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary ">Filter </h6></div>
        <div class="card-body">
            <form action="{{route('transaction.index')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="startDate">Start Date</label>
                    <input type="date" name="startDate" value="{{date_format($main[0]['created_at'],"Y-m-d")}}" id="startDate" class="form-control">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="endDate">End Date</label>
                    <input type="date" name="endDate" value="{{date_format($main[count($main)-1]['created_at'],"Y-m-d")}}" id="endDate" class="form-control">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="status">Status Payment</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">All</option>
                        <option value="33">Pending</option>
                        <option value="00">Success</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sales">Sales</label>
                    <select name="sales" id="sales" class="form-control">
                        @foreach ($user as $u )
                        <option value="{{$u['id']}}">{{$u['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary" type="submit" value="submit">Filter</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">List Transactions {{date_format($main[0]['created_at'],"Y-m-d")}} - {{date_format($main[count($main)-1]['created_at'],"Y-m-d")}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>No Transaction</th>
                            <th>Payment Status</th>
                            <th>Payment Method</th>
                            <th>Payment Reff</th>
                            <th>Total Price</th>
                            <th>Payment Date</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($main as $data)
                            
                        <tr>
                            <td>{{$no++}}</td>
                            <td><a href="{{ url('transaction/'.$data->id)}}" ><i class="fas fa-eye" title="Lihat detail"></i></a></td>
                            <td>{{$data->trx_no}}</td>
                            <td><span class="{{$data->payment_status='00' ? 'text-success':'text-danger'}}">{{$data->payment_status='00' ? 'success':'pending'}}</span></td>
                            <td>{{$data->payment_method_name}}</td>
                            <td>{{$data->payment_reff}}</td>
                            <td>{{$data->total_price}}</td>
                            <td>{{$data->payment_date}}</td>
                            <td>{{$data->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

