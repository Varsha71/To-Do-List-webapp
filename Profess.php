<?php

require_once 'db_connect.php';//bring the database connection file in
if(isset($_POST['submit'])) {
    $items = $_POST['item'];// grap what was filled in title field

    // check strings
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }
    // check for empty title
    if(empty($items)){
        $error  = true;
        $titleErrorMsg = "items cannot be empty";
    }
 
    // connect to database
    db();
    global $link;
    $query = "INSERT INTO todo(items) VALUES ('$items')";
    $insertTodo = mysqli_query($link, $query);
    /*if($insertTodo){
        echo "You added a new todo";
    }else{
        echo mysqli_error($link);
    }*/
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="professional.css">
		<title>To Do List</title></head>
	<body>
	<div>	
		<h1>To Do List</h1></br>
		<button type="submit"><a href="index.php">View all Todo</a></button>
		<form method="post" action="<?=$_SERVER['PHP_SELF'];?>" >
			<input type="text" name="item" id="txte" >
			<input type="submit" name="submit" value="add" >
			<!--<button onclick="newItem()">add</button>-->
		</form>	
	</div>	
	<ul id="list">
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
        //$stat=$row['status']
        ?>

    <!--<ul id="list">-->
        <li><!--<a href="detail.php?id=<?php //echo $id?>">--><?php echo $items ?></a></li> 
   <!-- </ul>-->
<?php
    }
}?>
	</ul>
	<script type="text/javascript">
		var lis=document.getElementById("list");
		
		/*function newItem(){
			var Inp=document.getElementById("txte");
			var lis=document.getElementById("list");*/

			//li.addEventListener("click",strike);
		

		

		var items=lis.querySelectorAll("li");
		for(var i=0;i<items.length;i++)
		{
			items[i].addEventListener("click",strike);	
		
		}
		function strike(){
			if(this.className=="str")
				{this.className="";

			}
			else
			{this.className="str"}
		}


	</script>

	</body>
</html>