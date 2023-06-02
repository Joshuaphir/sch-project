document.querySelector('#menulist').addEventListener('click',function(e){
	const target = e.target;
	if (target.matches('a')){
		
		target.style.backgroundColor = "red";
	}
})