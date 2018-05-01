<?php
	try{
		$table = "contact_us_messages";
	    $columnNames = "Name, Email, Telephone, Message";
	    $name = strip_tags($_REQUEST['Name']);
	    $email = strip_tags($_REQUEST['Email']);
	    $telephone = strip_tags($_REQUEST['Telephone']);
	    $message = strip_tags($_REQUEST['Message']);

	    $conn = new PDO("mysql:host=localhost;dbname=commons;charset=utf8", "god_admin_sachin", "godadminsachin");   
	    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    //	SAVE MESSAGE
	    $stmt = $conn->prepare("INSERT INTO $table ($columnNames) VALUES (:name, :email, :phone, :msg)");
	    $stmt->execute(array('name' => $name, 'email' => $email, 'phone' => $telephone, 'msg' => $message));  

	    echo "Message submitted !!";
    }
    catch (Exception $exc)
    {
    var_dump($exc);
        echo "Unknown error";
    }
?>