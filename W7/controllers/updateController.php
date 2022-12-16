<?php
 
  // This code runs everything the page loads
  include_once __DIR__ . '/../models/patientDB.php';
  include_once __DIR__ . '/functions.php'; 
    if (!isUserLoggedIn())
    {
        header ('Location: login.php');
    }

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
   
  // If it is a GET, we are coming from view.php
  // let's figure out if we're doing update or add
  if (isset($_GET['action'])) 
  {
      $action = filter_input(INPUT_GET, 'action');
      $id = filter_input(INPUT_GET, 'patientId' );
      if ($action == "Update") 
      {
          $row = $patientDatabase->getPatient($id);
          $fnParam = $row['patientFirstName'];
          $lnParam = $row['patientLastName'];
          $bdParam = $row['patientMarried'];
          $mdParam = $row['patientBirthDate'];
      } 
      //else it is Add and the user will enter patient & dvision
      else 
      {
        $fnParam = '';
        $lnParam = '';
        $bdParam = (new DateTime('now'))->format("m/d/y)");
        $mdParam = 0;
      }
  } // end if GET

  // If it is a POST, we are coming from updatepatient.php
  // we need to determine action, then return to view.php
  elseif (isset($_POST['action'])) 
  {
      $action = filter_input(INPUT_POST, 'action');
      $id = filter_input(INPUT_POST, 'patientId');

      $fnParam = filter_input(INPUT_POST, 'fnParam');

      $lnParam = filter_input(INPUT_POST, 'lnParam');  

      $bdParam = filter_input(INPUT_POST, 'bdParam');
     
      $mdParam = 0;
      if (isset($_POST['mdParam']))
      {
        $mdParam = 1;
      }
      
    

      if ($action == "Add") 
      {
          $result = $patientDatabase->addpatient ($fnParam, $lnParam, $bdParam, $mdParam);
      } 
      elseif ($action == "Update") 
      {
          $result = $patientDatabase->updatepatient ($id, $fnParam, $lnParam, $bdParam, $mdParam);
      }

      // Redirect to patient listing on view.php
      header('Location: viewpatients.php');
  } // end if POST

  // If it is neither POST nor GET, we go to view.php
  // This page should not be loaded directly
  else
  {
    header('Location: viewpatients.php');  
  }
      
?>