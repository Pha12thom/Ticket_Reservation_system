<?php session_start()?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Reservation System</title>

<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script src="semantic/jquery.min.js"> </script>
<script src="semantic/semantic.min.js"></script>
<link href="semantic/datepicker.css" rel="stylesheet" type="text/css">
<script src="semantic/datepicker.js"></script>
<script>
  var ORDERREF = '<?php echo $_SESSION['ORDERREF']?>';
</script>
<script src="nav.js"></script>

<style>
body{
background-color:f1f1f1;
}
a{
cursor:pointer;	
}
</style>
</head>
<body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">TICKET RESERVATION SYSTEM</a>
    </div><br>


<div class="ui fluid container center aligned" style="cursor:pointer;margin-top:40px">
<div class="ui unstackable tiny steps">
  <div class="step" onclick="booking()">
    <i class="plane icon"></i>
    <div class="content">
      <div class="title">Booking Details</div>
      <div class="description">Travelling and booking info</div>
    </div>
  </div>
  <div class="step disabled" onclick="contact()" id="contactbtn">
    <i class="truck icon"></i>
    <div class="content">
      <div class="title">Details</div>
      <div class="description">Contact information</div>
    </div>
  </div>
  <div class="disabled step" id="billingbtn" onclick="billing()">
    <i class="money icon"></i>
    <div class="content">
      <div class="title">Billing</div>
      <div class="description">Payment and verification</div>
    </div>
  </div>
   <div class="disabled step" onclick="confirmdetails()" id="confimationbtn">
    <i class="info icon"></i>
    <div class="content">
      <div class="title">Confirm Details</div>
      <div class="description">Verify order details</div>
    </div>
  </div> 
   <div class="disabled step" id="finishbtn">
    <i class="info icon"></i>
    <div class="content">
      <div class="title">Finish and Print</div>
      <div class="description">Printing Ticket</div>
    </div>
  </div>
</div>
</div>
<br>
<div id="dynamic">

<div class="ui container text" id="booking-page">
<div class="ui attached message">
  <div class="header">Booking Info</div>
    <div class="header">Order Ref: <span style="color:red;font-size:15px"><?php echo $_SESSION['ORDERREF']?> <a href='index.php'>Cancel Order</a></span> </div> 
  <p>Enter traveling booking info</p>
</div>

<form class="ui form attached fluid loading segment" onsubmit="return contact(this)">
   <div class="field">
    <label>Destination</label>
 <div class="field">
    <select required id="destination">
      <option value="" selected disabled>--Travel Destination--</option>
      <option>MOMBASA to NAKURU</option>
      <option>NAKURU to MOMBASA</option>
	   <option>NAIROBI to NAKURU</option>
	    <option>NAKURU to NAIROBI</option>
    </select>
  </div>   
  </div>
<div class="field">  
    <label>Traveling Class</label><span><a href="home.php">Learn more</a><i> about traveling classes</i></span>
 <div class="field">
    <select name="gender" required id="travelclass">
      <option value="" selected disabled>--Travel Class--</option>
      <option>High Class Travel</option>
      <option>Middle Class Travel</option>
	   <option>Lower Class Travel</option>
	    <option>Special Needs Travel</option>
    </select>
  </div>   
  </div>
<div class="two fields"> 
<div class="field"> 
    <label>Number of Seats</label>
<input placeholder="Number of Seats" type="number" id="seats" min="1" max="72"  value="1" required>
  </div> 
<div class="field"> 
    <label>Date of Travel</label>
<input type="text" readonly required id="traveldate" class="datepicker-here form-control" placeholder="ex. August 03, 1998">
  </div>  
  </div>
  <div style="text-align:center">
 <div><label>Ensure all details have been filled correctly</label></div>
  <button class="ui green submit button">Submit Details</button>
</div> 
 </form>
</div>


<div class="ui container text" id="contact-page" style="display:none">
<div class="ui attached message">
  <div class="header">Enter your Customer Details! </div>
   <div class="header">Order Ref: <span style="color:red;font-size:15px"><?php echo $_SESSION['ORDERREF']?> <a href='index.php'> Cancel Order</a></span> </div>
  <p>Fill the required Fields</p>
</div>
<form class="ui form attached fluid loading segment" onsubmit="return billing(this)">
    <div class="field">
      <label>Full name</label>
      <input placeholder="Full name" type="text" id="fullname" required>
    </div>

  <div class="field">
    <label>Contact/Mobile or Email address</label>
    <input placeholder="Mobile No/Contact or Email address" type="text" id="contact" required>
  </div>

 <div class="field">
    <label>Gender</label>
 <div class="field">
    <select name="gender" required id="gender">
      <option value="" selected disabled>--Choose Gender--</option>
      <option value="MALE">Male</option>
      <option value="FEMALE">Female</option>
    </select>
  </div>   
  </div>
 
 <div style="text-align:center">
 <div><label>Ensure all details have been filled correctly</label></div>
  <button class="ui green submit button">Submit Details</button>
</div>
  
  </form>
</div>

<div class="ui container text" id="billing-page" style="display:none">
<div class="ui attached message">
  <div class="header">Validate Payment Information</div>
    <div class="header">Order Ref: <span style="color:red;font-size:15px"><?php echo $_SESSION['ORDERREF']?> <a href='index.php'>Cancel Order</a></span> </div> 
  <p>Enter Payment Details to Proceed</p>
</div>

<form class="ui form attached fluid loading segment" onsubmit="return confirmdetails(this)">
  <div class="field"> 
<label>Payment</label>  
    <select name="gender" required id="paymentmethod">
      <option value="" selected disabled>Method of Payment</option>
      <option value="MPESA">MPESA</option>
      <option value="KCD_BANK">KCB</option>
	  <option value="EQUITY_BANK">EQUITY BANK</option>
    </select>
  </div> 
<div class="field"> 
<label>Transaction ID</label> 
<div class="ui icon input">
  <input placeholder="Transaction Code" type="text" required id="codebox">
  <i class="payment icon"></i>
</div>
</div>

  <div class="field"> 
<label>Confirm Amount(Ksh)</label>

<div class="ui icon input">
  <input value="1500.00" type="text" id="amount" readonly>
</div></div>
 <div style="text-align:center">
  <button class="ui green submit button">Proceed</button>
</div>
 </form>
<div class="ui bottom attached warning message"><i class="icon help"></i><b id="payment-info"></b></div> 
</div>


<div class="ui text container" id ="confirmdetails-page" style="display:none">
<div class="ui positive message">
<b>Before proceeding, re-check the following details you provied</b><br>
<i>Ticket might not be re-printed, hence details you provided should be valid</i>
<br>
<div class="ui horizontal divider">The Details Provided</div>
<div id="details"></div>
<div class="ui horizontal divider">Confirm Details</div>
<div class="ui fluid container center aligned">
<a class="ui button green" onclick="senddata()">YES|Confirm</a>
</div>
</div>
</div>

</div>
</body>
</html>