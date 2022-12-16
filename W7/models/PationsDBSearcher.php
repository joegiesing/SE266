<?php

include_once __DIR__ . '/PatientDB.php'; 

// We extend the patients class so we can take advantage of work done earlier
class PatientDBSearcher extends PatientDB
{

    // Allows user to search for either patient, division or both
    // INPUT: patient and/or division to search for
    function searchPatients ($fname, $lname, $married) 
    {
        // We set up all the necessary variables here 
        // to ensure they are scoped for the entire function
        $results = array();             // tables of query results
        $binds = array();               // bind array for query parameters
        $patientTable = $this->getDatabaseRef();   // Alias for database PDO

        // Create base SQL statement that we can append
        // specific restrictions to
        $sqlQuery =  "SELECT * FROM  patients   ";
        $isFirstClause = true;
        // If patient is set, append patient query and bind parameter
        if ($fname != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  patientFirstName LIKE :fname";
            $binds['fname'] = '%'.$fname.'%';
        }
    
        // If division is set, append patient query and bind parameter
        if ($lname != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  patientLastName LIKE :lname";
            $binds['lname'] = '%'.$lname.'%';
        }
    
        if ($married != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  patientMarried = :married";
            $binds['married'] = $married;
        }

        // Create query object
        $stmt = $patientTable->prepare($sqlQuery);

        // Perform query
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Return query rows (if any)
        return $results;
    } // end search patients
}

?>