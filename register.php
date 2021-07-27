<?php

    # Database Init
    include 'dbops.php';

    if(!$DB_init)   die('Connection Failed : ' . $DB_Error);

    # Status of Registration
    $RegStatus = 0;

    $Register    = trim($_POST['register']);
    $GCTMailID   = trim($_POST['rusername']);
    $RegPassword = trim($_POST['rpasswd']);
    $firstName   = trim($_POST['fname']);
    $lastName    = trim($_POST['lname']);
    $YearOfStudy = trim($_POST['year']);
    $Department  = trim($_POST['dept']);

    # Make sure connection does not exist
    if(!DB_connectionCheck($Register))   {
        # Modify values for table record
        $F_connID = 1000 + $DB_Depts[$Department]*100 + (int)DB_connectionCount();
        $F_Register = $Register;
        $F_GCT_Mail = $GCTMailID;
        $F_Password = password_hash($RegPassword, PASSWORD_DEFAULT);
        $F_firstName = $firstName;
        $F_lastName = $lastName;
        $F_yearOfJoining = 2021 - (int)$YearOfStudy;
        $F_Department = $Department;

        # Register Field Values to Database
        $RegStatus = DB_connectionAdd($F_connID, $F_Register, $F_GCT_Mail, $F_Password, $F_firstName, $F_lastName, $F_yearOfJoining, $F_Department);
    }   else {
        $RegStatus = 0;
    }

    echo json_encode(array('status' => $RegStatus));

    # Close Database Connection
    mysqli_close($DB_Connect);

?>