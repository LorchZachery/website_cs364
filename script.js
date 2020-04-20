function showExtra(value) {
	var boulderDiv = document.getElementById('boulderDiv');
	if(value == ""){
		boulderDiv.style.display = "none";
	}
	else if(value == "boulder") {
		boulderDiv.style.display = "block";
		//$('#grade').attr('required','');
		//$('#grade').attr('data-error', 'This Field is required');
		//$('#typeOfGrade').attr('required','');
		//$('#typeOfGrade').attr('data-error','This Field is required');
	} else{
		boulderDiv.style.display = "none";
		//$('#grade').removeAttr('required');
		//$('#grade').removeAttr('data-error');
		//$('#typeOfGrade').removeAttr('required');
		//$('#typeOfGrade').removeAttr('data-error');
	}
}


