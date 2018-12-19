           <div class="clearfix"></div>
            <div class="careerfy-breadcrumb">
            <!--     <span ><div style="margin-bottom: -190px;"></div><a href="#">CV BANK</a> </span> -->
                <ul>
                <li style="background-color: orange;"><span><a href="{{route('list.all')}}">CV BANK</a> </span></li> 
                   <li><a href="{{asset('/employer/dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('employer.edit', Auth::user()->id )}}"> PROFILE</a></li> 
                    <li><a href="{{route('manage.jobs')}}">MANAGE JOBS</a></li> 
                    <li><a href=" ">SHORTLIST</a></li> 
                    <li class="" >POST A JOB</li> 
                    <li>Transaction </li>
                 
                </ul>
            </div>
        <!-- SubHeader #222F3E -->

<script>
function goBack() {
    window.history.go(-1);
}
</script>