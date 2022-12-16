<?php
    
    include_once __DIR__ . '/../models/patientDB.php';
    include_once __DIR__ . '/functions.php';
    
    // Set up configuration file and create database
    $configFile = __DIR__ . '/dbconfig.ini';
    try 
    {
        $patientDatabase = new PatientDB($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested patient before listing all patients
    if (isPostRequest()) {
        $id = filter_input(INPUT_POST, 'patientId');
        // $id = $_POST['patientId'];
        $patientDatabase->deletePatient($id);

    }
    $patientListing = $patientDatabase->getPatients();
    