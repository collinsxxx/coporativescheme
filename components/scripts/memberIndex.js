$(document).ready(function(){

    get_announcement_pagination();
    announcement_table();
    get_table_data();
    individualContributionPagination();
    individualLoanRequestTable();
    individualLoanRequestPagination();
    totalAmount();
    totalDebtIndividual();
    UniqueIDDisplay();

    function totalAmount() {
        var id = $("#token_id").val();
        $.ajax({
           type: 'GET',
           url: '../../components/modules/totalIndividualAmount.php',
           data: {id:id},
           success:function(html){
           $("#totalContribution").html(html);
       }
       });
   }

   function UniqueIDDisplay() {
        var id = $("#token_id").val();
        $.ajax({
            type: 'GET',
            url: '../../components/modules/UniqueIDDisplay.php',
            data: {id:id},
            success:function(html){
            $("#UniqueIDDisplay").html(html);
        }
        });
    }

    function totalDebtIndividual() {
        var id = $("#token_id").val();
        $.ajax({
           type: 'GET',
           url: '../../components/modules/totalDebtIndividual.php',
           data: {id:id},
           success:function(html){
           $("#totalDebtIndividual").html(html);
       }
       });
   }

    function get_announcement_pagination(){
		$.ajax({
			url: '../../components/modules/announcementPagination.php',
			data: "getAnnouncementPagination",
			success:function(html){
				$("#announcement_pagination").html(html);
			}
		});
    }

    function individualContributionPagination() {
        var id = $("#token_id").val();
        $.ajax({
                type: 'GET',
                url: '../../components/modules/individualContributionPagination.php',
                data: {id:id},
                success:function(html){
                $("#individualContributionPagination").html(html);
            }
        });
    }

    function individualLoanRequestPagination() {
        var id = $("#token_id").val();
        $.ajax({
                type: 'GET',
                url: '../../components/modules/individualLoanRequestPagination.php',
                data: {id:id},
                success:function(html){
                $("#individualLoanRequestPagination").html(html);
            }
        });
    }

    function announcement_table(page){

        $.ajax({
            url: '../../components/modules/getAnnoucement.php',
            type: 'GET',
            data: {page:page},
            dataType: 'json',
            beforeSend: function(){

            }
        }).done(function(data){
            if (data.data != 'zero') {

                if(data.count != 0){
                //call manage data function
                announcement_data(data.data);
                }else{
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            }else{
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }

    $("body").on("click", ".announcement_link", function(){
		var page = $(this).attr("id");
		announcement_table(page);
	});

    //manage the data
    function announcement_data(data){
            var row = '';
            $.each(data, function(key, value){
                row += '<article class="media event">';
                row += '<a class="pull-left date">'; 
                row += '<p class="month">'+ value.announcementMonth +'</p>';  
                row += '<p class="day">'+ value.announcementDay +'</p>';
                row += '</a>';
                row += '<div class="media-body">';
                row += '<a style="font-size:110%" class="title" href="#">'+ value.subject +'</a>';
                row += '<p style="font-size:110%">'+ value.message +'</p>';
                row += '<i>By '+ value.announcer +'</i>';
                row += '</div>';
                row += '</article>'; 
            });

        $("#announcement_content").html(row);              

        
    }


    function get_table_data(page){
        var id = $("#token_id").val();

        $.ajax({
            url: '../../components/modules/getIndividualContributionList.php',
            type: 'GET',
            data: {id:id, page:page},
            dataType: 'json',
            beforeSend: function(){

            }
        }).done(function(data){
            if (data.data != 'zero') {

                if(data.count != 0){
                //call manage data function
                manage_data(data.data);
                }else{
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            }else{
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }

    $("body").on("click", ".Deductpagination_link", function(){
		var page = $(this).attr("id");
		get_table_data(page);
	});

    //manage the data
    function manage_data(data){
            var row = '';
            $.each(data, function(key, value){
                row += '<tr>';
                row += '<td  class="text-center upper">'+ value.transaction_code +'</td>'; 
                row += '<td class="text-center upper">'+ value.date +'</td>'; 
                row += '<td class="text-center upper">'+ value.unique_id +'</td>';  
                row += '<td class="text-center upper">'+ value.fullName +'</td>';
                row += '<td class="text-center upper">'+ value.contributionAmount +'</td>';
                row += '<td class="text-center upper" >'+ value.debtAmount +'</td>';
                row += '</tr>'; 
            });

        $("#individualContributionTable").html(row);

        
    }	


    function individualLoanRequestTable(page){
        var id = $("#token_id").val();
        $.ajax({
            url: '../../components/modules/getindividualLoanRequestTable.php',
            type: 'GET',
            data: {id:id, page:page},
            dataType: 'json',
            beforeSend: function(){

            }
        }).done(function(data){
            if (data.data != 'zero') {

                if(data.count != 0){
                //call manage data function
                manageindividualLoanRequestTable(data.data);
                }else{
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            }else{
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }

    $("body").on("click", ".individualLoanRequestTable_link", function(){
		var page = $(this).attr("id");
		individualLoanRequestTable(page);
	});

    //manage the data
    function manageindividualLoanRequestTable(data){
            var row = '';
            $.each(data, function(key, value){
                row += '<tr>';
                row += '<td scope="row" hidden>'+ value.id +'</td>'; 
                row += '<td class="text-center upper">'+ value.serialNo +'</td>';  
                row += '<td class="text-center upper">'+ value.date +'</td>';
                row += '<td class="text-center upper">'+ value.unique_id +'</td>';
                row += '<td class="text-center upper">'+ value.fullName +'</td>';
                row += '<td class="text-center upper">'+ value.amountRequested +'</td>';
                row += '<td class="text-center upper">'+ value.amountReceived +'</td>';
                row += '<td class="text-center upper">'+ value.refundDate +'</td>';

                row += '<td class="text-center upper" data-id="'+ value.id +'">';
                if(value.statues == 'PENDING'){
                	row += '<span class="badge bg-orange">'+value.statues+'</span>'; 
                }else if(value.statues == 'APPROVED'){
                	row += '<span class="badge bg-green">'+value.statues+'</span>';
                }else if(value.statues == 'DECLINED'){
                	row += '<span class="badge bg-red">'+value.statues+'</span>';
                }
                row += '</td>';
                // button part
                row += '</tr>'; 
            });

        $("#individualLoanRequestTable").html(row);

    }


    $("#send").click(function(e){
        $('#requestForLoan').validate({
            rules: {
                amountRequested: {
                    required: true
                },
                refundDate: {
                    required: true
                }
            },
            messages: {
                amountRequested : "You are required to fill this field",
                refundDate : "You are required to fill this field",
                
                
            },
              submitHandler: submitrequestForLoan
        });

        function submitrequestForLoan(){
            var data = $("#requestForLoan").serialize();
            $.ajax({
                type: 'POST',
                url: '../../components/modules/sentIndividualRequest.php',
                data: data,
                beforeSend: function(){
                    $("#send").html('Submitting Leave..');
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 'created'){
                        individualLoanRequestTable();
                        individualLoanRequestPagination();
                        $("#send").html('Send Request');
                        $("#send").attr("disabled", false);
                        $("#requestForLoan")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          position: 'center',
                          type: 'success',
                          title: 'Loan Request has Been Successfully',
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }else{
                        individualLoanRequestTable();
                        individualLoanRequestPagination();
                        $("#send").html('Send Request');
                        $("#send").attr("disabled", false);
                        $("#requestForLoan")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          type: 'error',
                          title: response,
                          text: 'Please Check the` Error',
                        })
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });// ends create ajax 
        }

    });




});