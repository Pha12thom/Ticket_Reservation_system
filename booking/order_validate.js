function ordval(){	
order=$("#refinput").val();
$("#refbox").addClass("loading");
	
$.ajax({
url: "validate.php",
type: "GET",
data: "ticket="+order,
		   success: function(data){    
			if(data==""){
  setTimeout(function(){$("#refbox").removeClass("loading");$("#refbox").addClass("error");},3000); 			 
			}
			else {
 setTimeout(function(){ $("#refbox").removeClass("error");$("#printbtn").addClass("loading");},3000);
 setTimeout(function(){window.location="validate.php?ticket="+order+"&validate" },3800);  
			}
		   }});
return false;	
}