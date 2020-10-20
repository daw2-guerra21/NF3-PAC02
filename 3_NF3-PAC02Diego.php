<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

//3. Create a PHP program that prints the values of the relationships between tables. Show the name of the director and the lead actor for each movie.
$query = 'ALTER TABLE movie
        ADD CONSTRAINT director_people
        FOREIGN KEY(movie_director)
        REFERENCES people(people_id)';

mysqli_query($db,$query) or die(mysqli_error($db));


$query = 'SELECT
        m.movie_name, a.people_fullname, b.people_fullname
    FROM
        movie m
        LEFT JOIN people a ON m.movie_leadactor = a.people_id
        LEFT JOIN people b ON m.movie_director = b.people_id
    WHERE
        m.movie_leadactor = a.people_id and
        m.movie_director = b.people_id
    /*GROUP BY
        movie_name;*/
    ORDER BY
        movie_leadactor';       
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// show the results
echo '<table border="1">';
while ($row = mysqli_fetch_row($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

?>