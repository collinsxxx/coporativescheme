$(document).ready(function(){

    get_Contributionpagination();
    get_Deductpagination();
    get_contribution_table_data();
    pendingRequest();
    totalAmount();
    CountMembers();
    // LoadState();
    get_table_data();
    // LoadSex();
    // NxtKinSex();
    // LoadBanks();
    // LoadRelationship();
    // Announcer();
    // announcement_table();
    // get_announcement_pagination();
    // get_pending_list_pagination();

    function get_Contributionpagination(){
		$.ajax({
			url: '../../components/modules/Contributionpagination.php',
			data: "getContributionpagination",
			success:function(html){
				$("#Contributionpagination").html(html);
			}
		});
    }
    
    function get_Deductpagination(){
		$.ajax({
			url: '../../components/modules/DeductPagination.php',
			data: "getDeductPagination",
			success:function(html){
				$("#DeductPagination").html(html);
			}
		});
    }
    
    function get_pending_list_pagination(){
		$.ajax({
			url: '../../components/modules/pendingListPagination.php',
			data: "getPendingListPagination",
			success:function(html){
				$("#pendingList_pagination").html(html);
			}
		});
	}

    function CountMembers() {

         $.ajax({
            type: 'GET',
            url: '../../components/modules/countMembers.php',
            data: "countMembers",
            success:function(html){
            $("#countMembers").html(html);
        }
        });
    }

    function totalAmount() {

        $.ajax({
           type: 'GET',
           url: '../../components/modules/totalAmount.php',
           data: "totalAmount",
           success:function(html){
           $("#totalAmount").html(html);
       }
       });
   }

   function pendingRequest() {

        $.ajax({
            type: 'GET',
            url: '../../components/modules/pendingRequest.php',
            data: "pendingRequest",
            success:function(html){
                $("#pendingRequest").html(html);
            }
        });
    }


   function NxtKinSex() {

            $.ajax({
                type: 'GET',
                url: '../../components/modules/loadSex.php',
                data: "nxtKinSex",
                success:function(html){
                $("#nxtKinSex").html(html);
            }
        });
    }

    function Announcer() {

        $.ajax({
                type: 'GET',
                url: '../../components/modules/announcer.php',
                data: "announcer",
                success:function(html){
                $("#announcer").html(html);
            }
        });
    }

    function testSwal() {

        $("body").on("click","#swal", function(){
            // toastr.error("Worked",'Dange Alert',{timeOut:20000});
            Swal({
                position: 'center',
                type: 'success',
                title: 'Registration Successfull',
                showConfirmButton: false,
                timer: 2500
              });
              
        });
    }

    function LoadBanks() {

            $.ajax({
                type: 'GET',
                url: '../../components/modules/loadBanks.php',
                data: "loadBanks",
                success:function(html){
                $("#bankName").html(html);
            }
        });
    }

    function LoadRelationship() {

            $.ajax({
                type: 'GET',
                url: '../../components/modules/loadRelationship.php',
                data: "loadRelationship",
                success:function(html){
                $("#nxtKinRelationship").html(html);
            }
        });
    }

    function LoadSex() {
        $.ajax({
            type: 'GET',
            url: '../../components/modules/loadSex.php',
            data: "loadState",
            success:function(html){
            $("#sex").html(html);
        }
    });
    }

    function LoadState() {

            $.ajax({
                type: 'GET',
                url: '../../components/modules/loadState.php',
                data: "loadState",
                success:function(html){
                $("#location").html(html);
            }
        });
    }

    function get_table_data(page){

        $.ajax({
            url: '../../components/modules/getMembersforContribution.php',
            type: 'GET',
            data: {page:page},
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
                row += '<td scope="row" hidden>'+ value.id +'</td>'; 
                row += '<td class="text-center upper">'+ value.unique_id +'</td>';  
                row += '<td class="text-center upper">'+ value.fullName +'</td>';
                row += '<td class="text-center upper" hidden>'+ value.token_id +'</td>';
                row += '<td class="text-center upper">'+ value.contributionAmount +'</td>';
                // button part
                row += '<td class="text-center upper" data-id="'+ value.id +'">';
                row += '<button class=" btn btn-primary btn-sm contribution"  data-toggle="modal" data-target="#contribution"> <i class="fa fa-money"></i> Dedute </button>';
                // row += '<button class=" btn btn-primary btn-sm delete-members" id="delete_member"> <i class="fa fa-trash"></i> </button>'; 
                row += '</td>';
                row += '</tr>'; 
            });

        $("#membersContent").html(row);

        
    }	

    $("body").on("click",".contribution", function(){
        var id = $(this).parent("td").data('id');
        var token_id = $(this).parent("td").prev("td").prev("td").text();
        var unique_id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
        var fullName = $(this).parent("td").prev("td").prev("td").prev("td").text();
        $("#contribution").find("input[name='reg_no']").val(id);
        $("#contribution").find("input[name='unique_id']").val(unique_id);
        $("#contribution").find("input[name='fullName']").val(fullName);
        $("#contribution").find("input[name='token_id']").val(token_id);
    // 	$("#trans-form").find("input[name='email']").val(email);
    // 	$("#trans-form").find("input[name='nexcop_account_no']").val(nexcop_account_no);
    // 	// $("#edit-material").find("input[name='quantity']").val(quantity);
    // 	// $("#edit-material").find(".edit-id").val(id);
});


    $("#send").click(function(e){
        $('#monthly_contribution').validate({
            rules: {
                contributionAmount: {
                    required: true
                }
            },
            messages: {
                contributionAmount : "You are required to fill this field",
                
                
            },
              submitHandler: submitForm
        });

        function submitForm(){
            var data = $("#monthly_contribution").serialize();
            $.ajax({
                type: 'POST',
                url: '../../components/modules/addMembersContribution.php',
                data: data,
                beforeSend: function(){
                    $("#send").html('Submitting Leave..');
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 'okay'){
                        get_table_data();
                        get_contribution_table_data();
                        totalAmount();
                        CountMembers();
                        get_pagination();
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#send").attr("disabled", false);
                        $("#monthly_contribution")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          position: 'center',
                          type: 'success',
                          title: 'Contribution Has Been Added Successfull',
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }else{
                        get_table_data();
                        get_contribution_table_data();
                        totalAmount();
                        CountMembers();
                        get_pagination();
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#send").attr("disabled", false);
                        $("#monthly_contribution")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          type: 'error',
                          title: response,
                          text: 'Please go add your Recheck your Codes',
                        })
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });// ends create ajax 
        }

    });


    //    *****************************************



    function get_contribution_table_data(page){

        $.ajax({
            url: '../../components/modules/getContributionTable.php',
            type: 'GET',
            data: {page:page},
            dataType: 'json',
            beforeSend: function(){

            }
        }).done(function(data){
            if (data.data != 'zero') {

                if(data.count != 0){
                //call manage data function
                manage_contribution_data(data.data);
                }else{
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            }else{
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }

    $("body").on("click", ".Contributionpagination_link", function(){
		var page = $(this).attr("id");
		get_contribution_table_data(page);
	});

    //manage the data
    function manage_contribution_data(data){
            var row = '';
            $.each(data, function(key, value){
                row += '<tr>';
                row += '<td  class="text-center upper">'+ value.transaction_code +'</td>'; 
                row += '<td class="text-center upper">'+ value.date +'</td>'; 
                row += '<td class="text-center upper">'+ value.unique_id +'</td>';  
                row += '<td class="text-center upper">'+ value.fullName +'</td>';
                row += '<td class="text-center upper">'+ value.contributionAmount +'</td>';
                row += '<td class="text-center upper" >'+ value.debtAmount +'</td>';
                row += '<td class="text-center upper" >'+ value.authorised_name +'</td>';
                // button part
                row += '<td class="text-center upper" data-id="'+ value.id +'">';
                row += '<button class=" btn btn-primary btn-sm viewContribution"  data-toggle="modal" data-target="#viewContribution"> <i class="fa fa-eye"></i> </button>';
                // row += '<button class=" btn btn-primary btn-sm delete-members" id="delete_member"> <i class="fa fa-trash"></i> </button>'; 
                row += '</td>';
                row += '</tr>'; 
            });

        $("#contributionContent").html(row);

        
    }	
    
    
                            

    
                   



});

