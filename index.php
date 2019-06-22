<?php
require_once("db_connect.php");
?>

<html>
<head>
    <title>my todos</title>
</head>
<body>
<h2>
    Next on my agenda
</h2>
<p><a href="Profess.php">add todo</a></p>
<?php
db();
global $link;
$query  = "SELECT id, items FROM todo";
$result = mysqli_query($link, $query);
//check if there's any data inside the table
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $items=$row['items']
        ?>

    <ul>
        <li><!--<a href="detail.php?id=<?php echo $id?>">--><?php echo $items ?></a></li> 
    </ul>
<?php
    }
}
?>
</body>
</html>