<?php

    # Do not change anything here unless important

    $Server = 'localhost';
    $Username = 'root';
    $Password = '';
    $DB_Name = 'gctstucom';

    $DB_Connect = mysqli_connect($Server, $Username, $Password, $DB_Name);
    $DB_Depts   = [ 'IT' => 1, 'CSE' => 2, 'ECE' => 3, 'EEE' => 4, 'EIE' => 5, 'MECH' => 6, 'CIVIL' => 7, 'IBT' => 8];

    $DB_init = ($DB_Connect) ? 1 : 0;

    if(!$DB_init)   $DB_Error = mysqli_connect_error();

    function DB_connectionCount()
    {
        global $DB_Connect;
        $Count_Query = "SELECT CONN_ID FROM CONNECTIONS";
        $Count_Result = mysqli_query($DB_Connect, $Count_Query);
        $Count = mysqli_num_rows($Count_Result);
        return $Count;
    }

    function DB_connectionCheck($DB_Register)
    {
        global $DB_Connect;
        $Check_Query = "SELECT CONN_ID FROM CONNECTIONS WHERE REGISTER = '$DB_Register'";
        $Check_Result = mysqli_query($DB_Connect, $Check_Query);
        $Check = mysqli_num_rows($Check_Result);
        return $Check;
    }

    function DB_connectionAdd($DB_connID, $DB_Register, $DB_GCT_Mail, $DB_Password, $DB_firstName, $DB_lastName, $DB_yearOfJoining, $DB_Department)
    {
        global $DB_Connect;
        $Insert_Query = "INSERT INTO CONNECTIONS( CONN_ID, REGISTER, GCT_MAIL, PASSWORD, FIRST_NAME, LAST_NAME, YEAR_OF_JOINING, DEPARTMENT, CREATED_ON) VALUES ($DB_connID, '$DB_Register', '$DB_GCT_Mail', '$DB_Password', '$DB_firstName', '$DB_lastName', '$DB_yearOfJoining', '$DB_Department', now())";
        $Insert_Result = mysqli_query($DB_Connect, $Insert_Query);
        return $Insert_Result;
    }

    function DB_connectionFetch($DB_Register)
    {
        global $DB_Connect;
        $Fetch_Query = "SELECT CONN_ID, PASSWORD, FIRST_NAME, LAST_NAME FROM CONNECTIONS WHERE REGISTER = '$DB_Register'";
        $Fetch_Result = mysqli_query($DB_Connect, $Fetch_Query);
        $Fetch = mysqli_fetch_array($Fetch_Result, MYSQLI_ASSOC);
        return $Fetch;
    }

?>