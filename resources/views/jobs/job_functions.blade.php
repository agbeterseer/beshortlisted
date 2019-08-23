 



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
   'resume_' => 'active'
])

@section('content')
  @include('partials.employee_breadcomb') 

  
        <div class="space">&nbsp;</div>
        <div class="space">&nbsp;</div> 
        <div class="careerfy-main-section" >
                <div class="container">
                    <div class="row">
                             @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                            @endif

                    


                     <!--  
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right">
                            <img src="{{asset('recruit/extra-images/parallex-thumb-1.png')}}" alt=""></div> </aside> -->
                    </div>
                </div>
            </div>

         
        <div class="careerfy-main-section" >
                <div class="container">
                    <div class="row">
                             @if(Session()->has('success'))
                        <div class="alert alert-success"> 
                        {!! Session::get('success') !!}
                        </div>
                            @endif

                           <div class="careerfy-employer-box-section" style="background-color: #ffffff;">
                                            <div class="careerfy-profile-title"><h2>Categories and Descriptions  
 
 </h2></div>
                          <div class="col-md-12 careerfy-typo-wrap ">

                            <ul class="careerfy-row careerfy-employer-profile-form">
                            
<li class="careerfy-column-6 ">
   <h2>Category </h2> 
</li>
<li class="careerfy-column-6">
   <h2>Description </h2>
 
</li> 
                                                <li class="careerfy-column-6 left-tag">

                                                Admin, Procurement, Purchasing
                                                </li>
                                              <li class="careerfy-column-6">
                            Jobs involving administrative support, administrative
                            Purchasing management positions or purchasing roles. Examples:
                            Program Directors, Purchasing Administrators,
                            Information Specialists, etc. 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Clerical and Office  Support


                                          </li>
                                              <li class="careerfy-column-6">
Jobs working with records, correspondents, accounts
   and general office functions. Positions are often
 support for an organization or function. Examples:
 Secretary, Clerical Assistant, Office Manager, Clerk, etc. 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Finance, Accounting & Auditing                                            
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs concerning financial matters, budgeting, accounting,   collections, payroll, Investments, etc 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Human and Social Services                                            
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs involving public welfare Examples: Caseworkers,   Counselors, Rehabilitation Therapists, Disability Claims     adjusters, etc. 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Animal Health                                          
                                          </li>
                                              <li class="careerfy-column-6">
  Jobs concerning the health and safety of animals or     bi-products of Animals. Examples: Dairy Manager, Meat    inspector, Veterinarian, Etc. 
                                                </li>

                                                <li class="careerfy-column-6 left-tag">

Architecture and Engineering                                        
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs requiring expertise in Engineering or Architecture.    Examples: Surveyors, Draftsmen, Civil Engineers, etc
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Biological and Scientific                                       
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs that require expertise scientific or biological in     nature. Examples: Chemists, Micro-Biologists,  etc. 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Education and Library Science                                       
                                          </li>
                                              <li class="careerfy-column-6">
  Jobs involving public education through institutions or    the pubic library. Examples: Librarian, Substitute     Teacher, Teachers Asst., etc 
                                                </li>

                                                <li class="careerfy-column-6 left-tag">

Environmental and Natural Resources                                      
                                          </li>
                                              <li class="careerfy-column-6">
  Jobs that protect our resources through conservation. Examples: Conservation Officer, Ecologist, Environmental Scientist, Geologist, etc
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Executive                                     
                                          </li>
                                              <li class="careerfy-column-6 ">
   Jobs that supervise or have control of the affairs of the  agency. Examples: Directors, District Manager, etc.
                                                </li>
                                                <li class="careerfy-column-6 left-tag">

Food Service                                     
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs involving food preparation or service. Example:    Food Server, Food Producer, Baker, etc.
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
  Health Care                                    
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs that aid public health and health programs.     Examples: Child Psychiatrist, Dental Assistant,     Nursing Attendant, Dietician, Psychologist, etc
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
   Human Resources                                   
                                          </li>
                                              <li class="careerfy-column-6">
 Jobs that provide services for employees through   payroll, benefits, or other HR function. Examples:    Personnel Officer, Employee Relations Specialist, etc
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
  Information Technology                                   
                                          </li>
                                              <li class="careerfy-column-6">
Jobs that require expertise in computers, programming,  LAN administration, or other Information Systems.     Examples: Network Engineer, Software Specialist,     Systems Analyst, etc. 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
  Legal                                  
                                          </li>
                                              <li class="careerfy-column-6">
  Jobs that proved legal services or assistance. Examples:   Attorneys, Public Defender, Legal Assistant, etc.  
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
  Fac., Grounds, Labor &  Maintenance.                                   
                                          </li>
                                              <li class="careerfy-column-6">
  Jobs that help maintain, fix and repair facilities and    their surrounding grounds. Examples: Laborer,    Pipe fitter, Mechanic, Building Custodian, etc. 
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
 Other                                   
                                          </li>
                                              <li class="careerfy-column-6">
  Jobs that do not fit in any other category. Examples:   Barbers, Photographer, Summer Intern, Beautician, etc.
                                                </li>

                                                <li class="careerfy-column-6 left-tag">
  Law Enforcement &  Protective Services                                  
                                          </li>
                                              <li class="careerfy-column-6">
                 Jobs that enforce the laws of our land and protect the    public. Examples: Fire Fighter, Policeman, Parole Officer,  Excise Officer, Arson Investigator, etc.    
                                                </li>
                                                <li class="careerfy-column-6 left-tag">
Transportation                                  
                                          </li>
                                              <li class="careerfy-column-6">
         Jobs that deal with the road infrastructure such as road engineering or maintenance. Examples: Highway Engineer, Highway worker, Toll attendant, Semi truck driver, etc.  
                                                </li>

                                                </ul>
       

                        </div>
                                        </div>


                     <!--  
                        <aside class="col-md-6 careerfy-typo-wrap"> <div class="careerfy-right">
                            <img src="{{asset('recruit/extra-images/parallex-thumb-1.png')}}" alt=""></div> </aside> -->
                    </div>
                </div>
            </div>


@endsection