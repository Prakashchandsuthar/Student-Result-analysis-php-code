function checkDelete (gid)
{	
	
	with(document.form){
	var answer = confirm('Are you sure');
	if (answer==true){
	setaction.value = 'delete';
	txtid.value = gid;
	submit();
	}
	}
}



function checkmodify (gid)
{	
	
	with(document.form){

	setaction.value = 'modify';
	txtid.value = gid;
	submit();
	}
}	

function searchitem ()
{	
	with (document.sales){
	setaction.value = 'item';
	submit();
	}
}
	
function searchpeople ()
{	
	
	with(document.sales){
	setaction.value = 'people';
	submit();
	}
}	



function popupWindow(url) {
	window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=300,height=470,screenX=150,screenY=150,top=150,left=150')
}

