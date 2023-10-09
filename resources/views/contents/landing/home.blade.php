@extends('layouts.design')
@section('jumbotron')
@include('layouts.jumbotron')
@include('layouts.middleBar')
@include('layouts.iklan2')
@endsection
@section('content')
<div class="bg-light bs-docs-section" style="border-radius:10px;margin-top:50px;">
    <div class="row" style="margin:50px;">
        <div class="col-md-12" style="margin-top:20px;">
            <h4 align="center"><b> Promo Bulan November Area Semarang</b></h4>
            <!-- <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkan gratis 3 jam lagi, berlaku kelipatan</p> -->
            <hr>
            <hr>
        </div>
    </div>
    <div class="row" style="margin:50px;">
        @foreach ($data as $item)
        <div class="col-md-4" style="margin-bottom:50px">
            <div class="bs-component">
                <div class="card">
                    <div class="card-body">
                        <img style="height: 200px; width: 100%; display: block;" src="https://drive.google.com/uc?export=view&id=1B2nBDRe-ghMynISQrqrHKvMBl3j02HoP" alt="Card image">
                        <h4 class="card-title">{{$item->tittle}}</h4>
                        {{-- <h6 class="mb-2 card-subtitle text-muted">Card subtitle</h6> --}}
                        <p class="card-text">
                            {{-- @if (str_word_count($item->isi)>10) --}}
                            {!!html_entity_decode(substr($item->isi,0,100)."...")!!}
                            {{-- @endif --}}
                        </p>
                          <form action="{{route('posting.detail',$item->id)}}" method="post">
                            @method('POST')
                            @csrf
                            <button type="submit" value="submit" class="btn btn-primary stretched-link">Lebih banyak...</button>
                        </form>
                      </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">{{$item->tittle}}</h4>
                <p>
                    {{$item->isi}} --}}
                    {{-- @if (str_word_count($item->isi)>10)
                    {!!html_entity_decode(substr($item->isi,0,100)."...")!!}
                    @endif --}}
                {{-- </p>
                <hr>
                <form action="{{route('posting.detail',$item->id)}}" method="post">
                    @method('POST')
                    @csrf
                    <button type="submit" value="submit" class="btn btn-primary stretched-link">Lebih banyak...</button>
                </form> --}}
                {{-- <a href="{{route('posting.detail:',$item->id)}}" >Lebih banyak...</a> --}}
            {{-- </div>
        </div> --}}
        @endforeach
        {{-- <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">Gratis 3 Jam PS3</h4>
                <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkargdfgdgdfgsdgsdgdfn gratis 3 jam lagi, berlaku kelipatan</p>
                <a href="#" class="btn btn-primary stretched-link">Lebih banyak...</a>
                <hr>
            </div>
        </div>
        <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">Gratis 3 Jam PS3</h4>
                <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkargdfgdgdfgsdgsdgdfn gratis 3 jam lagi, berlaku kelipatan</p>
                <a href="#" class="btn btn-primary stretched-link">Lebih banyak...</a>
                <hr>
            </div>
        </div>
        <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">Gratis 3 Jam PS3</h4>
                <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkargdfgdgdfgsdgsdgdfn gratis 3 jam lagi, berlaku kelipatan</p>
                <a href="#" class="btn btn-primary stretched-link">Lebih banyak...</a>
                <hr>
            </div>
        </div>
        <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">Gratis 3 Jam PS3</h4>
                <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkargdfgdgdfgsdgsdgdfn gratis 3 jam lagi, berlaku kelipatan</p>
                <a href="#" class="btn btn-primary stretched-link">Lebih banyak...</a>
                <hr>
            </div>
        </div>
        <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">Gratis 3 Jam PS3</h4>
                <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkargdfgdgdfgsdgsdgdfn gratis 3 jam lagi, berlaku kelipatan</p>
                <a href="#" class="btn btn-primary stretched-link">Lebih banyak...</a>
                <hr>
            </div>
        </div>
        <div class="col-md-4 card bg-warning"  style="margin-top:20px;border:0px">
            <div class="card-body">
                <h4 class="card-title" align="center">Gratis 3 Jam PS3</h4>
                <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkargdfgdgdfgsdgsdgdfn gratis 3 jam lagi, berlaku kelipatan</p>
                <a href="#" class="btn btn-primary stretched-link">Lebih banyak...</a>
                <hr>
            </div>
        </div> --}}
    </div>
</div>
@endsection
