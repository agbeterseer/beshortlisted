<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Cv Database</title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    </head>
    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
            <ul class="nav navbar-nav">
            <li><a href=""> <img src="/logo/rhizome.jpg" alt="Logo"  width="90px" height="30px"  class="logo-default" />  </a></li>
            <li><a href=""> sdfsf</a></li>
        </ul>
        </nav>
        <br><br><br><br>
       <div class="container">

            <!--  <div class="col-md-8">
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter some name" required>
                    <p class="error text-center alert alert-danger hidden"></p>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" type="submit" id="add">
                        <span class="glyphicon glyphicon-plus"></span> ADD
                    </button>
                
                </div> -->
                 

                        @if(Session()->has('success'))
                <div class="alert alert-success"> 
                {!! Session::get('success') !!}
                </div>
                        @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="form-group row add"> 
                <div class="flex-center position-ref full-height"> 
                <div class="content">
                <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <div class="portlet light bordered">
         
                <div class="portlet-body">

            <table align="center" class="navbar navbar-default" width="70%" >
              
                            <tr>
        <td align="center">
          <h3> <strong>  Congratulations !!!</strong> </h3>
        </td>
    </tr>
    <tr>
        <td align="center">
                 @if(session()->has('message.level'))
                            <div class="alert alert-{{ session('message.level') }}"> 
                            {!! session('message.content') !!}
                            </div>
                        @endif
        </td>
    </tr>
        <tr>
    <td>
  
        &ensp; Dear ,<br>
        &ensp; You have successfuly added your CV to our database. Your information has been collected and it's being processed.<br>
        &ensp; Here are some few things we would like you to know:
        <p></p>
       <ol>
       <li> This is not a selection process but a review stage.</i></li>
       <li> Your CV will be reviewed by our Human Resource Management team.</li>
       <li> If your CV meets the requirements of one of our client(s), You will be contacted  and scheduled for an interview.</li>   
       </ol> 
       <br>
       &ensp;&ensp; Thank you for submitting your CV. We wish you all the best.
        <p></p>
        &ensp;&ensp; Best Regards,<br>
        &ensp;&ensp; Rhizome Consulting <br>

        &ensp;&ensp;  <img src="/logo/rhizome.jpg" alt="Logo"  width="90px" height="30px"  class="logo-default" />  <br>
      <br>
      
    </td>
    </tr>
</table> 
                    <div class="table-toolbar">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="btn-group">
              
                    </div>
                </div>
            </div>
        </div>
  
                    <!-- </div> -->

           <p class="error text-center alert alert-danger hidden" style="padding-left: 350px; width: 1000px;"></p>            
                    </div>
                </div>

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
   
            </div>
        </div>
    </div>
  

    </div>
 
            <!--         <div class="content" style="padding-left: 450px; width: 1000px;">

                    @if (count($errors))
                    <div class="alert alert-danger">
                    <ul >
                    @foreach ($errors->all() as $error)

                    <li>
                    <p class="error text-center alert alert-danger hidden"></p>
                    {{ $error }}
                    </li>

                    @endforeach

                    </ul>

                    </div>
                    @endif 
                    </div> -->

   
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/selectform.js') }}"></script>
    </body>
</html>