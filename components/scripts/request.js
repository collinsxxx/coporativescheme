$(document).ready(function(){

    get_pagination();
    get_pending_list();
    pendingRequest();
    totalAmount();
    CountMembers();
    LoadState();
    get_table_data();
    LoadSex();
    NxtKinSex();
    LoadBanks();
    LoadRelationship();
    Announcer();
    announcement_table();
    get_announcement_pagination();
    get_pending_list_pagination();
    get_debtors_list_pagination();
    get_debtors_list();

    function get_pagination(){
		$.ajax({
			url: '../components/modules/LoanTablepagination.php',
			data: "getnumber",
			success:function(html){
				$("#pagination").html(html);
			}
		});
    }
    
    function get_announcement_pagination(){
		$.ajax({
			url: '../components/modules/announcementPagination.php',
			data: "getAnnouncementPagination",
			success:function(html){
				$("#announcement_pagination").html(html);
			}
		});
    }
    
    function get_pending_list_pagination(){
		$.ajax({
			url: '../components/modules/pendingListPagination.php',
			data: "getPendingListPagination",
			success:function(html){
				$("#pendingList_pagination").html(html);
			}
		});
    }
    
    function get_debtors_list_pagination(){
		$.ajax({
			url: '../components/modules/debtorsListPagination.php',
			data: "getDebtorsListPagination",
			success:function(html){
				$("#debtorsList_pagination").html(html);
			}
		});
	}

    function CountMembers() {

         $.ajax({
            type: 'GET',
            url: '../components/modules/countMembers.php',
            data: "countMembers",
            success:function(html){
            $("#countMembers").html(html);
        }
        });
    }

    function totalAmount() {

        $.ajax({
           type: 'GET',
           url: '../components/modules/totalAmount.php',
           data: "totalAmount",
           success:function(html){
           $("#totalAmount").html(html);
       }
       });
   }

   function pendingRequest() {

        $.ajax({
            type: 'GET',
            url: '../components/modules/pendingRequest.php',
            data: "pendingRequest",
            success:function(html){
                $("#pendingRequest").html(html);
            }
        });
    }


   function NxtKinSex() {

            $.ajax({
                type: 'GET',
                url: '../components/modules/loadSex.php',
                data: "nxtKinSex",
                success:function(html){
                $("#nxtKinSex").html(html);
            }
        });
    }

    function Announcer() {

        $.ajax({
                type: 'GET',
                url: '../components/modules/announcer.php',
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
                url: '../components/modules/loadBanks.php',
                data: "loadBanks",
                success:function(html){
                $("#bankName").html(html);
            }
        });
    }

    function LoadRelationship() {

            $.ajax({
                type: 'GET',
                url: '../components/modules/loadRelationship.php',
                data: "loadRelationship",
                success:function(html){
                $("#nxtKinRelationship").html(html);
            }
        });
    }

    function LoadSex() {
        $.ajax({
            type: 'GET',
            url: '../components/modules/loadSex.php',
            data: "loadState",
            success:function(html){
            $("#sex").html(html);
        }
    });
    }

    function LoadState() {

            $.ajax({
                type: 'GET',
                url: '../components/modules/loadState.php',
                data: "loadState",
                success:function(html){
                $("#location").html(html);
            }
        });
    }

    function get_table_data(page){

        $.ajax({
            url: '../components/modules/getRequestTable.php',
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

    $("body").on("click", ".pagination_link", function(){
		var page = $(this).attr("id");
		get_table_data(page);
	});

    //manage the data
    function manage_data(data){
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
                row += '<td class="text-center upper" hidden>'+ value.token_id +'</td>';

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
                row += '<td class="text-center upper" data-id="'+ value.id +'">';
                row += '<button class="btn btn-success btn-sm approved"><i class="fa fa-thumbs-up"></i>  </button>';
                row += '<button class="btn btn-danger btn-sm declined"><i class="fa fa-thumbs-down"></i>  </button>';
                row += '<button class="btn btn-info btn-sm payMoney" data-toggle="modal" data-target="#PayMember" ><i class="fa fa-money"></i>  </button>';
                row += '</td>';
                row += '</tr>'; 
            });

        $("#loanRequestTable").html(row);

        
    }	


//    *****************************************


    // Pending request List
    function get_pending_list(page){

        $.ajax({
            url: '../components/modules/getPendingList.php',
            type: 'GET',
            data: {page:page},
            success:function(html){
				$("#pendingList").html(html);
			}
        });
    }

    // Pagination for Pending loans List
    $("body").on("click", ".pendinglist_link", function(){
		var page = $(this).attr("id");
		get_pending_list(page);
	});

    // 8***********************************


    //    *****************************************


    // Debtors List
    function get_debtors_list(page){

        $.ajax({
            url: '../components/modules/getDebtors.php',
            type: 'GET',
            data: {page:page},
            success:function(html){
				$("#debtorsList").html(html);
			}
        });
    }

    // Pagination for Pending loans List
    $("body").on("click", ".debtorsList_link", function(){
		var page = $(this).attr("id");
		get_debtors_list(page);
	});

    // 8***********************************




    $("body").on("click",".approved", function(){
        var reg_id = $(this).parent("td").data('id');
        // alert(reg_id);
        $.ajax({
            type: 'GET',
            url: '../components/modules/approvedRequest.php',
            data: {reg_id : reg_id },
            success:function(response){
            if(response == 'okay'){
                get_table_data();
                get_pending_list_pagination();
                get_pending_list();
                pendingRequest();
                Swal({
                    position: 'center',
                    type: 'success',
                    title: 'Loan Approved',
                    showConfirmButton: false,
                    timer: 2500
                    });
                }else{
                    get_pending_list();
                    pendingRequest();
                    get_table_data();
                    get_pending_list_pagination();
                    Swal({
                      type: 'error',
                      title: response,
                      text: 'Please go add your Referral Code on your profile',
                    })
                    // toastr.error(response,'Dange Alert',{timeOut:20000});
                }
            }
        });
    });

    $("body").on("click",".declined", function(){
        var reg_id = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../components/modules/declinedRequest.php',
            data: {reg_id : reg_id },
            success:function(response){
            if(response == 'okay'){
                get_table_data();
                get_pending_list_pagination();
                get_pending_list();
                pendingRequest();
                Swal({
                    position: 'center',
                    type: 'success',
                    title: 'Declined Request',
                    showConfirmButton: false,
                    timer: 2500
                    });
                }else{
                    get_table_data();
                    pendingRequest();
                    get_pending_list_pagination();
                    get_pending_list();
                    Swal({
                      type: 'error',
                      title: response,
                      text: 'Please go add your Referral Code on your profile',
                    })
                    // toastr.error(response,'Dange Alert',{timeOut:20000});
                }
            }
        });
    });


    $("#send_announcement").click(function(e){
        $('#create_announcement').validate({
            rules: {
                subject: {
                    required: true
                },
                message: {
                    required: true
                },
                announcer: {
                    required: true
                }
            },
            messages: {
                subject : "You are required to fill this field",
                message : "You are required to fill this field",
                announcer : "You are required to fill this field",
                
                
            },
              submitHandler: submitAnnouncement
        });

        function submitAnnouncement(){
            var data = $("#create_announcement").serialize();
            $.ajax({
                type: 'POST',
                url: '../components/modules/addAnnouncement.php',
                data: data,
                beforeSend: function(){
                    $("#send_announcement").html('Submitting Leave..');
                    $("#send_announcement").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 'created'){
                        announcement_table();
                        get_announcement_pagination();
                        $("#send_announcement").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#send_announcement").attr("disabled", false);
                        $("#create_announcement")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          position: 'center',
                          type: 'success',
                          title: 'Sent Announcement Successfully',
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }else{
                        announcement_table();
                        get_announcement_pagination();
                        $("#send_announcement").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#send_announcement").attr("disabled", false);
                        $("#create_announcement")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          type: 'error',
                          title: response,
                          text: 'Announcent Error',
                        })
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });// ends create ajax 
        }

    });


    function announcement_table(page){

        $.ajax({
            url: '../components/modules/getAnnoucement.php',
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


    // View Modal for members Table

    $("body").on("click",".payMoney", function(){
            var id = $(this).parent("td").data('id');
			var token_id = $(this).parent("td").prev("td").prev("td").text();
            var fullName = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            $("#PayMember").find("input[name='id']").val(id);
			$("#PayMember").find("input[name='fullName']").val(fullName);
			$("#PayMember").find("input[name='token_id']").val(token_id);
		// 	$("#trans-form").find("input[name='email']").val(email);
		// 	$("#trans-form").find("input[name='nexcop_account_no']").val(nexcop_account_no);
		// 	// $("#edit-material").find("input[name='quantity']").val(quantity);
		// 	// $("#edit-material").find(".edit-id").val(id);
    });
    
    $("#send").click(function(e){
        $('#pay_member').validate({
            rules: {
                fullName: {
                    required: true
                },
                amountReceived: {
                    required: true
                }
            },
            messages: {
                fullName : "You are required to fill this field",
                amountReceived : "You are required to fill this field",
                
                
            },
              submitHandler: submitForm
        });

        function submitForm(){
            var data = $("#pay_member").serialize();
            $.ajax({
                type: 'POST',
                url: '../components/modules/PayMember.php',
                data: data,
                beforeSend: function(){
                    $("#send").html('Submitting Leave..');
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 'okay'){
                        get_table_data();
                        totalAmount();
                        CountMembers();
                        get_pagination();
                        get_pending_list_pagination();
                        get_debtors_list_pagination();
                        get_pending_list();
                        get_debtors_list();
                        $("#send").html('Pay Member');
                        $("#send").attr("disabled", false);
                        $("#pay_member")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          position: 'center',
                          type: 'success',
                          title: 'Registration Successfull',
                          showConfirmButton: false,
                          timer: 2500
                        });
                    }else{
                        get_table_data();
                        totalAmount();
                        CountMembers();
                        get_pagination();
                        get_pending_list_pagination();
                        get_debtors_list_pagination();
                        get_pending_list();
                        get_debtors_list();
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#send").attr("disabled", false);
                        $("#pay_member")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                          type: 'error',
                          title: response,
                          text: 'Please go add your Referral Code on your profile',
                        })
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });// ends create ajax 
        }

    });
    
    
                            

    
                   



});

