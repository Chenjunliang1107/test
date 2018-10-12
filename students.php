<?php

require_once('includes/logincheck.php');
require_once('db.php');

// 2. Do a query (Select all students)
$query = "SELECT id, name, dob, gender ";
$query .= "FROM students";

echo $query;
    
$result = mysqli_query($connection, $query);

if (!$result) {
    die("query is wrong");
}

require_once('includes/header.php');

?>

<!-- Show first row of the table -->
<table>
   <tr>
       <td>Name</td>
       <td>dob</td>
       <td>gender</td>
       <td>update</td>
       <td>delete</td>
    </tr>

<?php

// 3. use/show data, as rows of the table (PHP & HTML mixed) -->
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["dob"] . "</td>";
    echo "<td>" . $row["gender"] . "</td>";
    echo "<td><a href='updatestudent.php?id=" . $row["id"] . "'>update</a></td>";
    echo "<td><a href='deletestudent.php?id=" . $row["id"] . "'>delete</a></td>";
    echo "</tr>";
}

?>

<!-- Close the HTML table -->
</table>
    

<?php



    
// 4. free results
mysqli_free_result($result);

// 5. close db connection
mysqli_close($connection);

require_once('includes/fooder.php');

?>