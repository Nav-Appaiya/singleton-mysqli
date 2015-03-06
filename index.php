<?php
// Testdata:

require_once 'DB.php';

// Setup your connection, providing user, pass, database and optional
// as last param the host. Defaults to localhost if not set.
DB::setup('root', '', 'singleton');

// Query the dataabase and collect the results in an array.
$leerlingen = DB::getInstance()->query("SELECT * FROM leerlingen");


// Check for resultset from database and your query.
if( ! $leerlingen->count() ){
    die('we dont have any results to work with..');
}


// Now you can loop over the results and use it as db-object -> columnname.
foreach ($leerlingen->results() as $leerling) {
    echo 'Student Nr:   ' . $leerling->leerlingnummer   . "<br />";
    echo 'First Name:   ' . $leerling->voornaam         . "<br />";
    echo 'Last Name:    ' . $leerling->achternaam       . "<br />";
    echo 'Password:     ' . $leerling->password         . "<br />";
}

