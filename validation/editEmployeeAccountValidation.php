<?php

  $name = $_POST['name'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $phoneNumber = $_POST['phoneNumber'];
  $address = $_POST['address'];

  //date time

  date_default_timezone_set('Asia/Dhaka');

  function show_date() {
    return date('d/m/y H:iA');
  }

  $modified_date = show_date();

  //insert into database
  function updateInDB()
  {
    global $name, $password, $phoneNumber, $address, $modified_date;
    $conn = mysqli_connect("localhost","root", "", "project");
    if (!$conn) {
      die("Connection Error: " . mysqli_connect_error() . "<br/>");
    } else {
      echo "Database connected successfully.. <br/>";
    }

    $sql="Update tbl_users SET name=$name, password=$password, phone_number=$phoneNumber, address=$address, modified_date=$modified_date where ";

    if (mysqli_query($conn, $sql)) {
      echo "Successfully inserted row...<br>";
    } else {
      echo "Error is adding: " . mysqli_error($conn);
    }
  }


  function ifSuccess($errorCount) {

    if ($errorCount==3) {
      echo "Registraion Successful... <br/>";
      //updateInDB();


      header("Location:../employeeD.php");
    }
  }

  if (isset($_POST['editEmployeeAccount'])) {
    $errorCount = 0;


		//nameValidation
		//$name = $_POST['name'];
		echo "Name: " . $name . "<br/>";
		$count = 0;

		for($i=0;$i<strlen($name);$i++) {
			if(ord($name[$i]) > 64 && ord($name[$i]) < 91) {
				$count++;
			}
			if(ord($name[$i]) > 96 && ord($name[$i]) < 173) {
				$count++;
			}
		}

		function checkName($temp, $op) {
			$count = 0;
			for ($i=0; $i < strlen($temp); $i++) {
				if ($temp[$i] == $op) {
					$count++;
				}
			}
			return $count;
		}

		if($name == "") {
			echo "Field cannot be empty" . "<br/>";
		} elseif( !( ord($name) >= ord("a") && ord($name) <= ord("z") )
						&& !( ord($name) >= ord("A") && ord($name) <= ord("Z") ) ) {
			echo "Name must start with a letter" . "<br/>";
		} elseif(checkName($name, " ") < 1) {
			echo "Name must contain 2 Words" . "<br/>";
		} else {
      $errorCount++;
    }

		function nameRes($tmp)
	  {
	    $count = 0;
	    for ($i=0; $i < strlen($tmp); $i++) {
	      if ( ord($tmp[$i]) != ord(".") && ord($tmp[$i]) != ord("-") && ord($tmp[$i]) != ord("_")
						&& ord($tmp[$i]) != ord(" ")
						&& !(ord($tmp[$i]) >= ord("a") && ord($tmp[$i]) <= ord("z") )
						&& !(ord($tmp[$i]) >= ord("A") && ord($tmp[$i]) <= ord("Z") )
	                      		) {
	      $count++;
	      }
				//echo $tmp[$i];
	    }
			//echo $count . "<br/>";
	    return $count;
	  }

		if(nameRes($name) > 0) {
			echo "Can contain a-z, A-Z, period, dash only" . "<br/>";
		}


    //usernameValidation & passwordValidation


	  //$password = $_POST['password'];
	  $confirmPassword = $_POST['confirmPassword'];

	  function matchPass($tmp1, $tmp2)
	  {
	    if ($tmp1 == $tmp2) {
	      return true;
	    } else {
	      return false;
	    }
	    return false;
	  }


	  if ( $password == "" || $confirmPassword == "" ) {
	    echo "Please enter fields" . "<br/>";
	  } elseif (matchPass($password, $confirmPassword)) {
	      echo "Password confirmed" . "<br/>";
	  } else {
      $errorCount++;
	  }

	  function showUnPass() {
	    global $password;
	    echo "Password: " . $password . "<br/>";
	  }

	  //var_dump($reM);


	  function passRes($tmp) {
	    $count = 0;
	    for ($i=0; $i < strlen($tmp); $i++) {
	      if ( ord($tmp[$i]) == ord("@") || ord($tmp[$i]) == ord("#") || ord($tmp[$i]) == ord("$")
	             || ord($tmp[$i]) == ord("%")
	          ) {

	        $count++;
	      }
	    }
	    return $count;
	  }

	  function counts($tmp) {
	    $count = 0;
	    for ($i=0; $i < strlen($tmp); $i++) {
	        $count++;
	    }
	    return $count;
	  }


	  if (passRes($password) < "1") {
	    echo "Password must contain at least one of the special characters (@, #, $, %)" . "<br/>";
	  } elseif (counts($password) < "8") {
	    echo "Password must not be less than eight (8) characters" . "<br/>";
	  } else {
      $errorCount++;
    }

	  showUnPass();


    //Number Validation

    if (counts($phoneNumber) != 11) {
      echo "Please check phone number". "<br/>";
    } else {
      $errorCount++;
    }

    echo "$errorCount";

  }

//mysqli_close($conn);

?>
