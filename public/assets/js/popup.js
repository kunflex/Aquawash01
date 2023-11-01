document.getElementById('popup-btn').addEventListener('click',function(){
	document.querySelector('.modal-container').style.display = "flex";
});

//close pop up 
document.getElementById('close-btn').addEventListener('click',function(){
	document.querySelector('.modal-container').style.display = "none";
});
