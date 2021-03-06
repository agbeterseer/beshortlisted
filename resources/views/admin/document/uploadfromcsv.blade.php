@extends('admin.document.layout.document')
@section('content')

<h3>Upload Cv</h3>
@if(count($errors))
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
  <div class="col-md-12">
@if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
    {!! session('message.content') !!}
    </div>
@endif
  
           <div class="m-heading-1 border-green m-bordered">
             <h3>Dropzone</h3>
     <form action="{{url('/document/upload')}}" method="POST" enctype="multipart/form-data" >
        {{ csrf_field() }}
                  
                  <input type="file" name="upload-file" class="form-control"> <br/>
                  <button class="btn btn-primary">Upload</button>
                </form>
                  </div>
                    </div>
@endsection
