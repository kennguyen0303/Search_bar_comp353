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
$sort_option= "".$_GET['sort_option'];//sort option
if($sort_option="default") $sql = "SELECT * FROM Jobs where title LIKE '$search_value'";
else if($sort_option="newest") $sql = "SELECT * FROM Jobs where title LIKE '$search_value' order by date_posted DESC";
else if($sort_option="N#position") $sql = "SELECT * FROM Jobs where title LIKE '$search_value' order by number_of_position DESC";
else if($sort_option="N#applicant") $sql = "SELECT * FROM Jobs where title LIKE '$search_value' order by number_of_applicant DESC";
$result = $conn->query($sql);//run the query

// print "User entered: ".$search_value;
// $result=$stmt->execute();//execute the query
if ($result->num_rows > 0) {
  // output data of each row
  include "searchBar.php";
  print 
  "Sorted by:".
  "<select class=\"sort_option\" onchange=\"sortingBy(this.value,\"ce\")\">".
  "<option value=\"default\"></option>".
  "<option value=\"newest\">Newest</option>".
  "<option value=\"N#applicant\">Descending by n# applicant</option>".
  "<option value=\"N#position\">Descending by N# position</option>".
  "</select>";
  print "<div class=\"job_container\">";
  while($row = $result->fetch_assoc()) {//what does fetch_assoc() do 
    $sql="SELECT name from Job_status where job_status_id=$row[job_status_id]";
    $job_status=$conn->query($sql)->fetch_array();
    print
    "<div class=\"a_post\">".
      " <div class=\"job_title\"><a href=\"http://localhost/ken_project2/a_post.php?jobId=".$row["job_id"]."\"".">". 
      $row["title"]."(".$job_status[0].")"."<a/>" ."</div> ".
        $row["company_name"]."<br/>".
        "posted on ".$row["date_posted"]."<br/>".
    "</div>";
  }
  print "<div/>";
  
} else {
  echo "0 results";
}

$conn->close();
?>

<!-- Ajax for sorting -->
<script>
  
function sortingBy(sortValue,searchValue) {
  if (sortValue.length == 0) {
    return;
  } else {
    var sort_option=sortValue;//take the option
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       
        document.getElementById("job_container").innerHTML = this.responseText;
        
      }
    };
    xmlhttp.open("GET", "action.php?jobName=" + searchValue+"&sort_option="+sortValue, true);
    xmlhttp.send();
  }
}
  function hello(){
    alert("hello");
  }
</script>


