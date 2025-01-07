<?php

$conn=mysqli_connect("localhost", "root", "", "votingsystem");
if ($conn){
    echo "connected successfully";
}else{
    echo "failed to connect";
}


?>