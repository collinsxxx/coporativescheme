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

    function get_pagination(){
		$.ajax({
			url: '../../components/modules/pagination.php',
			data: "getnumber",
			success:function(html){
				$("#pagination").html(html);
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
            url: '../../components/modules/getMembers.php',
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
                row += '<td class="text-center upper">'+ value.unique_id +'</td>';  
                row += '<td class="text-center upper">'+ value.surname +'</td>';
                row += '<td class="text-center upper">'+ value.lastName +'</td>';
                row += '<td class="text-center upper">'+ value.location +'</td>';
                row += '<td class="text-center upper">'+ value.dateJoined +'</td>';
                row += '<td class="text-center upper">'+ value.contributionAmount +'</td>';

                row += '<td class="text-center upper" data-id="'+ value.id +'">';
                if(value.statues == 1){
                	row += '<button style="background-color:white" class="btn deactivate"><i style="color:green; font-size:140%" class="fa fa-toggle-on"></i></button> '; 
                }else if(value.statues == 2){
                	row += '<button style="background-color:white" class="btn activate"><i style="color:green; font-size:140%" class="fa fa-toggle-off"></i></button>';
                }
                row += '</td>';
                // button part
                row += '<td class="text-center upper" data-id="'+ value.id +'">';
                row += '<button class=" btn btn-primary btn-sm view-members"  data-toggle="modal" data-target="#view-members"> <i class="fa fa-eye"></i> </button>';
                row += '<button class=" btn btn-primary btn-sm delete-members" id="delete_member"> <i class="fa fa-trash"></i> </button>'; 
                row += '</td>';
                row += '</tr>'; 
            });

        $("#membersContent").html(row);

        
    }	


    $("#send").click(function(e){
        $('#createUser').validate({
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
                sex: {
                    required: true
                },
                mobileNumber: {
                    required: true
                },
                emailAddress: {
                    required: true
                },
                location: {
                    required: true
                },
                contributionAmount: {
                    required: true
                },
                nxtKinName: {
                    required: true
                },
                nxtKinAddress: {
                    required: true
                },
                nxtKinRelationship: {
                    required: true
                },
                nxtKinNumber: {
                    required: true
                },
                nxtKinSex: {
                    required: true
                },
                bankAccountNumber: {
                    required: true
                },
                bankName: {
                    required: true
                }
            },
            messages: {
                surname : "You are required to fill this field",
                othername : "You are required to fill this field",
                homeAddress : "You are required to fill this field",
                mobileNumber : "You are required to fill this field",
                sex : "You are required to fill this field",
                emailAddress : "You are required to fill this field",
                location : "You are required to fill this field",
                contributionAmount : "You are required to fill this field",
                nxtKinName : "You are required to fill this field",
                nxtKinNumber : "You are required to fill this field",
                nxtKinAddress : "You are required to fill this field",
                nxtKinSex : "You are required to fill this field",
                nxtKinRelationship : "You are required to fill this field",
                bankAccountNumber : "You are required to fill this field",
                bankName : "You are required to fill this field",
                
                
            },
              submitHandler: submitForm
        });

        function submitForm(){
            var data = $("#createUser").serialize();
            $.ajax({
                type: 'POST',
                url: '../../components/modules/addMembers.php',
                data: data,
                beforeSend: function(){
                    $("#send").html('Submitting Leave..');
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 'created'){
                        get_table_data();
                        totalAmount();
                        CountMembers();
                        get_pagination();
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#send").attr("disabled", false);
                        $("#createUser")[0].reset();
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
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#send").attr("disabled", false);
                        $("#createUser")[0].reset();
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


    //    *****************************************


    // Pending request List
    function get_pending_list(page){

        $.ajax({
            url: '../../components/modules/getPendingList.php',
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



    $("body").on("click",".deactivate", function(){
        var reg_id = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../../components/modules/deactivate.php',
            data: {reg_id : reg_id },
            success:function(response){
            if(response == 'okay'){
                get_table_data();
                Swal({
                    position: 'center',
                    type: 'success',
                    title: 'User has been Deactivated',
                    showConfirmButton: false,
                    timer: 2500
                    });
                }else{
                    get_table_data();
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

    $("body").on("click",".activate", function(){
        var reg_id = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../../components/modules/activate.php',
            data: {reg_id : reg_id },
            success:function(response){
            if(response == 'okay'){
                get_table_data();
                Swal({
                    position: 'center',
                    type: 'success',
                    title: 'User has been Activated',
                    showConfirmButton: false,
                    timer: 2500
                    });
                }else{
                    get_table_data();
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
                url: '../../components/modules/addAnnouncement.php',
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


    // View Modal for members Table

    $("body").on("click",".view-members", function(){
        var id = $(this).parent("td").data('id');
        // alert(id);

        view_single_profile(id);
    });

    function view_single_profile(link){

        $.ajax({
            url: '../../components/modules/getProfile.php',
            type: 'GET',
            data: {link:link},
            dataType: 'json',
            beforeSend: function(){

            }
        }).done(function(data){
            if (data.data != 'zero') {

                if(data.count != 0){
                //call manage data function
                view_member(data.data);
                }else{
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            }else{
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }


    // view a Single member profile function
    function view_member(data){
        row = '';
        $.each(data, function(key, value){
            // row += '<div class="col-xs-6" >';
            row += '<div class="table-responsive">';
            row += '<table class="table">'; 
            row += '<tbody>';
            row += '<tr>';
            row += '<th style="width:50%">Unique ID : </th>';
            row += '<td>'+ value.unique_id +'</td>';
            row += '</tr>';
            row += '<tr>';
            row += '<th style="width:50%">Fullname : </th>';
            row += '<td>'+ value.fullName +'</td>';
            row += '</tr>';
            row += '<tr>';
            row += '<th style="width:50%">Home Addresws : </th>';
            row += '<td>'+ value.homeAddress +'</td>';
            row += '</tr>';
            row += '<tr>';
            row += '<th style="width:50%">mobile Number : </th>';
            row += '<td>'+ value.mobileNumber +'</td>';
            row += '</tr>';
            row += '<tr>';
            row += '<th style="width:50%">Email Address : </th>';
            row += '<td>'+ value.emailAddress +'</td>';
            row += '</tr>';
            row += '</tbody>';
            row += '</table>';
            row += '</div>';
            // row += '</div>'; 
        });

        $("#view_profile").html(row);                          

    }

    $("body").on("click",".delete-members", function(){
        var id = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../../components/modules/deleteMember.php',
            data: {id : id },
            success:function(response){
            if(response == 'okay'){
                get_table_data();
                CountMembers();
                Swal({
                    position: 'center',
                    type: 'success',
                    title: 'Successfully Deleted',
                    showConfirmButton: false,
                    timer: 2500
                    });
                }else{
                    get_table_data();
                    CountMembers();
                    Swal({
                      type: 'error',
                      title: response,
                      text: 'Please Check your error.',
                    })
                    // toastr.error(response,'Dange Alert',{timeOut:20000});
                }
            }
        });
    });
    
    
                            

    
                   



});

