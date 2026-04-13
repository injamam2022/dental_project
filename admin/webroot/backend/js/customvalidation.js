//---start Profile page Validation--------//
             var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        first_name: {
                                required: true,
                        },
                        last_name: {
                                required: true,
                        },
                        user_email: {
                                required: true,
                                email: true
                        },
						user_mobile_no: {
                                required: true,
                                maxlength: 10
                        },
						user_city: {
                                required: true,
                        },
						user_state: {
                                required: true,
                        },
						user_country: {
                                required: true,
                        },
						user_pincode: {
                                required: true,
                        },

                    }                                        
                });                                    

//---End Profile page Validation--------//


//---start Chanage Password page Validation--------//
             var changepassword = $("#changepassword").validate({
                ignore: [],
                rules: {                                            
					    password: {
                                required: true,
                                minlength: 5,
                                maxlength: 10
                        },
                        're-password': {
                                required: true,
                                minlength: 5,
                                maxlength: 10,
                                equalTo: "#password2"
                        },
                    }                                        
                });                                    

//---End Profile page Validation--------//



//---start Tour Packages Categories page Validation--------//
                                  

		    var tour_package_categories = $("#tour_package_categories").validate({
                ignore: [],
                rules: {                                            
                        category_name: {
                                required: true,
                        },
                        category_title: {
                                required: true,
                        },
                        group_id: {
                                required: true,
                        },

						category_desc: {
                                required: true,
                        },
						meta_title: {
                                required: true,
                        },
						meta_keywords: {
                                required: true,
                        },
						meta_desc: {
                                required: true,
                        },
						

                    }                                        
                });  
//---End Packages Categories page Validation--------//

/*------------Start Amenities Add Icon page Validation---------*/

    var add_amenities = $("#add_amenities").validate({
                ignore: [],
                rules: {                                            
                        title: {
                                required: true,
                        },
                        tag_icon: {
                                required: true,
                        },		

                    }                                        
                });  

/*------------End Amenities Add Icon page Validation---------*/



//---start PSA Management Validation--------//


var Psavalidate = $("#Psavalidate").validate({
         
		 ignore: [],
                rules: {                                            
                        login_name: {
                                required: true,
								  email: true,
                        },
                        	account_company_name: {
                                required: true,
                        },
                        	account_email: {
                                required: true,
                               email: true,
                        },
						account_mobile: {
                                required: true,
								 number: true,
								 minlength: 10,
                                maxlength: 10,
                        },
						 	
                        
							account_phone: {
                                required: true,
								 number: true,
								 minlength: 10,
                                maxlength: 10,
                     },
					
					   company_pan_name: {
                                required: true,
								 
                        },
							company_service_tx_nuber	: {
                                required: true,
								 
                        },
						company_pan_number: {
                                required: true,
								 
                        },
						account_balance: {
                                required: true,
								 number: true,
								
                        },
						
						
							person_name: {
                                required: true,
								 
                        },
						
							person_mobile: {
								required: true,
                                number: true,
								minlength: 10,
                                maxlength: 10,
								 
                        },
							person_email: {
                                required: true,
								  email: true,
                        },
						
						person_phone: {
                               required: true,
                                number: true,
								minlength: 10,
                                maxlength: 10,
								
                        },
							
						
						
						
					email_id: { required: true,
                               email: true,
                        },
						gender: {
                                required: true,
								 
                        },
						billing_street: {
                                required: true,
								 
                        },
						mobile: {
                                required: true,
								 number: true,
								 minlength: 10,
                                maxlength: 10
                        },
							billing_city: {
                                required: true,
								
                        },
							billing_state: {
                                required: true,
								
                        },
							billing_country: {
                                required: true,
							
                        },
							billing_pincode: {
                                required: true,
								number: true,
                        },
						 
						
						
						
				    } 



					
                });    
				
				var airline = $("#airline").validate({
                ignore: [],
                rules: {                                            
					   /* airline_name: {
                                required: true,
                               
                        },
						
						airline_code: {
                                required: true,
                               
                        },*/
                        
						airline_helpline_no: {
                                required: true,
                                number: true,
                        },
						
						support_emailid: {
                                required: true,
                                email: true,
                        },
                    }                                        
                });                                    

				
				
			var bank_details = $("#bank_details").validate({
                ignore: [],
                rules: {                                            
					    bank_name: {
                                required: true,
                               
                        },
						
						account_number: {
                                required: true,
                               
                        },
                        
						IFSC_Code: {
                                required: true,
                              
                        },
						
						
                    }                                        
                });                                    
	
				
				


