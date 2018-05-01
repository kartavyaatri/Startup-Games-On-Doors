<?php
	try{
		$table = "newsletter_subscribers";
	    $columnNames = "emailid";
	    $emailid = strip_tags($_REQUEST['Email']);

	    if ($emailid == "")
	    {
	    	echo "Empty email id";
	    	return;
	    }

        $conn = new PDO("mysql:host=localhost;dbname=commons;charset=utf8", "god_admin_sachin", "godadminsachin");   
	    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    //	CHECK IF EMAIL ID IS ALREAY REGISTERED
	    $stmt = $conn->prepare("SELECT * FROM $table WHERE $columnNames = :email");
        $stmt->execute(array('email' => $emailid)); 
        if ($stmt->rowCount() > 0)
        {
        	echo "Email is already subscribed";
        	return;
        }

	    //	REGISTER EMAIL ID
	    $stmt = $conn->prepare("INSERT INTO $table ($columnNames) VALUES (:email)");
	    $stmt->execute(array('email' => $emailid));  

	    echo "Subscribed !!";
    }
    catch (Exception $exc)
    {
        echo "Unknown error";
    }
?>