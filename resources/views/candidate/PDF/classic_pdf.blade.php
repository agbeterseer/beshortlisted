
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

 <table width="100%" align="left" border="0"> <tr>
    <td  class="leftpad" style="background-color: #e1e1e1;">
                               <strong> CAREER OBJECTIVES  </strong>
                                </td></tr></table>  
<br>
<p>
    <div class="space">&nbsp;</div></p>
                               {{$career->summary}}
                               <br>
                                          
                                        
                                              <br>
                                              <div class="careerfy-profile-title" >
                                            <table width="100%" align="left" border="0"> <tr>
                                <td  class="leftpad" style="background-color: #e1e1e1;"> 
                               <strong>  EDUCATIONAL QUALIFICATION</strong>
                                </td></tr></table>   

<br>
<p></p><br>
<p>
    <div class="space">&nbsp;</div></p>

                                                    <table width="100%" border="1"> 
                                                        <tr>
                                                            <th>Qualification/ Course</th>
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
<br>
 

          
     <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad" style="background-color: #e1e1e1;"> 
                                <strong> AREA OF INTEREST</strong>
                                </td></tr>
                          
                                </table> 
                                <br>
                                <br>
                    <p>
    <div class="space">&nbsp;</div></p>
      <div class="leftpad"> @if(!$jobskills->isEmpty())
<div class="skills_inner">
@foreach($jobskills as $jobskill)
 <span class="jellybean">{{$jobskill->job_skill}},&nbsp;</span> 
@endforeach
 @else
 @endif</div> 
                                       
                              <br>

  @if($person_info)
      @if($person_info->association)
            <table width="100%" align="left" border="0">  
                <tr>
                <td class="leftpad" style="background-color: #e1e1e1;"> 
               <strong> ASSOCIATIONS</strong>
                </td></tr></table> 
                <br> <br>
                <p> <div class="space">&nbsp;</div></p>
        {{$person_info->association}}
        @else

        @endif
                <br>
                <p> <div class="space">&nbsp;</div></p>
          @if($jobcertifications->isEmpty())
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad" style="background-color: #e1e1e1;"> 
                               <strong> TRAINING ATTENDED</strong>
                                </td></tr></table> 
                                <br> <br>
                <p> <div class="space">&nbsp;</div></p>
                                <ul>
                              
                                @foreach($jobcertifications as $jobcertification)
<li>{{$jobcertification->name}} &nbsp; {{ date('M, Y', strtotime($jobcertification->date_received)) }}</li>
@endforeach
</ul>
  <div class="space">&nbsp;</div>
 @else

@endif  
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad" style="background-color: #e1e1e1;"> 
                                <strong>HOBBIES</strong>
                                </td></tr></table> 
                <br> <br>
                <p> <div class="space">&nbsp;</div></p>
{{$person_info->interest}}, &nbsp;

  <div class="space">&nbsp;</div>
@else

@endif
@if(!$referee_list->isEmpty())
 <table width="100%" align="left" border="0"> <tr>
                                <td class="leftpad" style="background-color: #e1e1e1;"> 
                                REFEREES 
                                </td></tr></table> 
    <br> <br>
    
 <ul>
 @foreach($referee_list as $referee)
     <li><strong> {{$referee->name}}</strong><br>
     {{$referee->position}}</br>
     {{$referee->office_address}}<br>
    <strong> {{$referee->phone_number}} | {{$referee->email}}</strong><br>

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

 
                              
 
 
