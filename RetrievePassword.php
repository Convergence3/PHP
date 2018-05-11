<?php

        $Username = $_REQUEST["Username"];
        $Recovery = $_REQUEST["Recovery"];
        $Email = $_REQUEST["Email"];
	
	$con = new mysqli("fdb21.awardspace.net", "2720660_convergencetcg", "Cheeseman1", "2720660_convergencetcg");
	$sql = "SELECT * FROM Login WHERE `Username` = '".$Username."'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
                        if($row['RecoveryString'] == $Recovery)
                        {
                                $Password = $row['Password'];
                                
                                $myJSON = '{
                                "Response" : "Success",
                                "Password" : "'.$Password.'"
                                }';
                                echo $myJSON;
                                die();
                                        
                        } 
                        else
                        if($row['PlayerEmail'] == $Email)
                        {
                                $Password = $row['Password'];
                                
                                $myJSON = '{
                                "Response" : "Success",
                                "Password" : "'.$Password.'"
                                }';
                                echo $myJSON;
                                die();
                                        
                        } 
                        else
                        $myJSON = '{
                        "Response" : "PleaseProvideAdditionalInformation"
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