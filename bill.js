function myFunction(){
   var s1,s2,add;
   s1=prompt("ENTER HOW MANY METERS");
   s2=prompt("ENTER HOW MANY RUPEES");
   document.getElementById("meter").innerText=s1;
   add=s1*s2;
   document.getElementById("netcost").value=add;
    
}