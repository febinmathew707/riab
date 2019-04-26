<?php

     $destination = explode(',',"http://bing.com;;50,http://yahoo.com;;50"); 
	 $rand=mt_rand(0,count($destination)-1);
	 echo substr($destination[$rand],0,strpos($destination[$rand],";"));   
        

?>