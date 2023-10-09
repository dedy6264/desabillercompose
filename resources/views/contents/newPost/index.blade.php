@extends('layouts.design')
@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
@section('content')
<div class="bg-warning" style="border-radius:10px;margin-top:50px">
    <div class="row" style="margin:50px;">
        <div class="col-md-12" style="margin-top:20px;">
            <h4 align=""><b> New Post</b></h4>
            <!-- <p>Khusus Bulan November setiap rental min 3 jam akan mendapatkan gratis 3 jam lagi, berlaku kelipatan</p> -->
            <hr>
            <!-- <hr> -->
        </div>
    </div>
    <div class="row" style="margin:50px;">
        <div class="col-md-12 "  style="margin-bottom:40px;border:0px">
           <form action="{{route("posting.save")}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No WhatsApp</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_wa">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            {{-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gambar Header</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="header">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div> --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tittle">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <textarea id="summernote" name="isi" ></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" value="submit" class="btn btn-primary"> Simpan </button>
                <!-- <textarea id="demo">
                    <br/>
                    <p style="text-align: center;"><img src="https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.webp" class="img-fluid"></p>
                    <h1 style="text-align: center;">MDBootstrap</h1>
                    <p style="text-align: center;">WYSIWYG Editor</p>
                    <p style="text-align: center;"><a href="https://mdbootstrap.com" target="_blank" contenteditable="false" style="font-size: 1rem; text-align: left;">MDBootstrap.com</a>&nbsp;© 2020</p>
                    <p style="text-align: left;"><b>Features:</b></p>
                    <p style="text-align: left;">
                        <ul>
                            <li>Changing block type</li>
                            <li>Text formatting (bold, italic, strikethrough, underline)</li>
                            <li>Setting text color</li>
                            <li>Text aligning</li>
                            <li>Inserting links</li>
                            <li>Inserting pictures</li>
                            <li>Creating a list (bulled or numbered)</li>
                        </ul>
                        <p><b>Options:</b></p>
                        <ul>
                            <li>Translations</li>
                            <li>Using your own color palette</li>
                            <li>Disabling/enabling tooltips</li>
                        </ul>
                    </p>
                  </textarea> -->
            </div>
           </form>
        </div>
    </div>
</div>
@endsection
@push('posting')
<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
@endpush