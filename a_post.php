<link rel="stylesheet" href="stylesheet.css">
<?php
    include "db_connect.php";
$job_id=$_GET['jobId'];
$sql = "SELECT * FROM Jobs where job_id=$job_id";
$result = $conn->query($sql);//run the query

// print "User entered: ".$search_value;
// $result=$stmt->execute();//execute the query
if ($result->num_rows > 0) {
  include "searchBar.php";
  while($row = $result->fetch_assoc()) {//fetch a row as an associative array
    $sql="SELECT name from Job_status where job_status_id=$row[job_status_id]";
    $job_status=$conn->query($sql)->fetch_array();
    print
    "<div class=\"a_job\">".
      " <div class=\"job_title\"> " .$row["title"]."(".$job_status[0].")". "</div> ".
        $row["company_name"]."<br/>".
        "<button class=\"ApplyButton\">Apply now</button>"."<br/>".
        "posted on ".$row["date_posted"]."<br/>".
        $row["number_of_position"]." open position || ".$row["number_of_applicant"]." applicants"."<br/>".
        "-----------------<br/>".
        "Job description: <br/>".
        $row["description"].
        "</div>";
  }
  
} else {
  echo "0 results";
}

$conn->close();
?>