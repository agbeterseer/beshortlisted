<!DOCTYPE html>
<html lang="en">

<head>

    <title>Job Board</title>
    
    <!-- Css -->
 
        @include('partials.job_board_header') 
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    .careerfy-parallex-box {
    background: url(img/parallex-box-bg.png);
    background-position: left bottom;
    background-repeat: no-repeat;
    background-color: #4f87fb;
    padding: 137px 60px 136px 60px;
    text-align: center;
}
    .search-web {
    background: url(img/search-web.png);
    background-position: left bottom;
    background-repeat: no-repeat; 
    text-align: center;
}
.singup a:hover {
 color: #ffffff;
}
</style>
   <style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    height: 10px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    border-color: #13B5EA;
}
tr:hover {background-color:#f5f5f5;}
     
              body{background-color: #FAFAFA;}
 
#password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
.medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
.weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
.strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
   </style>
   <style type="text/css">
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%; 
}
.center2 {
  display: block;
  margin-left: auto;
  margin-right: auto; 
  text-align:center;
    align-content: center;
}
</style>
</head>

<body>
 
    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
 @include('partials.job_menu')
        <!-- Header -->
        
        <!-- Banner v #1E3142 -->
        <!-- Banner -->
 <div class="careerfy-main-content" style="margin-top: -50px;">
        <!-- Main Content --> 
          <div class="space">&nbsp;</div>
          <div class="space">&nbsp;</div>
 
                  <div class="col-md-12">
                  <div class="row">
                  <div class="col-md-2">&nbsp; &nbsp;</div>
                  <div class="col-md-8 col-md-offset-2">  <h2>Create an Employer Account</h2>   </div>
                      <div class="col-md-2"></div>
                  </div>      
                </div>
<div class="col-md-8 col-md-offset-2">
    <div class="center">  
          <div class="space">&nbsp;</div>

<!-- Reach top talent and find the right candidate today  -->
    </div> 
                    @if(Session()->has('error-email'))
            <div class="alert alert-danger"> 
            {!! Session::get('error-email') !!}
            </div>
            @endif 

            
      <form class="careerfy-row careerfy-employer-profile-form" method="POST" action="{{ route('employer.postsigup') }}"   name="frm">
                        {{ csrf_field() }} 
<input type="hidden" name="account_type" value="employer" >
     <!-- <div class="portlet light bordered" > -->
          <div class="panel panel-default"> 
          <div class="panel-body">
          <div class="col-md-12" > 

 
                     <!-- class="tab-pane fade" -->
                      <div>
             <div class="tab-content">

                    <div id="personal" class="tab-pane fade in active">
   <div style="text-align: center;"><h2>Personal Information</h2>  </div>
      <div class="careerfy-user-form careerfy-user-form-coltwo">
   <div class="row">
   <div class="col-md-6">
            <div class="form-group">
                    <label >Password</label> 
                        <div name="frmCheckPassword" id="frmCheckPassword"> 
                        <input type="password" name="password" id="password" class="demoInputBox form-control" onKeyUp="checkPasswordStrength();" placeholder="Enter password"  />
                        <div id="password-strength-status" style="position: absolute; margin: -15px 0px 0px 90px;"></div>
                        </div>

                        <i class="careerfy-icon careerfy-typo-wrap"></i>
                        @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                         <label>Confirm Password</label>  
                    <input id="password_confirmation" type="password"  name="password_confirmation" class="form-control" onblur="return Validate()" placeholder="Enter confirm password">
                   
            </div>
        </div>
   </div>

   <div class="row">
   <div class="col-md-6">
            <div class="form-group">
                                     <label>Email Address:</label>
                                <input   type="text" name="email" placeholder="Enter Your Email Address"  >
                                
                                     @if ($errors->has('email2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email2') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

           <div class="col-md-6">
            <div class="form-group">
                                <div >
                                  <div class="col-md-3">   
<div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
    <label for="phonenumber" class="cols-sm-3 control-label">Code
              <span class="required"><font color="red">*</font></span>
              </label>

<select name="code" required="required" style="width: 100px; font-size: 12px; font-weight: normal;">
                                                                                                    <option value="+0"> +0 </option>
                                                                                                    <option value="+1">+1</option>
                                                                                                    <option value="+1">+1</option>
                                                                                                    <option value="+7">+7</option>
                                                                                                    <option value="+20">+20</option>
                                                                                                    <option value="+27">+27</option>
                                                                                                    <option value="+30">+30</option>
                                                                                                    <option value="+31">+31</option>
                                                                                                    <option value="+32">+32</option>
                                                                                                    <option value="+33">+33</option>
                                                                                                    <option value="+34">+34</option>
                                                                                                    <option value="+36">+36</option>
                                                                                                    <option value="+39">+39</option>
                                                                                                    <option value="+39">+39</option>
                                                                                                    <option value="+40">+40</option>
                                                                                                    <option value="+41">+41</option>
                                                                                                    <option value="+43">+43</option>
                                                                                                    <option value="+44">+44</option>
                                                                                                    <option value="+45">+45</option>
                                                                                                    <option value="+46">+46</option>
                                                                                                    <option value="+47">+47</option>
                                                                                                    <option value="+47">+47</option>
                                                                                                    <option value="+48">+48</option>
                                                                                                    <option value="+49">+49</option>
                                                                                                    <option value="+51">+51</option>
                                                                                                    <option value="+52">+52</option>
                                                                                                    <option value="+53">+53</option>
                                                                                                    <option value="+54">+54</option>
                                                                                                    <option value="+55">+55</option>
                                                                                                    <option value="+56">+56</option>
                                                                                                    <option value="+57">+57</option>
                                                                                                    <option value="+58">+58</option>
                                                                                                    <option value="+60">+60</option>
                                                                                                    <option value="+61">+61</option>
                                                                                                    <option value="+62">+62</option>
                                                                                                    <option value="+63">+63</option>
                                                                                                    <option value="+64">+64</option>
                                                                                                    <option value="+65">+65</option>
                                                                                                    <option value="+66">+66</option>
                                                                                                    <option value="+70">+70</option>
                                                                                                    <option value="+81">+81</option>
                                                                                                    <option value="+82">+82</option>
                                                                                                    <option value="+84">+84</option>
                                                                                                    <option value="+86">+86</option>
                                                                                                    <option value="+90">+90</option>
                                                                                                    <option value="+91">+91</option>
                                                                                                    <option value="+92">+92</option>
                                                                                                    <option value="+93">+93</option>
                                                                                                    <option value="+94">+94</option>
                                                                                                    <option value="+95">+95</option>
                                                                                                    <option value="+98">+98</option>
                                                                                                    <option value="+212">+212</option>
                                                                                                    <option value="+212">+212</option>
                                                                                                    <option value="+213">+213</option>
                                                                                                    <option value="+216">+216</option>
                                                                                                    <option value="+218">+218</option>
                                                                                                    <option value="+220">+220</option>
                                                                                                    <option value="+221">+221</option>
                                                                                                    <option value="+222">+222</option>
                                                                                                    <option value="+223">+223</option>
                                                                                                    <option value="+224">+224</option>
                                                                                                    <option value="+225">+225</option>
                                                                                                    <option value="+226">+226</option>
                                                                                                    <option value="+227">+227</option>
                                                                                                    <option value="+228">+228</option>
                                                                                                    <option value="+229">+229</option>
                                                                                                    <option value="+230">+230</option>
                                                                                                    <option value="+231">+231</option>
                                                                                                    <option value="+232">+232</option>
                                                                                                    <option value="+233">+233</option>
                                                                                                    <option value="+234">+234</option>
                                                                                                    <option value="+235">+235</option>
                                                                                                    <option value="+236">+236</option>
                                                                                                    <option value="+237">+237</option>
                                                                                                    <option value="+238">+238</option>
                                                                                                    <option value="+239">+239</option>
                                                                                                    <option value="+240">+240</option>
                                                                                                    <option value="+241">+241</option>
                                                                                                    <option value="+242">+242</option>
                                                                                                    <option value="+242">+242</option>
                                                                                                    <option value="+244">+244</option>
                                                                                                    <option value="+245">+245</option>
                                                                                                    <option value="+248">+248</option>
                                                                                                    <option value="+249">+249</option>
                                                                                                    <option value="+250">+250</option>
                                                                                                    <option value="+251">+251</option>
                                                                                                    <option value="+252">+252</option>
                                                                                                    <option value="+253">+253</option>
                                                                                                    <option value="+254">+254</option>
                                                                                                    <option value="+255">+255</option>
                                                                                                    <option value="+256">+256</option>
                                                                                                    <option value="+257">+257</option>
                                                                                                    <option value="+258">+258</option>
                                                                                                    <option value="+260">+260</option>
                                                                                                    <option value="+261">+261</option>
                                                                                                    <option value="+262">+262</option>
                                                                                                    <option value="+263">+263</option>
                                                                                                    <option value="+264">+264</option>
                                                                                                    <option value="+265">+265</option>
                                                                                                    <option value="+266">+266</option>
                                                                                                    <option value="+267">+267</option>
                                                                                                    <option value="+268">+268</option>
                                                                                                    <option value="+269">+269</option>
                                                                                                    <option value="+290">+290</option>
                                                                                                    <option value="+291">+291</option>
                                                                                                    <option value="+297">+297</option>
                                                                                                    <option value="+298">+298</option>
                                                                                                    <option value="+299">+299</option>
                                                                                                    <option value="+350">+350</option>
                                                                                                    <option value="+351">+351</option>
                                                                                                    <option value="+352">+352</option>
                                                                                                    <option value="+353">+353</option>
                                                                                                    <option value="+354">+354</option>
                                                                                                    <option value="+355">+355</option>
                                                                                                    <option value="+356">+356</option>
                                                                                                    <option value="+357">+357</option>
                                                                                                    <option value="+358">+358</option>
                                                                                                    <option value="+359">+359</option>
                                                                                                    <option value="+370">+370</option>
                                                                                                    <option value="+371">+371</option>
                                                                                                    <option value="+372">+372</option>
                                                                                                    <option value="+373">+373</option>
                                                                                                    <option value="+374">+374</option>
                                                                                                    <option value="+375">+375</option>
                                                                                                    <option value="+376">+376</option>
                                                                                                    <option value="+377">+377</option>
                                                                                                    <option value="+378">+378</option>
                                                                                                    <option value="+380">+380</option>
                                                                                                    <option value="+385">+385</option>
                                                                                                    <option value="+386">+386</option>
                                                                                                    <option value="+387">+387</option>
                                                                                                    <option value="+389">+389</option>
                                                                                                    <option value="+420">+420</option>
                                                                                                    <option value="+421">+421</option>
                                                                                                    <option value="+423">+423</option>
                                                                                                    <option value="+500">+500</option>
                                                                                                    <option value="+501">+501</option>
                                                                                                    <option value="+502">+502</option>
                                                                                                    <option value="+503">+503</option>
                                                                                                    <option value="+504">+504</option>
                                                                                                    <option value="+505">+505</option>
                                                                                                    <option value="+506">+506</option>
                                                                                                    <option value="+507">+507</option>
                                                                                                    <option value="+508">+508</option>
                                                                                                    <option value="+509">+509</option>
                                                                                                    <option value="+590">+590</option>
                                                                                                    <option value="+591">+591</option>
                                                                                                    <option value="+592">+592</option>
                                                                                                    <option value="+593">+593</option>
                                                                                                    <option value="+594">+594</option>
                                                                                                    <option value="+595">+595</option>
                                                                                                    <option value="+596">+596</option>
                                                                                                    <option value="+597">+597</option>
                                                                                                    <option value="+598">+598</option>
                                                                                                    <option value="+599">+599</option>
                                                                                                    <option value="+672">+672</option>
                                                                                                    <option value="+673">+673</option>
                                                                                                    <option value="+674">+674</option>
                                                                                                    <option value="+675">+675</option>
                                                                                                    <option value="+676">+676</option>
                                                                                                    <option value="+677">+677</option>
                                                                                                    <option value="+678">+678</option>
                                                                                                    <option value="+679">+679</option>
                                                                                                    <option value="+680">+680</option>
                                                                                                    <option value="+681">+681</option>
                                                                                                    <option value="+682">+682</option>
                                                                                                    <option value="+683">+683</option>
                                                                                                    <option value="+684">+684</option>
                                                                                                    <option value="+686">+686</option>
                                                                                                    <option value="+687">+687</option>
                                                                                                    <option value="+688">+688</option>
                                                                                                    <option value="+689">+689</option>
                                                                                                    <option value="+690">+690</option>
                                                                                                    <option value="+691">+691</option>
                                                                                                    <option value="+692">+692</option>
                                                                                                    <option value="+850">+850</option>
                                                                                                    <option value="+852">+852</option>
                                                                                                    <option value="+853">+853</option>
                                                                                                    <option value="+855">+855</option>
                                                                                                    <option value="+856">+856</option>
                                                                                                    <option value="+880">+880</option>
                                                                                                    <option value="+886">+886</option>
                                                                                                    <option value="+960">+960</option>
                                                                                                    <option value="+961">+961</option>
                                                                                                    <option value="+962">+962</option>
                                                                                                    <option value="+963">+963</option>
                                                                                                    <option value="+964">+964</option>
                                                                                                    <option value="+965">+965</option>
                                                                                                    <option value="+966">+966</option>
                                                                                                    <option value="+967">+967</option>
                                                                                                    <option value="+968">+968</option>
                                                                                                    <option value="+971">+971</option>
                                                                                                    <option value="+972">+972</option>
                                                                                                    <option value="+973">+973</option>
                                                                                                    <option value="+974">+974</option>
                                                                                                    <option value="+975">+975</option>
                                                                                                    <option value="+976">+976</option>
                                                                                                    <option value="+977">+977</option>
                                                                                                    <option value="+992">+992</option>
                                                                                                    <option value="+994">+994</option>
                                                                                                    <option value="+995">+995</option>
                                                                                                    <option value="+996">+996</option>
                                                                                                    <option value="+998">+998</option>
                                                                                                    <option value="+1242">+1242</option>
                                                                                                    <option value="+1246">+1246</option>
                                                                                                    <option value="+1264">+1264</option>
                                                                                                    <option value="+1268">+1268</option>
                                                                                                    <option value="+1284">+1284</option>
                                                                                                    <option value="+1340">+1340</option>
                                                                                                    <option value="+1345">+1345</option>
                                                                                                    <option value="+1441">+1441</option>
                                                                                                    <option value="+1473">+1473</option>
                                                                                                    <option value="+1649">+1649</option>
                                                                                                    <option value="+1664">+1664</option>
                                                                                                    <option value="+1670">+1670</option>
                                                                                                    <option value="+1671">+1671</option>
                                                                                                    <option value="+1684">+1684</option>
                                                                                                    <option value="+1758">+1758</option>
                                                                                                    <option value="+1767">+1767</option>
                                                                                                    <option value="+1784">+1784</option>
                                                                                                    <option value="+1787">+1787</option>
                                                                                                    <option value="+1809">+1809</option>
                                                                                                    <option value="+1868">+1868</option>
                                                                                                    <option value="+1869">+1869</option>
                                                                                                    <option value="+1876">+1876</option>
                                                                                                    <option value="+7370">+7370</option>
                                                                                            </select>
</div></div>
          <div class="col-md-9">
       <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
             
              <label for="phonenumber" class="cols-sm-2 control-label" style="margin-left:15px;">Phone Number
              <span class="required"><font color="red">*</font></span>
              </label>
    <input type="text" name="phone" maxlength="11" id="phone" required="required" onkeypress="onlyNumbers()" >         
 
    <i class="careerfy-icon careerfy-technology"></i>
           @if ($errors->has('phonenumber'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phonenumber') }}</strong>
                        </span>
                @endif 
            
            </div>

          </div>
          </div>
            </div>
        </div>
   </div>


      <div class="row">
           <div class="col-md-6">
                    <div class="form-group">
                                                <label>First Name:</label>
       <input onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="firstname" maxlength="50">
                                <i class="careerfy-icon careerfy-user"></i>
                              @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                                        <label>Last Name:</label>
                                <input onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text" name="lastname" maxlength="50">
                          
                    </div>
                </div>
   </div>
          <div style="text-align: center;"><h2>Company Information</h2>  </div>

      <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                                    <label>Comany Name:<span class="required"><font color="red">*</font></span></label>
                                <input onblur="if(this.value == '') { this.value ='Enter Comany Name'; }" onfocus="if(this.value =='Enter Comany Name') { this.value = ''; }" type="text" name="comany_name" required="required">
                               @if ($errors->has('comany_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comany_name') }}</strong>
                                    </span>
                                @endif        
                </div>
            </div>

               <div class="col-md-6">
                    <div class="form-group">
                                                            <label>Number of Employees:</label>
       <input placeholder="Number of Employees" type="text" name="number_of_employees" class="form-control"> 
                              @if ($errors->has('number_of_employees'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_employees') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
   </div>

<div>&nbsp;</div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <label>Industry:<span class="required">*</span></label>     
                                <select name="industry" required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">                             
                                 <option value="">Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}">{{$industry->name}}</option> 
                                        @endforeach 
                                    </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Type of Employer:</label>
                                <select name="type_of_employer"  required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                                    <option value="">Select One</option> 
                                        <option value="Direct Employer">Direct Employer</option>
                                        <option value="Recruitment Agency">Recruitment Agency</option>   
                                    </select> 
                              @if ($errors->has('type_of_employer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_of_employer') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>
    </div>

      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                         <label>Website (start with http://)</label>
                                <input onblur="if(this.value == '') { this.value ='https://www.yourwebsite.com'; }" onfocus="if(this.value =='https://www.yourwebsite.com') { this.value = ''; }" type="text" name="website">
                                <i class="careerfy-icon careerfy-world"></i>
                               @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif       
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
        
            </div>
        </div>
    </div>
       <div style="text-align: center;"><h2>Company Contact Person</h2>  </div>
 
              
                <div>
 
                </div>
                 
 
                           </div>
                    
                           <div class="careerfy-column-8 careerfy-user-form" >
                         
                           <ul class="careerfy-column-12"> 
                          <li>
                                <label> Contact Person:</label>
       <input onblur="if(this.value == '') { this.value ='Name of Contact Person'; }" onfocus="if(this.value =='Name of Contact Person') { this.value = ''; }" type="text" name="contact_person" required="required"> 
                              @if ($errors->has('contact_person'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <label>Email Notificaition:</label>
                                <input type="email" name="email_notificaiton" class="form-control" required="required"> 
                            </li>
                             <li>
                                                          <div class="col-md-12">
                                  <div class="col-md-3"> 
<div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
    <label for="phonenumber" class="cols-sm-3 control-label">Code
              <span class="required"><font color="red">*</font></span>
              </label>

<select name="contact_code"   required="required" style="width: 120px; font-size: 14px; font-weight: normal;">
                                                                                                    <option value="+0"> +0 </option>
                                                                                                    <option value="+1">+1</option>
                                                                                                    <option value="+1">+1</option>
                                                                                                    <option value="+7">+7</option>
                                                                                                    <option value="+20">+20</option>
                                                                                                    <option value="+27">+27</option>
                                                                                                    <option value="+30">+30</option>
                                                                                                    <option value="+31">+31</option>
                                                                                                    <option value="+32">+32</option>
                                                                                                    <option value="+33">+33</option>
                                                                                                    <option value="+34">+34</option>
                                                                                                    <option value="+36">+36</option>
                                                                                                    <option value="+39">+39</option>
                                                                                                    <option value="+39">+39</option>
                                                                                                    <option value="+40">+40</option>
                                                                                                    <option value="+41">+41</option>
                                                                                                    <option value="+43">+43</option>
                                                                                                    <option value="+44">+44</option>
                                                                                                    <option value="+45">+45</option>
                                                                                                    <option value="+46">+46</option>
                                                                                                    <option value="+47">+47</option>
                                                                                                    <option value="+47">+47</option>
                                                                                                    <option value="+48">+48</option>
                                                                                                    <option value="+49">+49</option>
                                                                                                    <option value="+51">+51</option>
                                                                                                    <option value="+52">+52</option>
                                                                                                    <option value="+53">+53</option>
                                                                                                    <option value="+54">+54</option>
                                                                                                    <option value="+55">+55</option>
                                                                                                    <option value="+56">+56</option>
                                                                                                    <option value="+57">+57</option>
                                                                                                    <option value="+58">+58</option>
                                                                                                    <option value="+60">+60</option>
                                                                                                    <option value="+61">+61</option>
                                                                                                    <option value="+62">+62</option>
                                                                                                    <option value="+63">+63</option>
                                                                                                    <option value="+64">+64</option>
                                                                                                    <option value="+65">+65</option>
                                                                                                    <option value="+66">+66</option>
                                                                                                    <option value="+70">+70</option>
                                                                                                    <option value="+81">+81</option>
                                                                                                    <option value="+82">+82</option>
                                                                                                    <option value="+84">+84</option>
                                                                                                    <option value="+86">+86</option>
                                                                                                    <option value="+90">+90</option>
                                                                                                    <option value="+91">+91</option>
                                                                                                    <option value="+92">+92</option>
                                                                                                    <option value="+93">+93</option>
                                                                                                    <option value="+94">+94</option>
                                                                                                    <option value="+95">+95</option>
                                                                                                    <option value="+98">+98</option>
                                                                                                    <option value="+212">+212</option>
                                                                                                    <option value="+212">+212</option>
                                                                                                    <option value="+213">+213</option>
                                                                                                    <option value="+216">+216</option>
                                                                                                    <option value="+218">+218</option>
                                                                                                    <option value="+220">+220</option>
                                                                                                    <option value="+221">+221</option>
                                                                                                    <option value="+222">+222</option>
                                                                                                    <option value="+223">+223</option>
                                                                                                    <option value="+224">+224</option>
                                                                                                    <option value="+225">+225</option>
                                                                                                    <option value="+226">+226</option>
                                                                                                    <option value="+227">+227</option>
                                                                                                    <option value="+228">+228</option>
                                                                                                    <option value="+229">+229</option>
                                                                                                    <option value="+230">+230</option>
                                                                                                    <option value="+231">+231</option>
                                                                                                    <option value="+232">+232</option>
                                                                                                    <option value="+233">+233</option>
                                                                                                    <option value="+234">+234</option>
                                                                                                    <option value="+235">+235</option>
                                                                                                    <option value="+236">+236</option>
                                                                                                    <option value="+237">+237</option>
                                                                                                    <option value="+238">+238</option>
                                                                                                    <option value="+239">+239</option>
                                                                                                    <option value="+240">+240</option>
                                                                                                    <option value="+241">+241</option>
                                                                                                    <option value="+242">+242</option>
                                                                                                    <option value="+242">+242</option>
                                                                                                    <option value="+244">+244</option>
                                                                                                    <option value="+245">+245</option>
                                                                                                    <option value="+248">+248</option>
                                                                                                    <option value="+249">+249</option>
                                                                                                    <option value="+250">+250</option>
                                                                                                    <option value="+251">+251</option>
                                                                                                    <option value="+252">+252</option>
                                                                                                    <option value="+253">+253</option>
                                                                                                    <option value="+254">+254</option>
                                                                                                    <option value="+255">+255</option>
                                                                                                    <option value="+256">+256</option>
                                                                                                    <option value="+257">+257</option>
                                                                                                    <option value="+258">+258</option>
                                                                                                    <option value="+260">+260</option>
                                                                                                    <option value="+261">+261</option>
                                                                                                    <option value="+262">+262</option>
                                                                                                    <option value="+263">+263</option>
                                                                                                    <option value="+264">+264</option>
                                                                                                    <option value="+265">+265</option>
                                                                                                    <option value="+266">+266</option>
                                                                                                    <option value="+267">+267</option>
                                                                                                    <option value="+268">+268</option>
                                                                                                    <option value="+269">+269</option>
                                                                                                    <option value="+290">+290</option>
                                                                                                    <option value="+291">+291</option>
                                                                                                    <option value="+297">+297</option>
                                                                                                    <option value="+298">+298</option>
                                                                                                    <option value="+299">+299</option>
                                                                                                    <option value="+350">+350</option>
                                                                                                    <option value="+351">+351</option>
                                                                                                    <option value="+352">+352</option>
                                                                                                    <option value="+353">+353</option>
                                                                                                    <option value="+354">+354</option>
                                                                                                    <option value="+355">+355</option>
                                                                                                    <option value="+356">+356</option>
                                                                                                    <option value="+357">+357</option>
                                                                                                    <option value="+358">+358</option>
                                                                                                    <option value="+359">+359</option>
                                                                                                    <option value="+370">+370</option>
                                                                                                    <option value="+371">+371</option>
                                                                                                    <option value="+372">+372</option>
                                                                                                    <option value="+373">+373</option>
                                                                                                    <option value="+374">+374</option>
                                                                                                    <option value="+375">+375</option>
                                                                                                    <option value="+376">+376</option>
                                                                                                    <option value="+377">+377</option>
                                                                                                    <option value="+378">+378</option>
                                                                                                    <option value="+380">+380</option>
                                                                                                    <option value="+385">+385</option>
                                                                                                    <option value="+386">+386</option>
                                                                                                    <option value="+387">+387</option>
                                                                                                    <option value="+389">+389</option>
                                                                                                    <option value="+420">+420</option>
                                                                                                    <option value="+421">+421</option>
                                                                                                    <option value="+423">+423</option>
                                                                                                    <option value="+500">+500</option>
                                                                                                    <option value="+501">+501</option>
                                                                                                    <option value="+502">+502</option>
                                                                                                    <option value="+503">+503</option>
                                                                                                    <option value="+504">+504</option>
                                                                                                    <option value="+505">+505</option>
                                                                                                    <option value="+506">+506</option>
                                                                                                    <option value="+507">+507</option>
                                                                                                    <option value="+508">+508</option>
                                                                                                    <option value="+509">+509</option>
                                                                                                    <option value="+590">+590</option>
                                                                                                    <option value="+591">+591</option>
                                                                                                    <option value="+592">+592</option>
                                                                                                    <option value="+593">+593</option>
                                                                                                    <option value="+594">+594</option>
                                                                                                    <option value="+595">+595</option>
                                                                                                    <option value="+596">+596</option>
                                                                                                    <option value="+597">+597</option>
                                                                                                    <option value="+598">+598</option>
                                                                                                    <option value="+599">+599</option>
                                                                                                    <option value="+672">+672</option>
                                                                                                    <option value="+673">+673</option>
                                                                                                    <option value="+674">+674</option>
                                                                                                    <option value="+675">+675</option>
                                                                                                    <option value="+676">+676</option>
                                                                                                    <option value="+677">+677</option>
                                                                                                    <option value="+678">+678</option>
                                                                                                    <option value="+679">+679</option>
                                                                                                    <option value="+680">+680</option>
                                                                                                    <option value="+681">+681</option>
                                                                                                    <option value="+682">+682</option>
                                                                                                    <option value="+683">+683</option>
                                                                                                    <option value="+684">+684</option>
                                                                                                    <option value="+686">+686</option>
                                                                                                    <option value="+687">+687</option>
                                                                                                    <option value="+688">+688</option>
                                                                                                    <option value="+689">+689</option>
                                                                                                    <option value="+690">+690</option>
                                                                                                    <option value="+691">+691</option>
                                                                                                    <option value="+692">+692</option>
                                                                                                    <option value="+850">+850</option>
                                                                                                    <option value="+852">+852</option>
                                                                                                    <option value="+853">+853</option>
                                                                                                    <option value="+855">+855</option>
                                                                                                    <option value="+856">+856</option>
                                                                                                    <option value="+880">+880</option>
                                                                                                    <option value="+886">+886</option>
                                                                                                    <option value="+960">+960</option>
                                                                                                    <option value="+961">+961</option>
                                                                                                    <option value="+962">+962</option>
                                                                                                    <option value="+963">+963</option>
                                                                                                    <option value="+964">+964</option>
                                                                                                    <option value="+965">+965</option>
                                                                                                    <option value="+966">+966</option>
                                                                                                    <option value="+967">+967</option>
                                                                                                    <option value="+968">+968</option>
                                                                                                    <option value="+971">+971</option>
                                                                                                    <option value="+972">+972</option>
                                                                                                    <option value="+973">+973</option>
                                                                                                    <option value="+974">+974</option>
                                                                                                    <option value="+975">+975</option>
                                                                                                    <option value="+976">+976</option>
                                                                                                    <option value="+977">+977</option>
                                                                                                    <option value="+992">+992</option>
                                                                                                    <option value="+994">+994</option>
                                                                                                    <option value="+995">+995</option>
                                                                                                    <option value="+996">+996</option>
                                                                                                    <option value="+998">+998</option>
                                                                                                    <option value="+1242">+1242</option>
                                                                                                    <option value="+1246">+1246</option>
                                                                                                    <option value="+1264">+1264</option>
                                                                                                    <option value="+1268">+1268</option>
                                                                                                    <option value="+1284">+1284</option>
                                                                                                    <option value="+1340">+1340</option>
                                                                                                    <option value="+1345">+1345</option>
                                                                                                    <option value="+1441">+1441</option>
                                                                                                    <option value="+1473">+1473</option>
                                                                                                    <option value="+1649">+1649</option>
                                                                                                    <option value="+1664">+1664</option>
                                                                                                    <option value="+1670">+1670</option>
                                                                                                    <option value="+1671">+1671</option>
                                                                                                    <option value="+1684">+1684</option>
                                                                                                    <option value="+1758">+1758</option>
                                                                                                    <option value="+1767">+1767</option>
                                                                                                    <option value="+1784">+1784</option>
                                                                                                    <option value="+1787">+1787</option>
                                                                                                    <option value="+1809">+1809</option>
                                                                                                    <option value="+1868">+1868</option>
                                                                                                    <option value="+1869">+1869</option>
                                                                                                    <option value="+1876">+1876</option>
                                                                                                    <option value="+7370">+7370</option>
                                                                                            </select>
</div></div>
          <div class="col-md-9">
       <div class="form-group{{ $errors->has('contact_phone_number') ? ' has-error' : '' }}">
             
              <label for="contact_phone_number" class="cols-sm-2 control-label" style="margin-left:15px;">Phone Number
              <span class="required"><font color="red">*</font></span>
              </label>
              
   <input type="text" name="contact_phone_number" maxlength="11" id="contact_phone_number" required="required" onkeypress="onlyNumbers()">
    <i class="careerfy-icon careerfy-technology"></i>
           @if ($errors->has('contact_phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_phone_number') }}</strong>
                        </span>
                @endif 
            
            </div>

          </div>
          </div>

                            </li>
                             <li>
                                <label>Country:</label> 
                                  <select name="country"  required="required" style="background-color: #ffffff; font-size: 13px; font-weight: normal;">
                                    <option value="">Select City</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->code}}">{{$country->name_en}}</option> 
                                        @endforeach 
                                    </select> 
                                 </li>                
                                    <li>
                                         <label>Full Address *</label>
                                        <textarea name="contact_address" required="required" > </textarea>
                                    </li>
                            <li class="careerfy-column-12">
           
                         </li>
                        </ul>
                  <div class="space">&nbsp;</div>
<div class="space">&nbsp;</div>
<div class="space">&nbsp;</div> 

 </div>
                        <div class="center2"> 
                                <button type="submit" class="btn dark btn" data-dismiss="modal" onclick="return Validate()">Submit</button>
                            <a href="{{url('/login')}}" class="btn dark btn-outline" data-dismiss="modal">Do you have an account already?</a> 
                                <div class="space">&nbsp;</div>
                              <label style="font-size: 15px;">By clicking "Submit", you agree to our<br>
                            <div class="space">&nbsp;</div>
                            <div><a href="{{route('single.page', 'terms-of-use')}}" target="_blank">Terms & Conditions</a> and <a href="{{route('display.policy')}}" target="_blank"> Privacy Policy</a></div></label> 
                           </div> 

                    </div>
          
                </div>  
                </div>
                 </form>
 </div>
</div>
</div>
</div>

       

          <!-- Main Section -->
 

            <!-- Main Section -->

            <!-- Main Section -->
            
            <!-- Main Section -->

            <!-- Main Section -->
  
            <!-- Main Section -->

            <!-- Main Section -->
        
            <!-- Main Section -->

            <!-- Main Section -->
             
            <!-- Main Section -->

            <!-- Main Section -->
         
            <!-- Main Section -->

            <!-- Main Section -->
         
            <!-- Main Section -->

        </div>
        <!-- Main Content -->
        
        <!-- Footer -->
  
     @include('partials.job_footer')
        <!-- Footer -->

    </div>
    <!-- Wrapper -->

    <!-- ModalLogin Box -->
      <!-- ModalLogin Box -->
    <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalSignup">
        <div class="modal-inner-area">&nbsp;</div>
        <div class="modal-content-area">
            <div class="modal-box-area">

                <div class="careerfy-modal-title-box">
                    <h2>Login to your account</h2>
                    <span class="modal-close"><i class="fa fa-times"></i></span>
                </div>
              <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="careerfy-box-title">
                        <span>Choose your Account Type</span>
                    </div>
                    <div class="careerfy-user-options">
                        <ul>
                            <li class="active">
                                <a href="#">
                                     <i class="careerfy-icon careerfy-user"></i>
                                     <span>Candidate</span>
                                     <small>I want to discover awesome companies.</small>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                     <i class="careerfy-icon careerfy-building"></i>
                                     <span>Employer</span>
                                     <small>I want to attract the best talent.</small>
                                </a>
                            </li>
                        </ul>
                    </div> 

              
                    <div class="careerfy-user-form">
                        <ul>
                            <li>
                                <label>Email Address:</label>
                                <input value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text" name="username" autocomplete="off">
                                <i class="careerfy-icon careerfy-mail"></i>
                            </li>
                            <li>
                                <label>Password:</label>
                                <input value="Enter Password" onblur="if(this.value == '') { this.value ='Enter Password'; }" onfocus="if(this.value =='Enter Password') { this.value = ''; }" type="password" class="form-control" name="password" autocomplete="off">
                                <i class="careerfy-icon careerfy-multimedia"></i>
                            </li>
                            <li>
                       
                                <input type="submit" value="Sign In">
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="careerfy-user-form-info">
                            <p>Forgot Password? | <a href="#">Sign Up</a></p>
                            <div class="careerfy-checkbox">
                                <input type="checkbox" id="r10" name="rr" />
                                <label for="r10"><span></span> Remember Password</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="careerfy-box-title careerfy-box-title-sub">
                        <span>Or Sign In With</span>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="careerfy-login-media">
                        <li><a href="{{ url('/auth/facebook') }}" target="_blank"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                        <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                        <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                        <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                    </ul>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Modal Signup Box -->
 
      
@if(session()->has('flash-message'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session()->get('flash-message') }}
    </div>
@endif

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('recruit/script/jquery.js')}}"></script>
    <script src="{{ asset('recruit/script/bootstrap.js')}}"></script>
 
 <script src="{{ asset('css/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/selectform.js') }}"></script> 
 
    <script>

    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password_confirmation").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
function checkPasswordStrength() {
var number = /([0-9])/;
var alphabets = /([a-zA-Z])/;
var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
if($('#password').val().length<6) {
$('#password-strength-status').removeClass();
$('#password-strength-status').addClass('weak-password');
$('#password-strength-status').html("Weak (should be atleast 6 characters.)");
} else {    
if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
$('#password-strength-status').removeClass();
$('#password-strength-status').addClass('strong-password');
$('#password-strength-status').html("Strong");
} else {
$('#password-strength-status').removeClass();
$('#password-strength-status').addClass('medium-password');
$('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
}}}


$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
 <script>
 
 function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
           function accountNumber(){          
            $('#account_number').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
  function onlyNumbers(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
 

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
 </script>

 
 
</body>

</html>