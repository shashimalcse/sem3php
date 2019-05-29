
function Errorcheck()                                    
{ 
var name = document.forms["RegForm"]["UserName"];               
var email = document.forms["RegForm"]["email"];    
var phone = document.forms["RegForm"]["number"];  
var what =  document.forms["RegForm"]["ShopName"];  
var type =  document.forms["RegForm"]["Type"]; 
var lat =  document.forms["RegForm"]["shopLatitude"];
var lng =  document.forms["RegForm"]["shopLongitude"];


if (name.value == "")                                  
{ 
window.alert("Please enter your name."); 
name.focus(); 
return false; 
} 



if (email.value == "")                                   
{ 
window.alert("Please enter a valid e-mail address."); 
email.focus(); 
return false; 
} 

if (email.value.indexOf("@", 0) < 0)                 
{ 
window.alert("Please enter a valid e-mail address."); 
email.focus(); 
return false; 
} 

if (email.value.indexOf(".", 0) < 0)                 
{ 
window.alert("Please enter a valid e-mail address."); 
email.focus(); 
return false; 
} 

if (phone.value == "")                           
{ 
window.alert("Please enter your telephone number."); 
phone.focus(); 
return false; 
} 

if (what.value == "")                           
{ 
window.alert("Please enter a Shop name."); 
what.focus(); 
return false; 
} 	

if (type.value == "")                           
{ 
window.alert("Please select a Shop type."); 
type.focus(); 
return false; 
}

if (lat.value == "")                           
{ 
window.alert("Please click Getlocation and then Current Position."); 
lat.focus(); 
return false; 
}

if (lng.value == "")                           
{ 
window.alert("Please click Getlocation and then Current Position."); 
lng.focus(); 
return false; 
}	

return true; 
}
