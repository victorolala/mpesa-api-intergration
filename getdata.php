// File : getdata.php

<?php
  if( isset( $_POST['name'] ) )
  {
    $name = $_POST['name'];

    mysql_connect('localhost', 'root', ' ');

    mysql_select_db('user');

    $data = " SELECT age FROM user WHERE name LIKE '$name%' ";

    $query = mysql_query($data);

    while($row = mysql_fetch_array($query))
    {
       echo "<p>".$row['age']."</p>";
    }
  }
?>