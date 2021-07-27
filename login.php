<?php

    # Database Init
    include 'dbops.php';

    if(!$DB_init)   die('Connection Failed : ' . $DB_Error);

    # Status of Login
    $LogStatus = 0;

    $F_Register = trim($_POST['lusername']);
    $F_Password = trim($_POST['lpasswd']);
    
    # Verify Connection Record
    if(DB_connectionCheck($F_Register)) {
        $Connection = DB_connectionFetch($F_Register);
        $DB_Password   = $Connection['PASSWORD'];

        # Verify Password
        $LogStatus = password_verify($F_Password, $DB_Password);

        if($LogStatus)  {
            $DB_ConnID     = $Connection['CONN_ID'];
            $DB_firstName  = $Connection['FIRST_NAME'];
            $DB_lastName   = $Connection['LAST_NAME'];
        }   else {
            $DB_firstName  = $DB_lastName  =  $DB_ConnID  = "";
        }
    }   else {
        $LogStatus = 0;
    }

    echo json_encode(array('status' => $LogStatus, 'fname' => $DB_firstName, 'lname' => $DB_lastName, 'cid' => $DB_ConnID));

    # Close Database Connection
    mysqli_close($DB_Connect);

?>