//---End PSA Management Validation--------// 


/*------------Start Amenities Add Icon page Validation---------*/

    var login_form = $("#login_form").validate({
                ignore: [],
                rules: {                                            
                        user_email: {
                                required: true,
                        },
                        password: {
                                required: true,
                        },		

                    }                                        
                });  
/*------------End Amenities Add Icon page Validation---------*/


//---start Staff Management Validation--------//


var staffvalidate = $("#staffvalidate").validate({
         
		 ignore: [],
                rules: {                                            
                        first_name: {
                                required: true,
                        },
                        last_name: {
                                required: true,
                        },
						
						email: { required: true,
                               email: true,
                        },
						password: {
                                required: true,
                                minlength: 5,
                                maxlength: 10
                        },
                        'c_password': {
                                required: true,
                                minlength: 5,
                                maxlength: 10,
                                equalTo: "#password2"
                        },
						contact_number: {
                                required: true,
								 number: true,
								 minlength: 10,
                                maxlength: 10
                        },
						address: {
							
                               required: true,
                              },
							  
						 pincode:{
                                required: true,
								number: true,
								minlength: 6,
                                maxlength: 6
                        },
						
						user_country:{
                                required: true,
                        },
						
						username_id: {
							
                               required: true,
							   email:true,
                              },
						
				    }                                        
                });                                    


//---End  Staff Management Validation--------//


	//---start PSA Management Validation--------//
	
	
	//---start Page Management Validation--------//
	var add_page = $("#add_page").validate({
                ignore: [],
                rules: {                                            
                        page_title: {
                                required: true,
                        },
						permalink: {
                                required: true,
								
                        },
						page_icon: {
                                required: true,
                        },
						custom_link: {
                                required: true,
                        },
						page_description: {
                                required: true,
                        },
						page_status: {
                                required: true,
                        },
						seo_title: {
                                required: true,
                        },
						seo_keyword: {
                                required: true,
                        },
						seo_description: {
                                required: true,
                        },
						robot: {
                                required: true,
                        },
						

                    }                                        
                });
	
	//---start Page Management Validation--------//
	
	
	//---start Coupon Management Validation--------//
	
    var coupons = $("#coupons").validate({
                ignore: [],
                rules: {                                            
                        date_time: {
                                required: true,
                        },
						value: {
                                required: true,
								 number: true,
                        },
						coupon_code: {
                                required: true,
                        },
						expiry_date: {
                                required: true,
                        },	

                    }                                        
                });
	
	
	//---start Coupon Management Validation--------//





/*------------Start Forgot Password login page Validation---------*/

$(function() {
				$(".field").click(function(){
					$("#has-error").html("");
					$("#form-group").removeClass("has-error");
				});
				
				$(".validate").click(function(){
				
			    var hiturl = $('#hiturl').val();
				var ep_emailval = $('#email').val();
				if(ep_emailval==""){
                  $("#has-error").html("Please enter a valid email id or 10 digit phone number.");
                  $("#form-group").addClass("has-error");
				  return false;
				}
				else {
							var intRegex = /[0-9 -()+]+$/;
							if(intRegex.test(ep_emailval)) {
							  if (ep_emailval.length != 10)
							{
								$("#has-error").html("Please enter a valid mobile number.");
								$("#form-group").addClass("has-error");
								return false;
							}
							$('#email').attr('name', 'mobile_no');		
							} else {
										   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
											if(!emailReg.test(ep_emailval))
											{
												  $("#has-error").html("Please enter a valid email address.");
												  $("#form-group").addClass("has-error");
												 return false;
											}
							   $('#email').attr('name', 'emailid');										
							}
			
				}
				                       
									   var attrval=$("#email").attr("name");
									   	$.ajax({
										type: "POST",
										url: hiturl, 
										data: { fieldvalue: ep_emailval,fieldname:attrval},
									    beforeSend: function() {
												 $(".validate").attr("disabled", "disable");
												 $("#loading-image").show();
										        },										
										cache:false,
										 success: 
											  function(data){
												$(".validate").prop("disabled", false);
                                                 $("#loading-image").hide();											
												if(data=="notexist")
												{
													noty({text: 'You have not been registered with us yet.', layout: 'topRight', type: 'error'});
													
												}
												if(data=="exist")
												{
													noty({text: 'Your password has been successfully sent to your email address', layout: 'topRight', type: 'success'});
													
												}
											  }
										  });
			
			});
			});

