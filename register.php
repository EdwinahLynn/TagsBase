<?php
     $title = "View grades from here";
     $name = "Edwinah Ninsiima";
     $file = "grades.php";
     $description = "Page for registering";
     $date = "December 6th, 2024";
     $banner = "Registration page";
    include("./includes/header.php");

    $error_message="";
    $user_id="";

    /*if (isset($_SESSION['user']))
    {
        $id = $_SESSION['user'];
        $_SESSION['message'] = "You are already loggin in. You cannot login again";
        header("Location:grades.php");
        ob_flush()
    }*/

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $first_name="";
        $last_name="";
        $email="";
        $address="";
        $birth_date="";
        $password="";
        $confirmed_password="";
    }
        
    else
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $first_name = trim($_POST["fName"]);
            $last_name = trim($_POST["lName"]);
            $email = trim($_POST["email"]);
            $phone_number = trim($_POST["number"])
            $start_date = trim($_POST["sDate"]);
            $end_date = trim($_POST["eDate"]);
            $date_applied = trim($_POST["dateApplied"]);
            $date_received= trim($_POST["dateReceived"]);
           
            if($first_name == "")
            {
                $error_message="Please enter a value in the first name field box";
            }
            else if(is_numeric($first_name))
            {
                $error_message="No numbers are allowed in the first name field box";
                $first_name="";
            }
            else if(strlen($first_name)<3)
            {
                $error_message="Your first name should be more than 3 or more letters";
                $first_name="";
            }
            else if($last_name == "")
            {
                $error_message="Please enter a value in the last name field box";
            }
            else if(is_numeric($last_name))
            {
                $error_message="No numbers are allowed in the last name field box";
                $last_name="";
            }
            else if(strlen($last_name)<3)
            {
                $error_message="Your last name should be more than 3 or more letters";
                $last_name="";
            }
            else if($email == "")
            {
                $error_message="Please enter a value in the email field box";
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error_message="The email you entered is not valid";
            }
            else if(ctype_alpha($start_date))
            {
                $error_message="No letters are allowed in the start date box";
            }
            else if(ctype_alpha($end_date))
            {
                $error_message="No letters are allowed in the end date box";
            }
            else if(ctype_alpha($date_applied))
            {
                $error_message="No letters are allowed in the date applied box";
            }
            else if(ctype_alpha($date_received))
            {
                $error_message="No letters are allowed in the date received box";
            }
            
            
            else if (isset($_POST['policeCheck']))
            {
                $police_check = $_POST['policeCheck'];
            }


            if ($error_message=="")
            {
                $conn = db_connect();
                check_for_email($conn, $email);

                $results = add_a_user($conn, $first_name,$last_name,$email,$phone_number, $start_date,$end_date,$police_check,$date_applied,$date_received);

                $id = get_user_id($conn, $first_name, $last_name, $email);
                

            }
        }
    }
?>
<h4 class ="p-3 mb-0 bg-secondary text-white"><?php echo $error_message; ?></h4>

<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" >

    <div class="p-4 mb-0 bg-secondary text-white">
        <div>
            <label for="fName">First Name</label>
            <input type="text" name="fName" value=<?php echo $first_name ?>><br><br>
        </div>
        <div>
            <label for="lName">Last Name</label>
            <input type="text" name="lName" value=<?php echo $last_name ?>><br><br>
        </div>
        <div>
            <label for="email">Email</label>
                <input type="text" name="email" value=<?php echo $email ?>><br><br>
        </div>
        <div>
            <label for="number">Phone number</label>
            <input type="text" name="number" value=<?php echo $number ?>><br><br>
        </div>
        <div>
            <label for="sDate">Start Date</label>
            <input type="text" name="sDate" value=<?php echo $start_date ?>><br><br>
        </div>
        <div>
            <label for="eDate">End Date</label>
            <input type="text" name="eDate" value=<?php echo $end_date ?>><br><br>
        </div>
        <div>
            <label for="pCheck">Police check</label>
            <input type="radio" name="policeCheck" value="Yes">Yes<label></label><br>
            <input type="radio" name="policeCheck" value="No">No<label></label><br>
        </div>
        <div>
            <label for="dateApplied">Date Applied</label>
            <input type="text" name="dateApplied" value=<?php echo $date_applied ?>><br><br>
        </div>
        <div>
            <label for="dateReceived">Date Received</label>
            <input type="text" name="dateReceived" value=<?php echo $date_received ?>><br><br>
        </div>
        <div>
            <label for="dateReceived">id</label>
            <input type="text" name="dateReceived" value=<?php echo $id ?>><br><br disabled>
        </div>
        
    </div>
    <div class="p-4 mb-0 bg-secondary text-white">
        <input type="submit" value="submit" id = "submit">
    </div>
    
</form>
    
    

<?php
    include("./includes/footer.php");


<div>

</div>