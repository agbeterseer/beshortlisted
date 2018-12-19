 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verificaiton Slip</title>
</head> 
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td align="center" valign="top" bgcolor="#FAFAFA" style="background-color:#FAFAFA; " ><br>
    <br>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" style="padding-left:13px; padding-right:13px; background-color:#ffffff;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="84" border="0" cellspacing="0" cellpadding="0"> 
            </table></td> 
          </tr> 
          <tr>
            <td>
 
   <img src="{{asset($content['logo'])}}" class="img-responsive" width="150px" height="63px" style="display:block;" alt="NSIA"/>
            </td>
          </tr>  
          <tr>
            <td style=" color:#000000; font-size:24px; padding-bottom:5px;"> 
            
          <strong> Dear {{$content['user']->name}} </strong>    
            <br/>      
            <p></p>
               
            <tr>
 <td style="color:#000000; font-size:15px;"> 

{!! $content['body'] !!}

Username:  {{$content['user']->email}}<br>
Password:   {{$content['user']->pin}}<br> 

  <p></p>
  <p></p>
</td>
</tr>
<tr><td align="left">
    @component('mail::button', ['url' => $content['url']])
  Login
  @endcomponent

</td></tr>
         <tr>
   <td valign="middle" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#000000;"> 
             <div><br> 
             </div>
              <div> 
              </div><div>

 
              </div></td>
          </tr>
        </table></td>
      </tr>

<table width="100%" border="0" style="font-size: xx-small; color: #CCCCCC;">
  <tr>
            <td> </td>
            <td align="center">  </td>
            <td> </td>
            <td> </td>
 </tr>
          <tr>
      <td> </td>
       <td align="center" >
         Copyright © 2018 | Rhizome Consulting 
    </td>
  <td> </td>
  <td> </td>
  </tr>
</table>
    </table>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top"></td>
  </tr>
</table>

</body>
</html>
