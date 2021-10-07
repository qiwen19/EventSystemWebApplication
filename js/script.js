$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
});

function validateGuildForm() {

    var guildName = document.getElementById("guild-name").value;
    var description = document.getElementById("description-message").value;
    var image = document.getElementById("imgInp").value;
    //var numeric = /^(?=.{3,20}$)(?!.* {3,})[a-zA-Z][a-zA-Z ]*[a-zA-Z]$/;

    document.getElementById("nameError").innerHTML = "";
    document.getElementById("descriptionError").innerHTML = "";
    document.getElementById("imgError").innerHTML = "";

    if (guildName.trim().length == 0 || guildName.trim().length > 20 || !isNaN(guildName)) {
        document.getElementById("nameError").innerHTML = ("Please enter a valid guild name!");
        return false;
    }
    if (description.trim().length == 0 || description.trim().length > 225 || !isNaN(description)) {
        document.getElementById("descriptionError").innerHTML = ("Please enter a valid description for your guild!");
        return false;
    }
    if (image.trim().length == 0 || !isNaN(image)) {
        document.getElementById("imgError").innerHTML = ("Please select a guild image!");
        return false;
    }

    return validateForm();
}

function validateGameForm(){
    
}
