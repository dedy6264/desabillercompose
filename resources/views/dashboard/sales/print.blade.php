
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
            $totalPerItem=0;
          @endphp 
          @foreach ($data as $dt)
          @php
           $totalPerItem= $totalPerItem+($dt->qty*$dt->product_price);
          @endphp
          <tr>
            <td>{{$dt->product_name}}</td>
            <td>{{$dt->product_price}}</td>
            <td>{{$dt->qty}}</td>
            <td>{{$dt->qty*$dt->product_price}}</td>
          </tr>
          @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>{{$totalPerItem}}</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <div class="col-md-3 " style="border-top-right-radius: 75px"></div>
  </div>
</div>
</body>
</html>
   

    