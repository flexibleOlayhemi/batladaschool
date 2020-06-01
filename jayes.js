$(document).ready(function(){

  
//Student Edit
  $(".sbtnedit").click(e =>{
  	
  	window.location = "#se";
	let textvalues = displaySData(e);
	let id = $("input[name*='sid']");
	let sfname = $("input[name*='sfname']");
	let smname = $("input[name*='smname']");
	let slname = $("input[name*='slname']");
	let spnum = $("input[name*='spnum']");
	let sdob = $("input[name*='sdob']");
	let saddress = $("input[name*='saddress']");
	let semail = $("input[name*='semail']");
	let sclass = $("#sclass");
		
	
	id.val(textvalues[0]);
	sfname.val(textvalues[1]);
	smname.val(textvalues[2]);
	slname.val(textvalues[3]);
	sdob.val(textvalues[4]);
	spnum.val(textvalues[5]);
	saddress.val(textvalues[6]);
	semail.val(textvalues[7]);
	sclass.val(textvalues[9]);
	
});


 //Staff Edit
   $(".tbtnedit").click(e =>{
  	
   	window.location = "#te";
	let textvalues = displayTData(e);
	let id = $("input[name*='tid']");
	let fname = $("input[name*='tfname']");
	let mname = $("input[name*='tmname']");
	let lname = $("input[name*='tlname']");
	let num = $("input[name*='num']");
	let dob = $("input[name*='tdob']");
	let address = $("input[name*='taddress']");
	let email = $("input[name*='temail']");
	
		
	
	id.val(textvalues[0]);
	fname.val(textvalues[1]);
	mname.val(textvalues[2]);
	lname.val(textvalues[3]);
	dob.val(textvalues[4]);
	num.val(textvalues[5]);
	address.val(textvalues[6]);
	email.val(textvalues[7]);
	

	
	
});

});




function displaySData(e){
	
	let id = 0;
	const td = $("#stbody tr td");
	let textvalue = [];

	for (const value of td){
		if(value.dataset.id == e.target.dataset.id){
			textvalue[id++] = value.textContent;
	    }
    }
    

   return textvalue;
 }

 function displayTData(e){
	
	let id = 0;
	const td = $("#ttbody tr td");
	let textvalue = [];

	for (const value of td){
		if(value.dataset.id == e.target.dataset.id){
			textvalue[id++] = value.textContent;
	    }
    }
    

   return textvalue;
 }