/*------------End Forgot Password Login page Validation---------*/

/*------------start Add Banner Validation---------*/

var banner_home = $("#banner_home").validate({
         
		
                rules: {                                            
                        image_seo_title: {
                                required: true,
                        },
                        image_url_link: {
                                required: true,
                        },
						
						
						
						 uploadedimages:{
                                required: true,
                        },
						
						 
				    }                                        
                }); 
/*------------End Add Banner Validation---------*/

/*------------start Add TourHotel Validation---------*/

var add_hotel = $("#add_hotel").validate({
         
		
                rules: {                                            
                        hotel_name: {
                                required: true,
                        }, 
						property_type: {
                                required: true,
                        },
						status: {
                                required: true,
                        },
						hotel_location: {
                                required: true,
                        },
						hotel_desciption: {
                                required: true,
                        },
                         hotel_address: {
                                required: true,
                        },
						uploadedimages: {
                                required: true,
                        },
						hotel_starrating: {
                                required: true,
                                number: true,
                        },
						hotel_tripadvisor_widget: {
                                required: true,
                        },
						hotel_meta_title: {
                                required: true,
                        },
						hotel_meta_keywords: {
                                required: true,
                        },
						hotel_meta_desc: {
                                required: true,
                        },
                         hotel_check_in: {
                                required: true,
                        },
                        hotel_check_out: {
                                required: true,
                        },
						hotelpolicy: {
                                required: true,
                        },
                        hotel_email: {
                                required: true,
								email: true,
                        },
                        hotel_website: {
                                required: true,
                        },
						hotel_phone: {
                                required: true,
								number: true,
								minlength: 10,
                                maxlength: 10
                        },
                         
				    }                                        
                }); 
/*------------End TourHotel Validation---------*/

/*------------ Start Package Theme Validation---------*/
var Package_Theme = $("#Package_Theme").validate({
         
		
                rules: {                                            
                        title: {
                                required: true,
                        }, 
						thempos: {
                                required: true,
								number: true,
								minlength: 1,
                                maxlength: 10
                        },
						Currency: {
                                required: true,
								
                        },
						tbl_starting_at: {
                                required: true,
								
                        },
						file: {
                                required: true,
								
                        },
						 
				    }                                        
                }); 
/*------------ End Package Theme Validation---------*/

/*------------Start Amenities  Validation---------*/

    var add_amenitie = $("#add_amenitie").validate({
                ignore: [],
                rules: {                                            
                        title: {
                                required: true,
                        },
                       	

                    }                                        
                });  

/*------------End Amenities Package Setting Validation---------*/

/*------------Start Add Exclusions Package Setting  Validation---------*/

    var add_Exclusions = $("#add_Exclusions").validate({
                ignore: [],
                rules: {                                            
                        title: {
                                required: true,
                        },
                       	

                    }                                        
                });  

/*------------End Exclusions Package Setting Validation---------*/

/*------------Start Add Exclusions Package Setting  Validation---------*/

    var Exclusions_edit = $("#Exclusions_edit").validate({
                ignore: [],
                rules: {                                            
                        title: {
                                required: true,
                        },
                       	

                    }                                        
                });  

/*------------End Exclusions Package Setting Validation---------*/

/*------------Start Add  Package  Validation---------*/

    var package_general = $("#package_general").validate({
                ignore: [],
                rules: {                                            
                        package_name: {
                                required: true,
                        },
						package_descri: {
                                required: true,
                        },
						p_star_pr: {
                                required: true,
								number: true,
								minlength: 0,
                                maxlength: 1
                        },
                       	

                    }                                        
                });  

/*------------End  Package  Validation---------*/


