<?php
try {
		 $host = 'localhost';
		 $dbname = 'project1';
		 $user = 'root';
		 $pass = 'root';
		 
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
    // foreach($dbh->query('SELECT * from FOO') as $row) {
   
    // $conn = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

