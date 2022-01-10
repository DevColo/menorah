function trigger(){
	$('.galleryImg').click();
	
}
//setting the  location of our file to target file
function display(e){
if (e.files[0]) {
	var reader = new FileReader();
	reader.onload=function(e){
document.querySelector('.galleryDisplay').setAttribute('src',e.target.result);
	
	}
	reader.readAsDataURL(e.files[0]);
}


}
