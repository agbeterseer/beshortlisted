
                 <div class="box">
        <div  style="background-color: #ffffff;" align="center">  
          <font style=" font-weight: bold; font-size: 35px; color: orange;">
    
     <?php  $total = \App\Application::where('sorted', 0)->where('tag_id',$job->id)->count(); ?>
        
{{$total}} 
          </font><br>
          <font  style="font-size: 20px; color: orange;"> Unsorted </font>
        </div>

        <div   style="background-color: #ffffff;" align="center">
          <font style=" font-weight: bold; font-size: 35px; color: orange;">
          <?php  $in_review = \App\Application::where('in_review', 1)->where('tag_id',$job->id)->count(); ?>
{{$in_review}}
          </font><br>
           <font  style="font-size: 20px; color: orange;">  In Review </font>
        </div>
        
        <div   style="background-color: #ffffff;" align="center">
          <font  style="font-weight: bold; font-size: 35px; color: orange;"> 
           <?php  $shortlisted = \App\Application::where('shortlisted', 1)->where('tag_id',$job->id)->count(); ?>
{{$shortlisted}}
          </font><br>
           <font  style="font-size: 20px; color: orange;"> Shortlisted </font>
        </div>

        <div  style="background-color: #ffffff;" align="center">
        <font  style="font-weight: bold; font-size: 35px; color: red;">  
         <?php  $rejected = \App\Application::where('rejected', 1)->where('tag_id',$job->id)->count(); ?>
{{$rejected}}
        </font><br>
         <font  style="font-size: 20px; color: red;"> Rejected </font>
        </div>
     
        <div  style="background-color: #ffffff;" align="center">
          <font  style="font-weight: bold; font-size: 35px; color: blue;">  
          <?php  $offered = \App\Application::where('offered', 1)->where('tag_id',$job->id)->count(); ?>
{{$offered}}
          </font><br>
           <font  style="font-size: 20px; color: blue;"> Offered </font>
        </div>
        <div  style="background-color: #ffffff;" align="center">
        <font  style="font-weight: bold; font-size: 35px; color: green;">  
          
  <?php  $hired = \App\Application::where('hired', 1)->where('tag_id',$job->id)->count(); ?>
{{$hired}} 
        </font><br>
         <font  style="font-size: 20px; color: green;"> Hired </font>
        </div>

      </div>