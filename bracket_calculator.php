<?php
//a final four calculator to rule them all
//written by Cody Erekson 2013-03-18

require "includes.php";

$debug = true;

$teams = array(
    "Louisville",
    "Duke",
    "Gonzaga",
    "Kansas",
    "Indiana",
    "Ohio State",
    "Miami",
    "Georgetown",
    "Florida",
    "Michigan State",
    "Kansas State",
    "New Mexico",
    "Michigan",
    "Syracuse",
    "Memphis",
    "Marquette",
    "Virginia Commonwealth University",
    "Saint Louis",
    "Wisconsin",
    "Butler",
    "Arizona",
    "University of Nevada Las Vegas",
    "North Carolina",
    "Missouri",
    "Notre Dame",
    "North Carolina State",
    "Mississippi",
    "Pittsburgh",
    "Illinois",
    "Oklahoma State",
    "University of California Los Angeles",
    "Creighton",
    "San Diego State",
    "Cincinnati",
    "Oklahoma",
    "Minnesota",
    "Oregon",
    "Colorado",
    "Wichita State",
    "Temple",
    "Iowa State",
    "Colorado State",
    "Villanova",
    "California",
    "Belmont",
    "Bucknell",
    "Ole Miss",
    "New Mexico State",
    "Akron",
    "Middle Tennessee State Univeristy",
    "Davidson",
    "Montana",
    "South Dakota State",
    "Harvard",
    "Boise/La Salle",
    "Valparaiso",
    "Northwestern State",
    "Florida Gulf Coast University",
    "Iona",
    "Pacific",
    "Albany",
    "Southern University",
    "Western Kentucky",
    "Long Island University",
    "North Carolina A&T State University",
);

//let's sort out which single numbers beat others
//7 is a toss up
$winners = array(1,4,5,8);
$losers = array(2,3,6,9);
$ehs = array(7);

//and define compound numbers that have positive and negative effects
$positives = array(10,17,19,21,23,24,25,27,32,34,36,37,41,42,45,46,50,51);
$negatives = array(11,12,13,14,16,18,26,29,35,38,43,44,47,52);
$neutrals = array(15,20,22,28,30,31,33,39,40,48,49);

$num = -1;
$display = '';
foreach($teams as $team){
    $num++;
    $display .= $num . ". " . $team . "\n";
}

$choose = true;
$invalid = '';
while ( $choose ){
    //clear the screen
    cls();

    $data = fopen("php://stdin", "rb");

    echo $display;
    echo "\n\nChoose the first team that is playing (press the corresponding number:)\n";
    echo $invalid;

    $input = '';

    while (1==1) {
        $chunk = fread($data, 1);
        if ( $chunk == "\n" || $chunk == "\r" ) break;
        $input .= $chunk;
    }
    fclose($data);

    if ( !is_numeric($input) ){
        $invalid = "Invalid Option.\n";
    } else {
        if ( isset($teams[$input]) ){
            $choose = false;
        } else {
            $invalid = "Invalid Option.\n";
        }
    }
}

$teamone = $teams[$input];

$choose = true;
$invalid = '';
while ( $choose ){

    $data = fopen("php://stdin", "rb");

    echo "\n\nNow choose the second team that is playing (press the corresponding number:)\n";
    echo $invalid;

    $input = '';

    while (1==1) {
        $chunk = fread($data, 1);
        if ( $chunk == "\n" || $chunk == "\r" ) break;
        $input .= $chunk;
    } 
    fclose($data);

    if ( !is_numeric($input) ){
        $invalid = "Invalid Option.\n";
    } else {
        if ( isset($teams[$input]) ){
            $choose = false;
        } else {
            $invalid = "Invalid Option.\n";
        }
    } 
}

$teamtwo = $teams[$input];

$choose = true;
$invalid = '';
while ( $choose ){

    $data = fopen("php://stdin", "rb");

    echo "\n\nFinally enter the ISO 8601 formatted (ie 2013-03-19 12:00:00) date and time in the timezone that the game will be played; use military time for the hour, and 16:50:00 (the median time of currently scheduled games) for games not yet scheduled.\n";
    echo $invalid;

    $input = '';

    while (1==1) {
        $chunk = fread($data, 1);
        if ( $chunk == "\n" || $chunk == "\r" ) break;
        $input .= $chunk;
    } 
    fclose($data);

    if ( preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', $input) ){
        $choose = false;
    } else {
        $invalid = "Invalid Option.\n";
    } 
}

$date = $input;

echo "\n\n" . $teamone . " vs " . $teamtwo . " on " . $date . ":\n\n";

echo "Predicted Winner: " . compete($teamone, $teamtwo, $date) . "\n\n";

?>
