<?php
session_start();
include('conn.php');

$votes=$_POST['groupvotes'];
$totalvotes=$votes+1;

$gid=$_POST['groupid'];
$uid=$_SESSION['id'];

$updatevotes=mysqli_query($conn,"update `userdata` set votes='$totalvotes' where id='$gid");

$updatestatus=mysqli_query($conn,"update `userdata` set status=1 where id='$uid");

if($supervotes and $updatestatus){
    $getgroups=mysqli_query($conn,"select username,photo,votes,id from `userdata` where standard='group'");
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;
    echo'<script>
    alert("voting successful");
    window.location="../partials/dashboard.php";
    </script>';

}else{
    echo'<script>
    alert("Technical error !! vote after sometime");
    window.location="../partials/dashboard.php";
    </script>';
}


?>