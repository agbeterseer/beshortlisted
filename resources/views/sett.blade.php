<html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
function Validate()
{
     var image =document.getElementById("image").value;
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.mp4|\.MP4|\.flv|\.FLV|\.mkv|\.MKV)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("image").focus();
              document.getElementById("errorName5").innerHTML="Wrong file selected"; 
              return false;
           }
            var img = document.getElementById("image"); 
            alert(img.files[0].size);
            if(img.files[0].size > 150000)  // validation according to file size
            {
            document.getElementById("errorName5").innerHTML="Image size is too large";
            return false;
             } 
             return true;
      }
}
</script>
<body>
<form action="{{route('test.code')}}" method="post"  onSubmit="return Validate()"; enctype="multipart/form-data" >
        {{ csrf_field() }}
<input type="file" id="image"/>
<span id="errorName5" style="color: red;"></span>
<input type="submit" value="Upload" />
</form>
</body>
</html>