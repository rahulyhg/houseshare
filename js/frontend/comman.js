$(function(){

	$("#drop-box").click(function(){
		$("#upl").click();
	});

	// To prevent Browsers from opening the file when its dragged and dropped on to the page
	$(document).on('drop dragover', function (e) {
        e.preventDefault();
    }); 

	// Add events
	$('input[type=file]').on('change', fileUpload);

	// File uploader function

	function fileUpload(event){  
		$("#text-msg").html("<p>Uploading...</p>");
		files = event.target.files;
		var data = new FormData();
		var error = 0;
		for (var i = 0; i < files.length; i++) {
  			var file = files[i];
  			console.log(file.size);
			if(!file.type.match('image.*')) {
		   		$("#text-msg").html("<p> Images only. Select another file</p>");
		   		error = 1;
		  	}else if(file.size > 1048576){
		  		$("#text-msg").html("<p> Too large Payload. Select another file</p>");
		   		error = 1;
		  	}else{
		  		data.append('image', file, file.name);
		  	}
	 	}
	 	if(!error){
		
		 	var xhr = new XMLHttpRequest();
			xhr.open('POST', 'user-upload-img', true);
		 	xhr.send(data);
		 	xhr.onload = function (data1) { 
				if (xhr.status === 200) {
					get_name_img = xhr.responseText;
					if(get_name_img){
						$(".img_user").attr("src", get_name_img);
						$("#text-msg").html("");
					}
				} else {
					$("#text-msg").html("<p> Error in upload, try again.</p>");
				}	
			 
			}; 
			
		}
	}

});