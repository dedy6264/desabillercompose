
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{url('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-3 " style="border-top-left-radius: 75px"></div>
    <div class="col-md-6 border-color:aqua" style="">
      <table>
        <thead>
          <tr><td>Ame Mart</td></tr>
          <tr><td>Jl. Kalimosodo No. 3 Rt/Rw.9/8 Kel. Kali Kec. Kasi Kab. Jawa Tengah</td></tr>
          <tr><td>Tlp : 089678971119</td></tr>
          <tr><td>Sabtu, 15/10/2021</td></tr>
          <tr><td>AMEG565465646</td></tr>

        </thead>
      </table>
      <hr>
      <table class="table table-bordered" id="dataCart" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>qty</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
          @php
            // dd($b);
          @endphp 
          @foreach ($b as $data)
            {{$data}}
          @endforeach
          <tr>
            <td></td>
            <td>3.200</td>
            <td>10</td>
            <td>32.000</td>
          </tr>
         
          <tr>
            <td>Teh Botol</td>
            <td>3.200</td>
            <td>10</td>
            <td>32.000</td>
          </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th colspan="">64.000</th>
                {{-- <th>{{$subTotal}}</th> --}}
            </tr>
        </tfoot>
      </table>
    </div>
    <div class="col-md-3 " style="border-top-right-radius: 75px"></div>
  </div>
</div>

        {{-- <div class="modal-content">
          <div class="modal-body">                              
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
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                  <tfoot>
                      <tr>
                          <th colspan="5">Total</th> --}}
                          {{-- <th>{{$subTotal}}</th> --}}
                      {{-- </tr>
                  </tfoot>
              </table>
          </div>
        </div> --}}


      <script type="text/javascript">
          $(document).ready(function(){
          $('.modal').printPage();
          });
      </script>
</body>
</html>
   

    