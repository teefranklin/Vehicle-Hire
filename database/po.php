<?php


        include_once "session.php";
            $car=$_POST['porsche'];
            $hired=true;
            $destination=$_POST['destination'];
            $email= $_SESSION['email'];
            $_SESSION['report']="";
            $_SESSION['po']="Available";
            $car="porsche";
           if ( $destination=='Chinhoyi') {
              $cost=120*4;
          }
          else if ($destination=='Bulawayo') {
            $cost=320*4;
          }
          else if ($destination=='Gweru') {
            $cost=330*4;
          }
          else if ($destination=='Masvingo') {
            $cost=240*4;
          }
          else if ($destination=='Mutare') {
            $cost=200*4;
          }
          else if ($destination=='Marondera') {
            $cost=80*4;
          }
          else {
            $cost=500*4;
          }
             $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   
                    $_SESSION['po']="Hired";
                    $_SESSION['report']="The porsche is already hired";
                    header("location: ../purchase.php"); 
            
           }
           else{
              $car="porsche";
              $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
              mysqli_query($mysqli,$sql);
              $_SESSION['po']="Hired";
              header("location: ../purchase.php");      
           }
       
      
      
           




?>