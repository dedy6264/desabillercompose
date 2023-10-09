@extends('layouts.design')

@section('content')
<div class="bg-light" style="border-radius:10px;margin-top:50px;">
    @foreach ($data as $item)        
    <div class="row" style="margin:50px;">
        <div class="col-md-12" style="margin-top:20px;">
            {{-- <h4 align=""><b> {{$item->tittle}}</b></h4>
            <!-- <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkan gratis 3 jam lagi, berlaku kelipatan</p> -->
            <hr>
            <hr> --}}
            <div class="bs-component">
                <div class="jumbotron">
                    <h3 class="display-3">{{$item->tittle}}</h3>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                        to featured content or information.</p>
                        <hr class="my-4">
                        {{-- <p> --}}
                            {!!html_entity_decode($item->isi)!!}
                        {{-- </p> --}}
                </div>
            </div>
        </div>
    </div>
    
    {{-- <div class="row" style="margin:50px;max-widht:200px;">
        <div class="col-md-12 "  style="margin-top:20px;border:0px;">
            <div style="spacing:2;">
                {!!html_entity_decode($item->isi)!!}
            </div>
        </div>
    </div> --}}
    @endforeach
</div>
@endsection
