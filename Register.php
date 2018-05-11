<?php

        $Username = $_REQUEST["Username"];
	$Password = $_REQUEST["Password"];
        $Recovery = $_REQUEST["Recovery"];
	$Email    = $_REQUEST["Email"];
	
	$con = new mysqli("fdb21.awardspace.net", "2720660_convergencetcg", "Cheeseman1", "2720660_convergencetcg");
	$sql = "SELECT username FROM Login WHERE `Username` = '".$Username."'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
        
                $myJSON = '{
                "Response" : false
                }';
                echo $myJSON;
	}
	else
	{
		$sql = "INSERT INTO Login(ID, Username, Password, RecoveryString, PlayerEmail, CardsOwned, Currency, IsLoggedIn, IsAdmin) VALUE('0', '$Username', '$Password', '$Recovery', '$Email', '', '0', '0', '0')";
		$result = mysqli_query($con, $sql);
                
		$myJSON = '{
                "Response" : true
                }';
                echo $myJSON;
	}

?>