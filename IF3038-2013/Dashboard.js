function ShowTask(s,jum){
	for(var i=1;i<=jum;i++)
	{
		var n="Task"+i;
		if(i==s)
		{
			var obj=document.getElementById(n);
			obj.style.display="block";
		}
		else
		{
			var obj=document.getElementById(n);
			obj.style.display="none";
		}
	}
	
}

function FormAddKategori(){
	var form=document.getElementById("popupform");
	form.style.display="block";

	var obj= document.getElementById("popup");
	obj.style.display="block";
}

function AddKategori(){
	var d1 = document.getElementById('namakategori').value;
	if (d1==""){
		
	}else{
	var div = document.getElementById ("kategori");
	div.innerHTML += "<a onClick=\"ShowTask('2','5')\">"+d1+"</a>";
  
	var form=document.getElementById("popupform");
	form.style.display="none";

	var obj= document.getElementById("popup");
	obj.style.display="none";
	}
	}

function DelPopUp(){
var form=document.getElementById("popupform");
form.style.display="none";

var obj= document.getElementById("popup");
obj.style.display="none";
}
