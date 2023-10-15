<?php

$sid = $_POST['sid'];
$name = $_POST['name'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$branch = $_POST['branch'];
$batch = $_POST['batch'];
$address = $_POST['address'];
$category = $_POST['category'];
$DOB = $_POST['DOB'];
$gender = $_POST['gender'];

if (isset($_POST['submit'])){
    if (!empty($sid) || !empty($name) || !empty($gender) || !empty($branch) || !empty($batch) || !empty($gender)){
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname =  "student";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        }
        else{
            $SELECT = "SELECT sid From register WHERE sid = ? LIMIT 1";
            $INSERT = "INSERT Into register(sid, name, fathername, mothername, branch, batch, address, category, DOB, gender) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bindparam("s, $sid");
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii", $sid, $name, $fathername, $mothername, $branch, $batch, $address, $category, $DOB, $gender);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}

else {
    echo "Submit button is not set";
}

?>