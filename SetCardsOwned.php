<?php

        $Cards = $_REQUEST["Cards"];
        $ID = $_REQUEST["ID"];
	
	$con = new mysqli("fdb21.awardspace.net", "2720660_convergencetcg", "Cheeseman1", "2720660_convergencetcg");
	$sql = "SELECT * FROM Login WHERE `ID` = '".$ID."'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
                        $sql = "UPDATE `Login` SET `CardsOwned` = '".$Cards."' WHERE `ID` = '".$ID."'";
                        $result = mysqli_query($con, $sql);
                        $myJSON = '{
                        "Response" : "Success"
                        }';
                        echo $myJSON;
                        die();
                }
        }
        else
        $myJSON = '{
        "Response" : "IDNotFound"
        }';
        echo $myJSON;
        die();
?>