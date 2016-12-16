<?php
    $memcache = new Memcache; // instantiating memcache extension class
	
    $memcache->connect("localhost",11211); // try 127.0.0.1 instead of localhost 
                                           // if it is not working 
 	
    echo "Server's version: " . $memcache->getVersion() . "<br />\n";
 
    // we will create an array which will be stored in cache serialized
    $testArray = array('horse', 'cow', 'pig');
    $tmp       = serialize($testArray);
 
    //$memcache->add("key", $tmp, MEMCACHE_COMPRESSED, 10);
 
    echo "Data from the cache:<br />\n";
	//print_r(unserialize($memcache->getAllKeys()));
	//print_r($memcache);
    print_r(unserialize($memcache->get("key")));
	//$memcache->flush();
?>