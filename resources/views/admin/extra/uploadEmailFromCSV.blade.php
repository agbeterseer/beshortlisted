@extends('admin.layout.admin') 
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
                     @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                        @endif
                        
           <div class="m-heading-1 border-green m-bordered">
             <h3>UPLOAD FROM CSV</h3>
     <form action="{{route('upload.email')}}" method="POST" enctype="multipart/form-data" >
        {{ csrf_field() }}
                  
                  <input type="file" name="upload-file" class="form-control" required="required"> <br/>
                  <button class="btn btn-primary">Upload</button>
                </form>
<p></p>
<p></p>
                <form action="{{route('send.email_candidates')}}" method="POST">

                  {{ csrf_field() }}
                  
                <button class="btn btn-primary">Send Email to Candidates</button>
                </form>
                  </div>
                    </div>
@endsection