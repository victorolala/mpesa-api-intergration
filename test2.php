<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    //Put the JQuery code here...
  </script>
  </head>
  <body>
    <input type="text" name="name" id="name" onkeyup="getdata();">
    <div id="res">  </div>
  </body>
</html>

<?php

function getdata()
{
    <input type='text' name='name' id='name' onkeyup='getdata();'>
    <div id="res">  </div>
   var name = document.getElementById("name");
    
   if(name)
   {
    $.ajax({
      type: 'post',
      url: 'getdata.php',
      data: {
         name:name,
      },
      success: function (response) {
         $('#res').html(response);
      }
    });
   }
   else
   {
    $('#res').html("Enter the user's name");
   }
}
?>