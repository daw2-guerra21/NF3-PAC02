<?php

//connect to MySQL
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure our recently created database is the active one
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

//2. Add three data rows in each table using another php document.

// insert data into the movie table
$query = 'INSERT INTO movie
        (movie_id, movie_name, movie_type, movie_year, movie_leadactor,
        movie_director)
    VALUES
        (4, "Wild At Heart", 10, 1990, 9, 7),
        (5, "Dune", 11, 1984, 8, 7),
        (6, "Blue Velvet", 9, 1986, 8, 7)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO movietype 
        (movietype_id, movietype_label)
    VALUES 
        (9,"Thriller"),
        (10, "Road Movie"), 
        (11, "Fantasy")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO people
        (people_id, people_fullname, people_isactor, people_isdirector)
    VALUES
        (7, "David Lynch", 0, 1),
        (8, "Kyle MacLachlan", 1, 0),
        (9, "Nicolas Cage", 1, 0)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo "Nuevas filas de datos añadidas a todas las tablas";

?>