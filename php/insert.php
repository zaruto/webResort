<?php

$checkin = $_POST ['date'];
$checkout = $_POST ['date1'];
$adult = $_POST ['number'];
$kids= $_POST ['number1'];
$room = $_POST ['select'];
$name = $_POST ['name'];
$country = $_POST ['Country'];
$email = $_POST ['email'];
$message = $_POST ['message'];


if(!empty($checkin)||!empty($checkout)||!empty($adult)|| !empty($room)||!empty($name)

||!empty($country)||!empty($email)||!empty($message)) {

        $host ="localhost";
        $dbusername = "root"; 
        $dbpass = "12345678"; 
        $dbname = "booking"; 

        $conn = new mysqli($host ,$dbusername, $dbpass,$dbname);

    if (mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }
    else{
        $SELECT = "SELECT email From Requested_booking where email=? limit 1";

        $INSERT = "INSERT Into Requested_booking (date,date1,number,number1,select,name,Country,email,message)
        values(?,?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt -> bind_param("s",$email);
        $stmt -> execute();
        $stmt -> bind_result($email);
        $stmt -> store_result();
        $rnum-> $stmt->num_rows; 

        if (rnum==0){

            $stmt ->close(); 

            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("ssiiii",$checkin,$checkout,$adult,$kids,$room,$name,$country,$email,$message);
            $stmt->execute();
            echo "record insert completed";

        }
            else{
                echo "you  have already send the booking ";
                
            }
                $stmt-> close(); 
                $conn-> close(); 
    
    }   

}

else{
    
    echo"Filds are not completed";
    die();
}


?> 