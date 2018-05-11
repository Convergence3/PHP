<?php

        $ID = $_REQUEST["ID"];
	
	$con = new mysqli("fdb21.awardspace.net", "2720660_convergencetcg", "Cheeseman1", "2720660_convergencetcg");
	$sql = "SELECT * FROM Login WHERE `ID` = '".$ID."'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
                        $ForceShutDown = $row['ForceShutDown'];
                        $myJSON = '{
                        "Response" : '.$ForceShutDown.'
                        }';
                        echo $myJSON;
                        die();
                }
        }
        else
        $myJSON = '{
        "Response" : false
        }';
        echo $myJSON;
        die();
?>