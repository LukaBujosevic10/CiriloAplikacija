<?php 
    include_once("db.php");
    $conn=connect();
if(isset($_POST["did"]))
{
    $conn->query("UPDATE discussion SET BrLajkova=BrLajkova+1 where DiskusijaID=".$_POST["did"]);
        
}

if(isset($_POST["cid"]))
{
    $conn->query("UPDATE comments SET BrLajkova=BrLajkova+1 where CommentID=".$_POST["cid"]);
        
}
?>