
<?php
    include "db_connect.php";
$search_value="%".$_GET['jobName']."%";
$sql = "SELECT * FROM Jobs where title LIKE '$search_value'";
$result = $conn->query($sql);//run the query

// print "User entered: ".$search_value;
// $result=$stmt->execute();//execute the query
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {//what does fetch_assoc() do 
    print
    "".$row["title"]."<br/>";
  }
  
} else {
  echo "0 results";
}

$conn->close();
?>
