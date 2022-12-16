<?php
    
    include_once __DIR__ . '/../models/PatientDB.php';
    include_once __DIR__ . '/functions.php';
    
    // Set up configuration file and create database
    $configFile = __DIR__ . '/dbconfig.ini';
    try 
    {
        $PatientDatabase = new PatientDB($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested Patient before listing all Patients
    if (isPostRequest()) {
        $id = filter_input(INPUT_POST, 'patientId');
        // $id = $_POST['patientId'];
        $PatientDatabase->deletePatient($id);

    }
    $PatientListing = $PatientDatabase->getPatients();
    