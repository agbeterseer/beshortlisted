@extends('layouts.jobboard', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => '',
  'candidate' => '',
   'resume_' => '',
   'employer_infor' => 'active'
])
@section('content') 

<div class="careerfy-main-content" style="background-color: #ffffff;">
 <!-- Main Section -->
            <div class="careerfy-main-section careerfy-plain-services-full">
                <div class="container">
                    <div class="row">
<form action="{{route('employer.make_upgrade')}}" method="POST">
 {{ csrf_field() }}
 
 <input type="hidden" name="id" value="{{$id}}">
  <input type="hidden" name="employer_package" value="{{$employer_package->package_id}}">
    <input type="hidden" name="employer_package_units" value="{{$employer_package->units}}">
                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>Package Upgrade</h2> 
                            </section>
                            <div align="center">
You are currently on   @foreach($packages as $package)  @if($package->id === $employer_package->package_id) {{$package->title}}  @endif @endforeach
and your current unit is:  {{$employer_package->units}}
<br>
Do you wish to    <input type="submit" value="Upgrade">  <a href="{{route('employer.make_upgrade')}}">Upgrade? </a> | or <a href="{{ route('employer.packages') }}">  see current package(s) </a> 

<P></P>
 
	<div style=" background-color: #845b9b; color: #ffffff; border: solid 0px; padding-top: 5px; padding-bottom: 5px; width: 30%" ><br> Note: <br> Upgrading to another package while having current <br>active unit will sum previous and new units together 
  </div> 
   </div> 
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
            <!-- Main Section -->
  
            </div>
 
@endsection