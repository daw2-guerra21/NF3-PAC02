<?php

//connect to MySQL
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure our recently created database is the active one
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

//1. Create a relationship between “movie_leadactor” and “people_id” using a php document.
$query = 'ALTER TABLE movie
        ADD CONSTRAINT leadactor_people
        FOREIGN KEY(movie_leadactor)
        REFERENCES people(people_id)';

mysqli_query($db,$query) or die(mysqli_error($db));

echo "Relación entre movie_leadactor y people_id completada <br/>";

?>