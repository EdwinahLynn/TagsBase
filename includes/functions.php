<?php 
/**
    * This is the functions file
    *
    *This is the file contains four functiosn with different functionalities. The first connects to the database,
    *the second gets the students personal information, teh third gets the marks and course code, and the last checks
    *if the student id is in the students table to determine iof it exsists
    * PHP version 8.1
    *
    * @author Edwinah Lynn Ninsiima <edwinahlynn.ninsiima@dcmail.ca>
   
    * @version 1.0 (November, 11, 2024)
    */ 


    /**
     * This Function will make a connection to the database
     *
     * Takes no parameters
     *
     * @return stmt, a prepared statement
     */
    function db_connect(){
        $serverName = "127.0.0.1";  // Change to your actual server name
        $connectionOptions = array(
        "Database" => "TagsName",
        "Uid" => "your_username",  // SQL Server username
        "PWD" => "your_password"   // SQL Server password
        );

        // Establish the connection
        $conn = sqlsrv_connect($serverName, $connectionOptions);

        if (!$conn) {
        die("Connection failed: " . print_r(sqlsrv_errors(), true));
        }

        return $conn;
    }
    /**
     * This function will fetch information about the student suchh as the email, full name and program code
     *
     * @param conn, The parameter passed into the function is the connection to the database
    *
    * @return stmt a prepared statement
    */

    function information_retrieve($conn,$first_name)
    {

        $sql = "SELECT first_name, last_name, email, phone_number, start_datee, end_date, police_check, date_applied, date_received
        FROM members
        WHERE first_name = ?";


        $stmt = $conn->prepare($sql);  // Prepare the SQL statement
        $stmt->execute([$first_name]); // Execute with parameter

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //To get the new user id
    function get_user_id($conn, $first_name, $last_name, $email)
    {
        $sql = "SELECT user_id FROM members WHERE first_name = ? AND last_name = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email]);

        return $stmt->fetchColumn(); // Returns only the user_id
    }
    
    // TO add the new user as a student
    function add_a_user($conn, $first_name, $last_name, $email, $phone_number, $start_datee, $end_date, $police_check, $date_applied, $date_received)
    {
        $sql = "INSERT INTO members (first_name, last_name, email, phone_number, start_datee, end_date, police_check, date_applied, date_received)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $success = $stmt->execute([$first_name, $last_name, $email, $phone_number, $start_datee, $end_date, $police_check, $date_applied, $date_received]);

    }

    
    ?>
    
    

    