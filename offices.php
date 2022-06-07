<?php
$user = 'root';
$pass = 'root';
$db = 'webproject';


$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

$sql = "SELECT * FROM offices";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


    echo '<table style ="border:1px solid black; border-collapse: collapse;">';

    echo '  <th style ="border:1px solid black; border-collapse: collapse;">officeCode </th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">city</th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">phone </th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">addressLine1</th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">addressLine2 </th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">state </th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">country </th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">postalCode </th>';
    echo '  <th style ="border:1px solid black; border-collapse: collapse;">territory </th>';

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["officeCode"] . "</td>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["city"] . "</td>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["phone"] . "</td>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["addressLine1"] . "</td>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["addressLine2"] . "</td>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["state"] . "</td>";

        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["country"] . "</td>";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["postalCode"] . "</td> ";
        echo "<td style =\"border:1px solid black; border-collapse: collapse;\">" . $row["territory "] . "</td> ";
        echo "</tr>";
    }
    echo '</table>';
    echo '<footer style="bottom:0; position:fixed;"> Done By Widad Jeries 201904162
		</footer> ';
} else {
    echo "0 results";
}
?>