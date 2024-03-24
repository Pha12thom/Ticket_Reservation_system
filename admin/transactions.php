<?php require ("session.php")?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
    <meta content="PPType" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <title>Admin Dashboard</title>
    <link href="static/dist/semantic-ui/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/default.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css" />
    <script src="static/dist/jquery/jquery.min.js"></script>
	<script src="admin.js"></script>
  </head>
  <body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">TICKET RESERVATION SYSTEM</a>
      <div class="right menu">
        <div class="item">
          <div class="ui small input">
		  <form>
            <input placeholder="Search order.." name="search" />
			</form>
          </div>
        </div>
        <a class="item" href="logout.php">Log out</a>
      </div>
    </div>
	
    <div class="ui grid">
      <div class="row">
        <div class="column" id="sidebar">
          <div class="ui secondary vertical fluid menu">
            <a class="item" href="bookings.php">Bookings</a><a class="item active" href="transactions.php">Transactions</a><a class="item" href="travelclass.php">Traveling Classes</a><a class="item">Export</a>
			<a class="item" href="developer.php">About developer</a>
          </div>
        </div>
		
        <div class="column" id="content" style="display:none">
	<div class="ui grid">
            <div class="row">
         <h1 class="ui huge header">All Transaction Received</h1>
         </div>
        <div class="ui horizontal divider"> These are all the Transactions Details</div>      
		<div class="row">
            <table class="ui single line striped selectable center aligned  table">
<thead><tr><th>#Order Ref</th><th>Amount Paid</th><th>Payment Via</th><th>Transaction Code</th><th>Paid by</th></tr></thead>
<tbody>
<?php
require("../dbengine/dbconnect.php");
if(isset($_GET['search'])){$search=$_GET['search'];$data=mysqli_query($conn,"SELECT order_ref,fullname,amount,account,transaction_id FROM booking_details WHERE order_ref LIKE '%$search%' or transaction_id LIKE '%$search%' or account LIKE '%$search%' or fullname LIKE '%$search%'");}
else{$data=mysqli_query($conn,"SELECT order_ref,fullname,amount,account,transaction_id FROM booking_details");}

if(($data) && (mysqli_num_rows($data) >0)){

//getting data and generating a row
while($row=mysqli_fetch_assoc($data))
{
echo("<tr><td>".$row['order_ref']."</td><td>".$row['amount']."</td><td>".$row['account']."</td><td>".$row['transaction_id']."</td><td>".$row['fullname']."</td></tr>");
}		
}
else{
echo "<tr><td colspan='5'>No records match found! </td></tr>";	
}
mysqli_close($conn);
?>
</tbody>
            </table>
            </div>
			</div>	
		</div>
      
	  </div>
    </div>
    <style type="text/css">
      body {
        display: relative;
      }
      
      #sidebar {
        position: fixed;
        top: 51.8px;
        left: 0;
        bottom: 0;
        width: 18%;
        background-color: #f5f5f5;
        padding: 0px;
      }
      #sidebar .ui.menu {
        margin: 2em 0 0;
        font-size: 16px;
      }
      #sidebar .ui.menu > a.item {
        color: #337ab7;
        border-radius: 0 !important;
      }
      #sidebar .ui.menu > a.item.active {
        background-color: #337ab7;
        color: white;
        border: none !important;
      }
      #sidebar .ui.menu > a.item:hover {
        background-color: #4f93ce;
        color: white;
      }
      
      #content {
        margin-left: 19%;
        width: 81%;
        margin-top: 3em;
        padding-left: 3em;
        float: left;
      }
      #content > .ui.grid {
        padding-right: 4em;
        padding-bottom: 3em;
      }
      #content h1 {
        font-size: 36px;
      }
      #content .ui.divider:not(.hidden) {
        margin: 0;
      }
      #content table.ui.table {
        border: none;
      }
      #content table.ui.table thead th {
        border-bottom: 2px solid #eee !important;
      }
    </style>
  </body>
</html>
