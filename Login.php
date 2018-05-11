<?php

	$Username = $_REQUEST["Username"];
	$Password = $_REQUEST["Password"];
	
	$con = new mysqli("fdb21.awardspace.net", "2720660_convergencetcg", "Cheeseman1", "2720660_convergencetcg");
	$sql = "SELECT * FROM Login WHERE `Username` = '".$Username."'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
                        if($row['IsLoggedIn'] == 0)
                        {
                                if($Password == $row['Password'])
                                {
                                        $sql = "UPDATE `Login` SET `IsLoggedIn` = '1' WHERE `Username` = '".$Username."'";
                                        $result = mysqli_query($con, $sql);
                                        
                                        $ID = $row['ID'];
                                        $myJSON = '{
                                        "Response" : "Success",
                                        "ID" : '.$ID.'
                                        }';
                                        echo $myJSON;
                                        die();
                                        
                                } 
                                else
                                $myJSON = '{
                                "Response" : "InvalidPassword"
                                }';
                                echo $myJSON;
                                die();
                        }
                        else
                        $myJSON = '{
                        "Response" : "AlreadyLoggedIn"
                        }';
                        echo $myJSON;
                        die();
		}
	}
        else
        $myJSON = '{
        "Response" : "UsernameNotFound"
        }';
        echo $myJSON;
        die();
	
?>