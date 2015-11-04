<?php
/**
 * This is a just a demo script to show the workings of the
 * phpunit is done. The Class can be found in the /src/WesTime.php
 * and the unit test for testing that class cant be found in the
 * tests/ folder
 *
 * To run the test use the follow command:
 *
 * $phpunit tests/WesTimeTest.php
 *
 * Be sure you have PhPunit installed
 *
 */
require './src/WesTime.php';

use WesTime\WesTime;

// Create a WesTime object
$dt = new WesTime("NOW");

// Get today's day
print $dt->getDay();

//Get tomorrow's Day
print $dt->getDayAfter();

//Get Age
print $dt->getAge('1970-02-01');


?>