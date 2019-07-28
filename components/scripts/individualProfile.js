$(document).ready(function(){
    autoLogOut();
    $('#send').hide();
    $('#label_image').hide();
    

	loadProfile();
    loadbuttons();
    image_loaded();
    loadProfileImage();
    

    function autoLogOut() {
        var id = $("#statues").val();
            if(id == 0){
                window.location.href = "../../index.php";
            }
        }

	function loadbuttons() {
		$('#editButton').click(function(){
        $('#send').show();
        $('#label_image').show();
		$('#surname').attr('disabled',false);
		$('#othername').attr('disabled',false);
		$('#homeAddress').attr('disabled',false);
		$('#mobileNumber').attr('disabled',false);
		$('#emailAddress').attr('disabled',false);
		$('#nxtKinName').attr('disabled',false);
		$('#nxtKinNumber').attr('disabled',false);
        $('#nxtKinAddress').attr('disabled',false);
		$('#editButton').hide();
		// $('#table1').show();
		// $('#show_table1').hide();
		// $('#show_table2').show();
	});
    }
       
    


    $("#send").click(function(e){
        $('#updateProfile').validate({
            rules: {
                surname: {
                    required: true
                },
                othername: {
                    required: true
                },
                homeAddress: {
                    required: true
                },
                mobileNumber: {
                    required: true
                },
                emailAddress: {
                    required: true
                },
                nxtKinName: {
                    required: true
                },
                nxtKinNumber: {
                    required: true
                },
                nxtKinAddress: {
                    required: true
                }
                
            },
            messages: {
                surname : "You are required to fill this field",
                othername : "You are required to fill this field",
                homeAddress : "You are required to fill this field",
                mobileNumber : "You are required to fill this field",
                emailAddress : "You are required to fill this field",
                nxtKinName : "You are required to fill this field",
                nxtKinNumber : "You are required to fill this field",
                nxtKinAddress : "You are required to fill this field",
                
                
            },
              submitHandler: submitForm
        });

               function submitForm(){
            var data = $("#updateProfile").serialize();
            
            $.ajax({
                type: 'POST',
                url: '../../components/modules/updateProfile.php',
                data: data,
                beforeSend: function(){
                    $("#send").attr("disabled", true);
                    autoLogOut();
                },	
                success: function(response){
                    if (response == 'created'){
                        autoLogOut();
                        loadProfile();
                        $("#send").attr("disabled", false);
                        loadbuttons();
                        loadProfileImage();
                        $('#send').hide();
                        $('#label_image').hide();
                        $('#msg').attr('hidden',true);
                        $('#editButton').show();
                        Swal({
                          position: 'center',
                          type: 'success',
                          title: 'Profile Updated',
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }else{
                        loadProfile();
                        loadProfileImage();
                        $('#msg').attr('hidden',true);;
                        $('#send').hide();
                        $('#label_image').hide();
                        $('#editButton').show();
                        Swal({
                          position: 'center',
                          type: 'error',
                          title: response,
                          showConfirmButton: false,
                          timer: 2500
                        });;
                    }
                }
            });// ends create ajax 
        }

    });

    function loadProfile() {
        var id = $("#token_id").val();

        $.ajax({
            type: 'GET',
            url: '../../components/modules/loadPersonalProfile.php',
            data: {id : id },
            dataType: 'json',
            }).done(function(data){
                manageProfile(data.data);

        });
    }

    //manage the data
    function manageProfile(data){
        var row = '';
        $.each(data, function(key, value){
            
            row += '<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">'; 
            row += '<h2>Personal Details</h2>'; 
            row += '</div>';

            row += '<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">'; 
            
            row += '<input type="text" class="form-control has-feedback-left" id="surname" name="surname" disabled value="'+ value.surname +'">'; 
            row += '<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>';
            row += '</div>'; 

            row += '<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row += '<input type="text" class="form-control" id="othername" name="othername" placeholder="Other Name" disabled value="'+ value.othername +'">'; 
            row += '<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>';
            row += '</div>';

            row +='<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">';
            row +='<textarea class="form-control" rows="3" id="homeAddress" name="homeAddress" placeholder="Home Address" disabled>'+ value.homeAddress +'</textarea>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row +='<input type="text" class="form-control has-feedback-left" id="mobileNumber" name="mobileNumber" disabled value="'+ value.mobileNumber +'">';
            row +='<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row +='<input type="text" class="form-control" id="emailAddress" name="emailAddress" disabled value="'+ value.emailAddress +'">';
            row +='<span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>';
            row +='</div>'

            row +='<div style="margin-bottom: 2%" class="clearfix"></div>';

            row +='<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">';
            row +='<h2>Next of Kin Details</h2>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row +='<input type="text" class="form-control has-feedback-left" id="nxtKinName" name="nxtKinName" disabled value="'+ value.nxtKinName +'">';
            row +='<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row +='<input type="text" class="form-control" id="nxtKinNumber" name="nxtKinNumber" disabled value="'+ value.nxtKinNumber +'">';
            row +='<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>';
            row +='</div>'

            row +='<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">';
            row +='<textarea class="form-control" rows="3" id="nxtKinAddress" name="nxtKinAddress" disabled>'+ value.nxtKinAddress +'</textarea>';
            row +='</div>';

            row +='<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">';
            row +='<h2>Bank Details</h2>';
            row +='<i>*To Change your Bank Details please contact the administrative officer.</i>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row +='<input type="text" class="form-control has-feedback-left" id="bankAccountNumber" name="bankAccountNumber" disabled value="'+ value.bankAccountNumber +'">';
            row +='<span class="fa fa-qrcode form-control-feedback left" aria-hidden="true"></span>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">';
            row +='<select class="select2_single form-control" id="bankName" name="bankName" tabindex="-1" disabled>';
            row +='<option value="0">'+ value.bankName +'</option>';
            row +='</select';
            row +='</div>';
            row +='</div> <i>*To Change your Bank Details please contact the administrative officer</i>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12">';
            row +='<div class="form-group">';
            row +='<input type="hidden" id="img_show" name="img_show" class="form-control" value="'+ value.imageLink +'">';
            row +='</div>';
            row +='</div>';

            row +='<div class="col-md-6 col-sm-6 col-xs-12 form-group">';
            row +='<span id="uploaded_image">';
            row +='</span>';
            row +='</div>';
            row +='<br/>';
            row += '<input type="hidden" class="form-control has-feedback-left" id="id_no" name="id_no" readonly value="'+ value.id +'">'; 
            
    
        });

        $("#profileContent").html(row);
    }

    function image_loaded() {
        $(document).on("change","#img_file", function(){
            var property = document.getElementById("img_file").files[0];
            var image_name = property.name;
            var	image_extension = image_name.split(".").pop().toLowerCase();
            var image_size = property.size;
            if ($.inArray(image_extension,["png","jpg","jpeg"]) === -1) {
                $("#msg").html("<div class='alert alert-danger' role='alert'>Invalid Format Selected</div>");
                // alert("invalid Image Format");
            }
            
            if (image_size > 200000) {
                $("#msg").html("<div class='alert alert-warning' role='alert'>Image File is too large</div>");
                // alert("invalid Image size");
            }
            else if (image_size <= 200000)
            {
                $("#msg").html("<div class='alert alert-success' role='alert'>This Image is Okay</div>");
                $("#img_show").val(image_name);
                var form_data = new FormData();
                form_data.append("img_file", property);
                $.ajax({
                    url:"../../components/modules/loadImage.php",
                    method:"POST",
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $("#uploaded_image").html("<label class='atext-success' >Uploading Image ...</label>");
                    },
                    success:function(data){
                        $("#uploaded_image").html(data);

                    }
                });
            }
        });
    }

    function loadProfileImage(){
        var id = $("#token_id").val();

        $.ajax({
            url: '../../components/modules/getProfileImage.php',
            type: 'GET',
            data: { id : id },
            dataType: 'json',
            beforeSend: function(){

            }
        }).done(function(data){
            if (data.data != 'zero') {

                if(data.count != 0){
                //call manage data function
                manageprofileImageContent(data.data);
                }else{
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            }else{
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }

    //manage the data
    function manageprofileImageContent(data){
            var row = '';
            $.each(data, function(key, value){
                row += '<img src="../../uploads/images/'+ value.imageLink +'" alt="..." class="img-circle profile_img">';
            });

        $("#profileImageContent").html(row);
    }	




});