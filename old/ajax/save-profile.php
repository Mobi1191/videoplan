<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/3/2018
 * Time: 11:03 PM
 */
session_start();
function validate_phoneUS($number){
    $numStripX = array('(', ')', '-', '.', '+');
    $numCheck = str_replace($numStripX, '', $number); 
    $firstNum = substr($number, 0, 1);
    if(($firstNum == 0) || ($firstNum == 1)) {return false;}
    elseif(!is_numeric($numCheck)){return false;}
    elseif(strlen($numCheck) > 10){return false;}
    elseif(strlen($numCheck) < 10){return false;}
    else{
        $formats = array('###-###-####', '(###) ###-####', '(###)###-####', '##########', '###.###.####', '(###) ###.####', '(###)###.####');
        $format = trim(preg_replace("/[0-9]/", "#", $number));
        return (in_array($format, $formats)) ? true : false;
    }
}

if(!isset($_POST['name_or_business']) || !isset($_POST['cell_number'])
    || !isset($_POST['user_email']) || !isset($_POST['user_name']) || !isset($_POST['user_pwd'])
    || !isset($_POST['logo_image'])){
    echo json_encode(array('success' => '0', 'msg' => 'Parameters are invalid'));
    exit();
} else {
    $name_or_business = $_POST['name_or_business'];
    $cell_number = $_POST['cell_number'];
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_pwd = $_POST['user_pwd'];
    $logo_image = $_POST['logo_image'];

    

    if($name_or_business == "" || $cell_number == "" || $user_email == "" || $user_name == "" || $user_pwd =="" ||
        $logo_image == "") {
        echo json_encode(array('success' => '0', 'msg' => 'Parameters are invalid'));
        exit();
    }

    if (!validate_phoneUS($cell_number)) {
     echo json_encode(array('success' => '0', 'msg' => 'Phone number is invailid!'));
        exit();   
    }


    $sql = "SELECT * FROM tbl_user where name_or_business = '$name_or_business' OR user_email = '$user_email' OR user_name = '$user_name'";

    

    include '../include/db_connection.php';
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0){
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                if ($row['name_or_business'] == $name_or_business) {
                    echo json_encode(array('success' => '0', 'msg' => 'Name or Business Title is duplicated!'));
                    include '../include/db_disconnection.php';
                    exit();
                }

                if ($row['user_email'] == $user_email) {
                    echo json_encode(array('success' => '0', 'msg' => 'Email is duplicated!'));
                    include '../include/db_disconnection.php';
                    exit();
                }

                if ($row['user_name'] == $user_name) {
                    echo json_encode(array('success' => '0', 'msg' => 'User Name is duplicated!'));
                    include '../include/db_disconnection.php';
                    exit();
                }
            }
        }
    }
     

    $user_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);

    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) {
        $sql = "update tbl_user set name_or_business = '$name_or_business',
                                    cell_number = '$cell_number',
                                    user_email = '$user_email',
                                    user_name = '$user_name',
                                    password = '$user_pwd',
                                    logo_image = '$logo_image'
                                    where user_id = '".$_SESSION['user_id']."'";
    //echo $sql;
    } else{
        $sql = "INSERT INTO tbl_user (name_or_business, cell_number, user_email, user_name, password, logo_image)
            VALUES ('$name_or_business', '$cell_number', '$user_email', '$user_name', '$user_pwd', '$logo_image')";
    }

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == 0){
            $last_id = $conn->insert_id;
            $_SESSION["user_id"] = $last_id;
        }
        
        echo json_encode(array('success' => '1', 'msg' => 'Profile is Saved Successfully!'));
        include '../include/db_disconnection.php';
        exit();
    } else {
        echo json_encode(array('success' => '0', 'msg' => 'Database transaction Error!'));
        include '../include/db_disconnection.php';
        exit();
    }
    
}
