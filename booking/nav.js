$(document).ready(function(){
setTimeout(function(){$("form").removeClass("loading");},2000);	
});


function booking(){
	$("#contact-page").hide();
	$("#billing-page").hide();
	$("#confirmdetails-page").hide();
	$("#booking-page").fadeIn("slow"); 	
	return false;
}
function contact(){
	$("#contactbtn").removeClass("disabled");	
	$("#booking-page").hide();
	$("#billing-page").hide();
	$("#confirmdetails-page").hide();
	$("#contact-page").fadeIn("slow"); 	
return false;
}

function billing(){
$("#billingbtn").removeClass("disabled");	
	$("#booking-page").hide();
	$("#confirmdetails-page").hide();
	$("#contact-page").hide();
	$("#billing-page").fadeIn("slow");

$("#payment-info").html("Confirm the payment of the High Class number of seats");
return false;	
	
	
}

function confirmdetails(){
	
$("#confimationbtn").removeClass("disabled");
$("#billing-page").hide();
$("#booking-page").hide();
$("#contact-page").hide();
//getting details
destination=$("#destination").val();
travelclass=$("#travelclass").val();
seats=$("#seats").val();
traveldate=$("#traveldate").val();
//payment
amount=$("#amount").val();
code=$("#codebox").val();
paymethod=$("#paymentmethod").val();
//ticketname
fullname=$("#fullname").val();
//

$("#details").html("<ul><li>TICKET OWNER: "+fullname+"</li><li>DESTINATION: "+destination+"</li><li>DATE OF TRAVEL: "+traveldate+"</li><li>TRAVEL CLASS: "+travelclass+"</li><li>NUMBER OF SEATS: "+seats+"</li><li>AMOUNT PAYING: "+amount+" Via "+paymethod+" Transaction ID: "+code+"</li></ul>");	

$("#confirmdetails-page").fadeIn("slow");
return false;
	
}

function senddata(){
$("#finishbtn").removeClass("disabled");
//sending data here
//beginning with collecting all
destination=$("#destination").val();
travelclass=$("#travelclass").val();
seats=$("#seats").val();
traveldate=$("#traveldate").val();
//secondpage
fullname=$("#fullname").val();
contact=$("#contact").val();
gender=$("#gender").val();
//payment
amount=$("#amount").val();
code=$("#codebox").val();
paymethod=$("#paymentmethod").val();

//Clearing all data 
$("#dynamic").html("<div class='ui text container'><div id='err001' class='ui success icon message'><i class='notched circle loading icon'></i><div class='content'><div class='header'>Please wait....</div><p>We are doing everything for you</p></div></div>");    

//now sending to request
$.ajax({
url: "request.php",
type: "POST",
data: "d="+destination+"&tc="+travelclass+"&s="+seats+"&td="+traveldate+"&f="+fullname+"&c="+contact+"&g="+gender+"&a="+amount+"&code="+code+"&p="+paymethod,
		   success: function(data){    
			if(data=='success'){
  setTimeout(function(){$("#dynamic").html("<div class='ui text container'><div class='ui positive message'> Success! Your tickets are ready. Incase you misplaced your ticket, you can <a>reprint</a> it anytime. <p align='center'><a class='ui button green' href='validate.php?ticket="+ORDERREF+"' target='_blank'> Download ticket.</a></p></div></div>"); location.href='index.php'},3000); 			 
			}
			else {

  setTimeout(function(){$("#dynamic").html("<div class='ui text container'><div class='ui negative message'><div class='header'>Sorry Error Processing your request..!</div><div class='ui horizontal divider'>ERROR FEEDBACK</div> "+data+"<br>If you keep seeing this error, <a onclick='location.reload()'>go back</a> or contact our <a href='#0'>Support team</a> for assistance</div></div>");},8000);              
                
			}
		   }});
		

return false;	
}

