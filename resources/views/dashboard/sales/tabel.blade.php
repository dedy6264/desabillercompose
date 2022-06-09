@extends('dashboard.app')

@section('customLink')
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
    <h1 class="h3 mb-0 text-gray-800">Sales</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
@endsection

@section('script')

<script>
    var datatable=$('#dataTable').DataTable( {
        ajax:{
            url:'{!!url()->current()!!}',
        },
        columnDefs: [{
                            targets: [3],
                            render: $.fn.dataTable.render.number( '.', ',', 2)
                        }],
        columns:[
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            {data:'product_name', name:'product_name'},
            {data:'product_code', name:'product_code'},
            {data:'product_price', name:'product_price'},
            {data:'action', name:'action', orderable:false, searchable:false},
        ],
    } );
</script>
@endsection

@section('content')
<div class="row">
    <!-- DataTales Example -->
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary ">DataTables Example</h6> --}}
                <a href="{{route('product.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Add Product</a>
            </div>
            @if (Session::get('fail'))
            {{Session::get('fail')}}
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="d-sm-flex card-header py-3 justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary ">Cart</h6>
                <a href="{{route('sales.reset')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm entek"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Reset</a>
            </div>
            <div class="card-body product-cart">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataCart" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Product Price</th>
                                <th>qty</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1;
                            $subTotal=0;
                            @endphp
                            {{-- {{$cart[0]['product_name']}} --}}
                            @for ($i=0;$i<count($cart);$i++)
                            @php
                                $subTotal=$subTotal+($cart[$i]['qty']*$cart[$i]['product_price']);
                            @endphp    
                            @endfor
                            @foreach ($cart as $d)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$d->product_name}}</td>
                                <td>{{$d->product_code}}</td>
                                <td>{{$d->product_price}}</td>
                                <td>{{$d->qty}}</td>
                                <td>{{$d->qty*$d->product_price}}</td>
                            </tr>
                            @endforeach

                            {{-- <tr>
                            <td>1</td>
                            <td>Pensil</td>
                            <td>PN001</td>
                            <td>61</td>
                            <td>3000 --}}
                                
{{-- <div class="row product-cart">
    <div class="col-md-4">
        <div class="input-group mb-3" style="width: 130px">
            <button class="input-group-text decrement-btn">-</button>
            <input type="text" name="" id="" class="form-control text-center input-qty bg-white" value="1" disabled>
            <button class="input-group-text increment-btn">+</button>
        </div>
    </div>
</div> --}}

                            {{-- </td>
                        </tr>
                         --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th>{{$subTotal}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div>
                        {{-- link modal --}}
                        @if (count($cart)=='')
                        <a href="#" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm modalEmpty"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Bayar</a>
                        @else  
                        @php
                            $idCart=$cart[0]['user_id'];
                        @endphp   
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Bayar</a>
                        @endif
                             <!-- Modal invoice -->
                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable " role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h3 class="modal-title" id="exampleModalLongTitle">Invoice</h3>
                                      {{-- <div class="row">
                                          <div class="col-md-6">
                                            <h5>PT. ABC</h5>
                                            <p>Jl. Kedungmundu Raya</p>
                                          </div>
                                      </div> --}}
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">                              
                                       {{-- body --}}
                                    <table class="table table-bordered" id="dataCart" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Product Price</th>
                                                <th>qty</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1;
                                            @endphp
                                            @foreach ($cart as $d)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$d->product_name}}</td>
                                                <td>{{$d->product_code}}</td>
                                                <td>{{$d->product_price}}</td>
                                                <td>{{$d->qty}}</td>
                                                <td>{{$d->qty*$d->product_price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th>{{$subTotal}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                        {{-- end body --}}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalPayment">Pembayaran</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- modal payment --}}
                              <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        @foreach ($payment as $pay)
                                          <div class="col-md-12 mb-4">
                                            <form action="{{route('sales.store')}}" method="post">
                                                @csrf
                                                <input type="text" name="payment_id" value="{{$pay->id}}" hidden>
                                                <button class="btn btn-success  btn-lg btn-block" type="submit" value="submit">{{$pay->payment_method_name}}</button>
                                            </form>
                                          </div>
                                          @endforeach
                                        </div>
                                    </div>
                                    {{-- <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary" >Save</button>
                                    </div> --}}
                                  </div>
                                </div>
                              </div>
                              {{-- endmodal payment --}}
                             {{-- <div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('customScript')
<script>
$('#myModal').on('shown.bs.modal', function () {
    
  $('#myInput').trigger('focus')
})
$('.modalEmpty').click(function(event){
    event.preventDefault();
    var note="keranjang masih kosong";
    alert(note);
});


    $('.increment-btn').click(function(event) {
      event.preventDefault();
      var qty=$(this).closest('.product-cart').find('.input-qty').val();
    //   alert(qty);
    var value=parseInt(qty,10)
    value=isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        $(this).closest('.product-cart').find('.input-qty').val(value);
    }
    });

    $('.decrement-btn').click(function(event) {
      event.preventDefault();
      var qty=$(this).closest('.product-cart').find('.input-qty').val();
    //   alert(qty);
    var value=parseInt(qty,10)
    value=isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).closest('.product-cart').find('.input-qty').val(value);
    }
    });


    $('.addCart').click(function(event) {
      event.preventDefault();
    //   var qty=$(this).closest('.product-cart').find('.addCart').val();

      var idProd=$(this).val();
      alert(idProd);
    });
</script>
@endsection