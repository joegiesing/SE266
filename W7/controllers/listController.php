<?php

    // Load helper functions (which also starts the session) then check if user is logged in
    include_once __DIR__ . '/functions.php'; 
    // if (!isUserLoggedIn())
    // {
    //     header ('Location: login.php');
    // }

    // include patient search class
    include_once __DIR__ . '/../models/PatientsDBSearcher.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/dbconfig.ini';
    try 
    {
        $patientDatabase = new PatientDBSearcher($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested patient before listing all patients
    $patientListing = [];

    // If POST & SEARCH, only fetch the specified patients       
    if (isset($_POST["Search"]))
    {
        $fname = $_POST['fnSearch'];
        $lname = $_POST['lnSearch'];
        $married = 0;
        if (isset($_POST[`mdSearch`]))
        {
            $married = 1;
        }
        $patientListing = $patientDatabase->searchPatients($fname, $lname, $married);
    }
    // If POST & DELETE, delete the requested patient before fetching all patients       
    elseif (isset($_POST["deletePatient"]))
    {
        $id = filter_input(INPUT_POST, 'patientId');
        $patientDatabase->deletepatient($id);
        $patientListing = $patientDatabase->getPatients();
    }

    // Else just fetch all patients
    else
    {
        $patientListing = $patientDatabase->getPatients();
    }


    // This is a quick sorting hack that does not use
    // either the page form or a database query.
    // It sorts based on the associative array keys.
    $fname  = array_column($patientListing, 'patientFirstName');
    $lname = array_column($patientListing, 'patientLastName');

    array_multisort($lname, SORT_ASC, $fname, SORT_ASC, $patientListing);

// Preliminaries are done, load HTML page header
 //   include_once __DIR__ . "/header.php";

?>