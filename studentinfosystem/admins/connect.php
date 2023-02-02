<?php
      
$con  = mysqli_connect('localhost','root','','studentinfosystem');
if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}