<!-- <style>
  .a_post{
    background-color: blue;
  }
</style> -->
<link rel="stylesheet" href="stylesheet.css">
<?php
    include "db_connect.php";

// prepare and bind
// $stmt = $conn->prepare("SELECT * FROM job where job_title=?");
// $stmt->bind_param("s", $search_value);
// print "current search value: ".$search_value."<br/>";
$search_value="%".$_GET['jobName']."%";
$sql = "SELECT * FROM Jobs where title LIKE '$search_value'";
$result = $conn->query($sql);//run the query

// print "User entered: ".$search_value;
// $result=$stmt->execute();//execute the query
if ($result->num_rows > 0) {
  // output data of each row
  include "searchBar.php";
  while($row = $result->fetch_assoc()) {//what does fetch_assoc() do 
    $sql="SELECT name from Job_status where job_status_id=$row[job_status_id]";
    $job_status=$conn->query($sql)->fetch_array();
    print
    "<div class=\"a_post\">".
      " <div class=\"job_title\"> " .$row["title"]."(".$job_status[0].")". "</div> ".
        $row["company_name"]."<br/>".
        "posted on ".$row["date_posted"]."<br/>".
    "</div>";
  }
  
} else {
  echo "0 results";
}

$conn->close();
?>
