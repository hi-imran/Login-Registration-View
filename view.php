<?php 
include "connection.php";
include "login_check.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<?php
include "connection.php";

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
    $page = 1;

define("RESULTS_PER_PAGE", 10);

$sql = "SELECT * FROM `registration`";
$res = $db->query($sql);
$num = $res->num_rows;


if($num%RESULTS_PER_PAGE == 0)
    $total_page = $num/RESULTS_PER_PAGE;
else
    $total_page = intval($num/RESULTS_PER_PAGE)+1;


?>
<body>
 <div class="myDiv">
            <table>
                <thead>
                    <tr>
                        <th style = "color: white;  font-size: 20px;">Manage Customers</th>
                        <th style = "color: white;  font-size: 20px;">&nbsp;&nbsp;&nbsp;Login as <?=$_SESSION['login_name']?></th>
                        <th>&nbsp;&nbsp; 
                        <a href = "logout.php"><input type="image" src = "image/logout.png" width="120"></a></th>                      
                    </tr>
                </thead>
            </table>

        </div>
<div class="table-wrapper">
    <table class="fl-table">
        
       
        

        <thead>
        <tr>
           <!--  /*<th><input type="checkbox" name="checkallproduct" id="checkAll"></th>It must be hide from user-->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>State</th>
            <th>City</th>
            <th>Delete</th>
        </tr>
        </thead>
<?php

$limit = RESULTS_PER_PAGE*($page-1); 
$sql   = "SELECT * FROM `registration` ORDER BY `id` DESC LIMIT $limit,".RESULTS_PER_PAGE;
$res   = $db->query($sql);


date_default_timezone_set("Asia/Calcutta");
 #<td>".date("F d, Y h:i:s A", $row['timestamp'])."</td>
while($row=$res->fetch_array()) 
{
    $sql1   = "SELECT * FROM `state` WHERE `sid` = '$row[sid]' ";
    $res1   = $db->query($sql1);
    while($row1=$res1->fetch_array())
    {

        $sql2   = "SELECT * FROM `city` WHERE `cid` = '$row[cid]' ";
        $res2   = $db->query($sql2);
        while($row2=$res2->fetch_array())
        {

print "
    <tbody>
        <tr>
            <td>$row[fname]</td>
            <td>$row[lname]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[pin]</td>
            <td>$row1[sname]</td>
            <td>$row2[cname]</td>
            <td><a href=delete.php?del_id=$row[id] onclick = \" return confirm('Are you sure!');\">Delete</a></td>
        </tr>
    <tbody>";
}
    }
        }

?>
</table>
</div>
<div class="table-wrapper">
<?php
if($page>1)
{
    $prev = $page-1;
    print "<a href=\"view.php?page=$prev\">Prev</a> &nbsp &nbsp";
}

for($i=1; $i<=$total_page; $i++)
{
    if($page==$i)
        print "<a href=view.php?page=$i><span style = \"color: white;  background: #4fc3a1; font-size: 30px;\">$i</span></a>&nbsp &nbsp";
    else
        print "<a href=view.php?page=$i>$i</a>&nbsp &nbsp";
}
if($page<$total_page) 
{
    $next = $page+1;
     print "<a href=\"view.php?page=$next\">Next</a> &nbsp &nbsp";
}


?>
</div>

</body>
</html>