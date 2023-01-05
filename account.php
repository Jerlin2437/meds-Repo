<!DOCTYPE html> 
<html>
    <header>
        <h1> Account </h1> 
        <link rel="stylesheet" href="account.css">
    </header>

    <body>
        <h3 class="labels">Name</h3>
        <p> <?php $name= $_POST['name']; 
         echo "$name"; ?></p>

        <h3 class="labels">Gender </h3> 
        <p> <?php $gender = $_POST['gender']; 
              echo "$gender"?></p>

        <h3 class="labels">Email Address</h3>
        <p> <?php $email= $_POST ['email']; 
                    echo"$email" ?></p>

        <h3 class="label">Institution </h3>  
        <p> <?php $inst= $_POST ['institution']; 
                echo"$inst" ?> </p>

        <h3 class="labels">Status </h3>
        <p> <?php $status= $_POST ['status']; 
         
                if ($status==="1"){
                    echo"Student"; 
                }
                else if ($status==="2"){
                    echo "Resident"; 
                }
                else if ($status==="3"){
                    echo "Fellow"; 
                }
                else if ($status==="4"){
                    echo "Attending Physician"; 
                }
                else if ($status==="5"){
                    echo "Research Faculty"; 
                }
                else if ($status==="6"){
                    echo "Administrator"; 
                }
                    ?> </p>

        <h3 class="labels">Skills </h3>
            <p> <?php  $skill= $_POST['written']; 
                echo"$skill" ?></p>
    

    </body>

</html>