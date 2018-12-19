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
            <td align="center" valign="middle" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:28px;"> 
   <img src="{{$logo}}" class="img-responsive" width="150px" height="63px" style="display:block;" alt="Rhizome Consulting"/>
            </td>
          </tr>  
          <tr>
            <td align="" valign="middle" style="font-family:Georgia, 'Times New Roman', Times, serif; color:#000000; font-size:24px; padding-bottom:5px;"><i>
            
          <strong> Dear {{$content['user']->name}} </strong>    
            <br/>      
            <p></p>
              </i>
            <tr>
            <td align="" style="font-family:Georgia, 'Times New Roman', Times, serif; color:#000000; font-size:15px;"> 

{{$content['user']->body}}

Username: {{$email}}{{$content['user']->email}}
Password:  {{$pin}}{{$content['user']->pin}}

   
  @component('mail::button', ['url' => $content['url']])
  Login
  @endcomponent

  <p></p>
  <p></p>
</td>
</tr>
         <tr>
            <td align="left" valign="middle" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#000000;"> 
             <div><br> 
             </div>
              <div> 
              </div><div>
<table width="100%" border="0" style="font-size: xx-small; color: #CCCCCC;">
  <tr>
            <td> </td>
            <td align="center"> Rhizome Consulting  </td>
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
 <br>
 
<br>
<br>
              </div></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <br>
    <br></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>
