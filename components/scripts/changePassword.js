$(document).ready(function(){
    loadCheck();
    
    function loadCheck() {
        $(document).on("keyup","#password2",function(){
            var pass2 = $(this).val();
            var pass1 = $("#password1").val();
    
            if(pass1 != pass2){
                $("#msg").html('<div style="font-size: 14px;" class="alert btn-danger text-center" role="alert"> Password does not match </div>');
            }else if(pass1 == pass2){
                $("#msg").html('<div style="font-size: 14px;" class="alert btn-success text-center" role="alert"> <i class="fa fa-check"></i> Password match  </div>');
            }
        });
    }


    $("#send").click(function(e){
        $('#changePassword').validate({
            rules: {
                password1: {
                    required: true
                },
                password2: {
                    required: true
                }
                
            },
            messages: {
                surname : "You are required to fill this field",
                othername : "You are required to fill this field",
                
                
            },
              submitHandler: submitForm
        });

               function submitForm(){
            var data = $("#changePassword").serialize();
            
            $.ajax({
                type: 'POST',
                url: '../../components/modules/changePassword.php',
                data: data,
                beforeSend: function(){
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 'created'){
                        $("#changePassword")[0].reset();
                        $("#msg").html('');
                        Swal({
                          position: 'center',
                          type: 'success',
                          title: 'Password Changed',
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }else{
                        $("#changePassword")[0].reset();
                        $("#msg").html('');
                        Swal({
                          position: 'center',
                          type: 'error',
                          title: response,
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }
                }
            });// ends create ajax 
        }

    });

    	




});