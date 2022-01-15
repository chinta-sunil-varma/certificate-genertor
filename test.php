<?php
  session_start();
 $conn= new mysqli('localhost','root','','certificate');
 if($conn->connect_error)
 {
   echo 'unable to establish data base connection';
 }
 else
 {
   $temp=$_POST['rollno'];
   $count=0;
   $cur = $conn->query("select * from content");
   while($var=$cur->fetch_assoc())
   {
     if ($var['rollno']==$temp)
     {
       $count++;
       $_SESSION['name']=$var['name'];
       $_SESSION['grade']=$var['grade'];
       break;
     }

   }
   if($count==0)
   {
     echo 'not in the data base';
     die;
   }
   
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test.css">
 <script>
     function printi()
     {
        document.querySelector('#butto').style.display='none';
     }
     function printii()
     {
        document.querySelector('#butto').style.display='inline-block';
     }
 </script>
</head>
<body onbeforeprint="printi()" onafterprint="printii()">
    <!-- <center><img src="achiv.png" id="img" alt="" srcset=""></center> -->
    <center>
        
    <section id="certi">
    <span id="gpa"><?php echo $_SESSION['grade']; ?></span>
        <span id="name">
        <center><?php echo  strtoupper ($_SESSION['name']); ?></center>  
        </span>
        
        <span id="radhe"><img class="sig" src="signature.png" alt="" srcset=""  width="100px" height="50px" ></span>
        <span id="pri"><img class="sig" src="principle.png" alt="" srcset=""  width="100px" height="50px"></span>
    </section> 
    
    <button id="butto" onclick="print()">print</button>
    </center>
</body>
</html>