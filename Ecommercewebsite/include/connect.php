<?php
	$host = "localhost";
	$username = "root";
	$password = "roots";
	
	$connect = mysql_connect($host,$username,$password);
	if($connect)
	{

                    $dbselect = mysql_select_db("onlinestore");
                    if($dbselect)
                    {

                    }
                    else
                    {
                                 echo "can't find the specified database".mysql_error();
                    }
                    
         }
         else
         {
             die();
         }

