<?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $phoneNumber = $_POST['phoneNumber'];
  $address = $_POST['address'];
  $dd = $_POST['dd'];
  $mm = $_POST['mm'];
  $yyyy = $_POST['yyyy'];

  date_default_timezone_set('Asia/Dhaka');

  function show_date() {
    return date('d/m/y H:iA');
  }

  $added_date = show_date();
  echo "<br>";

  //insert into database
  function insertInDB()
  {
    global $name, $email, $password, $phoneNumber, $address, $gender, $dd, $mm, $yyyy, $added_date;
    $conn = mysqli_connect("localhost","root", "", "project");
    if (!$conn) {
      die("Connection Error: " . mysqli_connect_error() . "<br/>");
    } else {
      echo "Database connected successfully.. <br/>";
    }

    $sql="INSERT INTO tbl_users(name, email, password,	phone_number,	address, gender, date_of_birth, added_date, flag)
    VALUES('$name', '$email', '$password', '$phoneNumber', '$address', '$gender', '$dd/$mm/$yyyy', '$added_date', '3' )";

    if (mysqli_query($conn, $sql)) {
      echo "Successfully inserted row...<br>";
    } else {
      echo "Error is adding: " . mysqli_error($conn);
    }
  }

  function ifSuccess($errorCount) {

    if ($errorCount==7) {
      echo "Registraion Successful... <br/>";
      insertInDB();


      header("Location:../adminD.php");
    }
  }

  function showDateOfBirth() {
    global $dd, $mm, $yyyy;
    echo "Date Of Birth: " . "$dd" . "/" .  "$mm" . "/" . "$yyyy" . "<br/>";
  }



  if (isset($_POST['addEmployee'])) {
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
			echo "Must start with a letter" . "<br/>";
		} elseif(checkName($name, " ") < 1) {
			echo "Must contain 2 Words" . "<br/>";
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

	  //emailValidation

	  //$email = $_POST['email'];
		echo "Email: " . $email . "<br/>";

		function checkEmail($temp, $op) {
			$count = 0;
			for ($i=0; $i < strlen($temp); $i++) {
				if ($temp[$i] == $op) {
					$count++;
				}
			}
			return $count;
		}

		if($email == "") {
			echo "Field cannot be empty"  . "<br/>";
		} elseif (checkEmail($email, "@") < 1) {
			echo "@ is expected" . "<br/>";
		} else {
      $errorCount++;
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

	  //genderValidation

	    if (isset($_POST['gender'])) {
	      $gender = $_POST['gender'];
	      echo "gender: " . "$gender" . "<br/>";
	    }
	    else {
	      echo "Please select gender.";
        $errorCount++;
	    }

	  //dateOfBirthValidation



	  function decNum($temp) {
	    $count = 0;
	    for ($i=0; $i < strlen($temp); $i++) {
	      if (ord($temp) < "48" || ord($temp) > "57") {
	        $count++;
	      }
	    }
	    return $count;
	  }

	  if($dd == "" || $mm == "" || $yyyy == "") {
	    echo "Field cannot be empty." . "<br/>";
	  } else {

	    if ( decNum($dd) > "0" ) {
	      echo "Please enter decimal value for date." . "<br/>";
	    } elseif ( $dd < "0" || $dd > "31" ) {
	      echo "Please enter accurate date." . "<br/>";
	    } else {
	      $errorCount++;
	    }

	    if ( decNum($mm) > "0" ) {
	      echo "Please enter decimal value for month." . "<br/>";
	    } elseif ( $mm < "0" || $mm > "12" ) {
	      echo "Please enter accurate month." . "<br/>";
	    } else {
	      $errorCount++;
	    }

	    if ( decNum($yyyy) > "0" ) {
	      echo "Please enter decimal value for year." . "<br/>";
	    } elseif ( $yyyy < "1953" || $yyyy > "1998" ) {
	      echo "Please enter accurate year.";
	    } else {
	      $errorCount++;
	    }
      //echo $errorCount;
	    showDateOfBirth();
      ifSuccess($errorCount);
	  }


  } elseif (isset($_POST['reset'])) {
  	 header("Location:registration.php");
  }

mysqli_close($con);

?>
