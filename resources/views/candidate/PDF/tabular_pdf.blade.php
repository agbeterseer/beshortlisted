
 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
 </head>
 <body>
 <style type="text/css">
     body,h1,h2,h3,h4,h5,h6{font-family:"Open Sans",sans-serif};

     .leftpad{
        height: 20%;
        width: 100%;
        padding-left: 10px; 
        background-color: #e1e1e1; text-align: left; 
        font-weight: bold; 


    }
 table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    padding: 10px;
    text-align: left;
}

  
 </style>
  
    <div class="col-md-8">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                         <div class="portlet-body">  
                 <div class="careerfy-profile-title"> 
<div class="careerfy-profile-title">
<strong> Name: </strong> {{Auth::user()->firstname}} {{Auth::user()->lastname}}<br>
<strong> Address:</strong> {{Auth::user()->contact_address}}<br>
<strong> Email Address:</strong> {{Auth::user()->email}}<br>
<strong>Phone:</strong> {{$document->phonenumber}}
</div>
<br> 
       <strong><h4> CAREER OBJECTIVES</h4>  </strong>               

     {{$career->summary}}
  <br>
 
 <div class="careerfy-profile-title" > 
    <strong> <h4> EDUCATIONAL QUALIFICATION</h4></strong>
<table width="100%" border="1"> 
<tr>
<th>Qualification/ Course</th>s
<th>Institutions</th>
<th>Duration</th>
<!--  <th>Grade</th>  -->
</tr>

@if(!$educationaList->isEmpty())
@foreach($educationaList as $educational)

<?php
    $dt->year   = $educational->start_year;
    $dt->month  = $educational->start_month;

    $ddt->year   = $educational->end_year;
    $ddt->month  = $educational->end_month;

    //$dtt->addYear($dt);  
    $yer = $ddt->diffInYears($dt);     
    $weeks = $ddt->diffInWeeks($dt);                  // 62
    $months = $ddt->diffInMonths($dt);  
?>
                                                        <tr>
                                                            <td>{{$educational->qualificaiton}} {{$educational->feild_of_study}}</td>
                                                            <td>{{$educational->school_name}}</td>
                                                            <td>{{ date('M, Y', strtotime($dt)) }} - {{ date('M, Y', strtotime($ddt)) }}</td>
                                                            <!-- <td>3.5</td> -->

                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        @endif
                                                    </table>

                                              </div>
                                <strong><h4> AREA OF INTEREST</h4></strong>
          
  @if(!$jobskills->isEmpty())
 
@foreach($jobskills as $jobskill)
 {{$jobskill->job_skill}}, 
@endforeach
 @else
 @endif  

  @if($person_info)
      @if($person_info->association) 
    <br>
      <br>
               <strong> ASSOCIATIONS</strong> 
         <div class="space">&nbsp;</div>

        {{$person_info->association}}
        @else

        @endif
                <br> 
          @if($jobcertifications->isEmpty())
 
      <strong> TRAINING ATTENDED</strong> 
                                <br> <br> 
 <ul>                        
      @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul> 
<br>
 @else

@endif   
 <h4><strong>HOBBIES</strong></h4> 
{{$person_info->interest}}, &nbsp;

@else
 
@endif
  <br>
    <br>
@if(!$referee_list->isEmpty())
 
                            <h4><strong> REFEREES </strong> </h4>
 <ul>
 @foreach($referee_list as $referee)
     <li><strong> {{$referee->name}}</strong><br>
     {{$referee->position}}</br>
     {{$referee->office_address}}<br>
    <strong> {{$referee->phone_number}} | {{$referee->email}}</strong>

     </li> 

 @endforeach
 </ul>
 @else

 @endif 
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
 </body>
 </html>

 
                              
 
 
