<?PHP

echo "Database connection:";

$l=mysqli_connect("34.224.83.184","student2","phppass2","student2");
$query = "select * from message;";

$r = mysqli_query($l,$query);

echo "<table border=1 cellpadding=10 >";
echo "<tr><th>MessageID</th><th>Message</th><th>Stamp</th></tr>";
while($row = mysqli_fetch_array($r))
{
    echo "<tr>";
        echo "<td>$row[MessageID]</td>";
        echo "<td>$row[Message]</td>";
        echo "<td>$row[Stamp]</td>";
    echo "</tr>";
}
echo "</table>";

?>