$(document).ready(function(){

    $("#send").click(function(e){
        $('#verificationForm').validate({
            rules: {
                verificationCode: {
                    required: true
                }
            },
            messages: {
                verificationCode : "Please enter your 4 digit Verification Code",
                
                
            },
              submitHandler: submitForm
        });

        function submitForm(){
            var data = $("#verificationForm").serialize();
            $.ajax({
                type: 'POST',
                url: 'components/modules/verifying.php',
                data: data,
                beforeSend: function(){
                    $("#msg").fadeOut();
                    $("#msg2").html('Validating Verification Code ........');
                    $("#spinner").html('<img src="assets/build/images/loavding.gif">');
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == "okay"){
                        // $("#msg").html(response);
                        $("#msg2").html('Validating Verification Code ........');
                        $("#spinner").html('<img src="assets/build/images/loavding.gif"">');
                        window.location.href = "index.php";

                    }else{
                        $("#msg").fadeIn(1000,function(){
                            $("#msg").html('<div style="font-size: 14px;" class="alert btn-warning" role="alert"> '+response+' </div>');
                            $("#send").attr("disabled", false);
                            $("#spinner").html('');
                            $("#msg2").html('');
                            
                            // $("#createUser")[0].reset();
                        });
                    }


                }
            });// ends create ajax 
        }

    });
});