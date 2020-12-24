$(document).on('click','.premade',function(e){
			var id = $(this).data('premade');
			$('#f6,#f7,#f8').trigger('reset');
			console.log(id);
			$.ajax({
				url:"index.php",
				type:"POST",
				dataType:"JSON",
				data:{'req':'getdata','id':id},
				success:function(res) {
					console.log(res);
					$('#myModal').modal('hide');
					$('#teamID').val(res.team_id);
					if(res.team_id!="") $('.eteamid').addClass('d-none');else $('.eteamid').removeClass('d-none');
					$('.teamid').html(res.team_id);
					$('#name').val(res.name);
					if(res.name!="") $('.ename').addClass('d-none');else $('.ename').removeClass('d-none');
					$('.cname').html(res.name);
					$('#category,.ccategory').val(res.category);
					$('#models').tagsinput('removeAll');
					$('.cmodels').empty();
					$('#models').tagsinput('add',res.model);
					$('#color').val(res.color);
					$('.ccolor').html(res.color);
					$('#description').val(res.job_desc);
					if(res.job_desc!="") $('.edesc').addClass('d-none');else $('.edesc').removeClass('d-none');
					$('.cdescription').html(res.job_desc);
					$('#command').val(res.command);
					if(res.command!="") $('.ecommand').addClass('d-none');else $('.ecommand').removeClass('d-none');
					$('.ccommand').html(res.command);
					$('#weapons').tagsinput('removeAll');
					if(res.weapons!="") $('.eweapons').addClass('d-none');else $('.eweapons').removeClass('d-none');
					$('.cweapons').empty();
					$('#weapons').tagsinput('add',res.weapons);
					$('#change').val(res.changes);
					
					$('#health').val(res.health);
					$('#armor').val(res.armor);
					$('.cchange').html("NeedToChangeFrom = "+res.changes+',');
					if(res.changes!="") {
						  $('.echange').removeClass('d-none');
					   } else {
						  $('.echange').addClass('d-none');
					   }
					$('#salary').val(res.salary);
					if(res.salary!="") $('.esalary').addClass('d-none');else $('.esalary').removeClass('d-none');
					$('.csalary').html(res.salary);
					$('#max').val(res.max);
					if(res.command!="") $('.emax').addClass('d-none');else $('.emax').removeClass('d-none');
					$('.cmax').html(res.max);
					if(res.access=='0') {
						$('#access option[value="0"]').prop('selected',true);
						$('.caccess').html(res.access);
					} else if(res.access=="1") {
						$('#access option[value="1"]').prop('selected',true);
						$('.caccess').html(res.access);
					} else if(res.access=="2") {
						$('#access option[value="2"]').prop('selected',true);
						$('.caccess').html(res.access);
					}
					if(res.vote=="true") {
						$('#access option[value="true"]').prop('selected',true);
						$('.caccess').html("true");
					} else if(res.vote=="false") {
						$('#access option[value="false"]').prop('selected',true);
						$('.caccess').html("false");
					} 
					if(res.license=="true") {
						$('#license option[value="true"]').prop('selected',true);
						$('.clicense').html("true");
					} else if(res.license=="false") {
						$('#license option[value="false"]').prop('selected',true);
						$('.clicense').html("false");
					}
					if(res.demote=="true") {
						$('#demote option[value="true"]').prop('selected',true);
						$('.candemote').html(res.access);
					} else if(res.demote=="false") {
						$('#demote option[value="false"]').prop('selected',true);
						$('.candemote').html(res.access);
					}
					if($(res.access).val()!="") {
						$('.eaccess').addClass('d-none').html(' Access field is required,  &nbsp;');
					} else $('.eaccess').removeClass('d-none');
					if($(res.vote).val()!="") {
						$('.evote').addClass('d-none').html(' Vote field is required,  &nbsp;');
					} else $('.evote').removeClass('d-none');
					if($(res.license).val()!="") {
						$('.elicense').addClass('d-none').html(' License field is required,  &nbsp;');
					} else $('.elicense').removeClass('d-none');
					if($('#demote').val()!="") {
						$('.edemote').addClass('d-none').html(' Demote field is required,  &nbsp;');
					} else $('.edemote').removeClass('d-none');
					///////////////////  TYPE ON
					if(res.type=="on") { 
						$('#type').attr('checked','checked');
						$('.typec').removeClass('d-none');
						$('.typess').removeClass('d-none');
						if($('#mayor').val()==1){
							  $('.mayor').removeClass('d-none');
						  }
						  if($('#chief').val()==1) {
							  $('.chief').removeClass('d-none');
						  }
						  if($('#medic').val()==1) {
							  $('.medic').removeClass('d-none');
						  }
						  if($('#cook').val()==1) {
							  $('.cook').removeClass('d-none');
						  }
						  if($('#hobo').val()==1) {
							  $('.hobo').removeClass('d-none');
						  }
						$grid.masonry('layout');
						if(res.mayor=="1") {
							$('#mayor option[value="1"]').prop('selected',true);
							$('.mayor').html('mayor = true,').removeClass('d-none');
						} else {
							$('#mayor option[value="0"]').prop('selected',true);
							$('.mayor').html('').addClass('d-none');
						}
						if(res.chief=="1") {
							$('#chief option[value="1"]').prop('selected',true);
							$('.chief').html('chief = true,').removeClass('d-none');
						} else {
							$('#chief option[value="0"]').prop('selected',true);
							$('.chief').html('').addClass('d-none');
						}
						if(res.medic=="1") {
							$('#medic option[value="1"]').prop('selected',true);
							$('.medic').html('medic = true,').removeClass('d-none');
						} else {
							$('#medic option[value="0"]').prop('selected',true);
							$('.medic').html('').addClass('d-none');
						}
						if(res.cook=="1") {
							$('#cook option[value="1"]').prop('selected',true);
							$('.cook').html('cook = true,').removeClass('d-none');
						} else {
							$('#cook option[value="0"]').prop('selected',true);
							$('.cook').html('').addClass('d-none');
						}
						if(res.hobo=="1") {
							$('#hobo option[value="1"]').prop('selected',true);
							$('.hobo').html('hobo = true,').removeClass('d-none');
						} else {
							$('#hobo option[value="0"]').prop('selected',true);
							$('.hobo').html('').addClass('d-none');
						}
						types();
					} else {
						$('#type').prop('checked',false);
					}
					
					//////////////////////////// spawn ON
					if(res.spawn=="on")
					{
						$grid.masonry('layout');
						$('#spawn').attr('checked','checked');
						$('.spawnc').removeClass('d-none');
						$('.spawnss').removeClass('d-none');
						$('.cammo').removeClass('d-none');
						if(res.health!=="") {
						$('.func').removeClass('d-none');
						$('.health').html('ply:SetMaxHealth('+res.health+')<br>                ply:SetHealth('+res.health+')');
						} else {
							$('.func').addClass('d-none');
						}
						if(res.armor=="") {
							 $('.func').addClass('d-none');
						} else {
							$('.func').removeClass('d-none');
							$('.armor').html('ply:SetArmor('+res.armor+')');
						}
						$('#health').on('keyup',function(){
						 $str = $('#health').val();
						 if($str==""){
							$('.func').addClass('d-none');
						 } else {
							$('.func').removeClass('d-none');
							$('.health').html('ply:SetMaxHealth('+$str+')<br>                ply:SetHealth('+$str+')');
						 }
					  });
					  $('#armor').on('keyup',function(){
						 $str = $('#armor').val();
						 if($str==""){
							$('.func').addClass('d-none');
						 } else {
							$('.func').removeClass('d-none');
							$('.armor').html('ply:SetArmor('+$str+')');
						 }
					  });
					  ammo();
					  parentbody();
					} else {
						$('.spawnc').addClass('d-none');
						$('.spawnss').addClass('d-none');
						$('.cammo').addClass('d-none');
						$('#spawn').prop('checked',false);
					}
					
					
					if(res.custom=="on") {
						$grid.masonry('layout');
						$('#custom').attr('checked','checked');
						$('.customc').removeClass('d-none');
						$('.checks').removeClass('d-none');
						if(res.visibility=="1") {
							$('.list').html(' CLIENT or');
							$('.list').removeClass('d-none');
						}else {
							$('.list').addClass('d-none');
						}
						if(res.visibility=="") {
							$('.evisibility').removeClass('d-none');
						} else {
							$('.evisibility').addClass('d-none');
						}
						$('#checkmessage').val(res.check_desc);
						$('.cmessage').text(res.check_desc);
						custom();
						if(res.methods=="1") {
						$('.option1').removeClass('d-none');
							$('.option2').addClass('d-none');
							$('.option3').addClass('d-none');
							$('.cjobs').removeClass('d-none');
							$('.cadmin').addClass('d-none');
							$('.csteamids').addClass('d-none');
							$('#method option[value="1"]').prop('selected',true);
							$('#jobs').tagsinput('removeAll');
							$('.cjobsst').empty();						  
							jobs();     
						}	else if(res.methods=='2') {
							$('.option2').removeClass('d-none');
							$('.option1').addClass('d-none');
							$('.option3').addClass('d-none');
							$('.cjobs').addClass('d-none');
							$('.cadmin').removeClass('d-none');
							$('.csteamids').addClass('d-none');
							$('#method option[value="2"]').prop('selected',true);
							if($('#adminsystem').val()=="") {
							$('.eadminsystem').removeClass('d-none').html(' Adminsystem field in required &nbsp;');
							} else {
								$('.eadminsystem').addClass('d-none');
							}
							if(res.admin_system=="1") {
								$('#adminsystem option[value="1"]').prop('selected',true);
								$('.cadmin').html("table.HasValue({<span class='ids'></span>}, ply:GetNWString('usergroup'))");
								$('.ids').html('');
								$('.eadminsystem').removeClass('d-none').html(' Adminsystem field in required &nbsp;');
								
							} else {
								$('#adminsystem option[value="2"]').prop('selected',true);
								$('.ids').html('');
								$('.cadmin').html("table.HasValue({<span class='ids'></span>}, serverguard.player:GetRank(ply))");
								$('.eadminsystem').addClass('d-none');
							}
								$('#groups').tagsinput('removeAll');
								$('.ids').empty();
								adminSystem();
								groups();
						
								
						} else if(res.methods=='3') {
							  $('.option3').removeClass('d-none');
							  $('.option2').addClass('d-none');
							  $('.option1').addClass('d-none');
							  $('.cjobs').addClass('d-none');
							  $('.cadmin').addClass('d-none');
							  $('.eadminsystem').addClass('d-none');
							  $('.csteamids').removeClass('d-none');
							  $('#method option[value="3"]').prop('selected',true);

							  $('#steamids').tagsinput('removeAll');
							  $('.stids').empty();
							  
								steamIds();  
						}
					} else {
						$('.customc').addClass('d-none');
						$('.checks').addClass('d-none');
						$('.evisibility').addClass('d-none');
						$('.emethod').addClass('d-none');
						$('#custom').prop('checked',false);
					}
					
					
					
					//-------------- OTHER ---------------//
					if(res.other=="on")
					{
						$('#other').attr('checked','checked');
						$('.otherc').removeClass('d-none');
						$('.otherss').removeClass('d-none');
						if(res.deathdemote=="1") {
							$('.funcO').removeClass('d-none');
							$('#demotedeath option[value="1"]').prop('selected',true);
						} else {
							$('#demotedeath option[value="0"]').prop('selected',true);
							$('.funcO').addClass('d-none');
						}
						$('#demotemessage').val(res.demotemessage);
						$('.omessage').text(res.demotemessage);
						others();
					} else {
						$('.otherc').addClass('d-none');
						$('.otherss').addClass('d-none');
						$('#other').prop('checked',false);
					}
					
					
					$('#bodygroup').tagsinput('add',res.body_group);
					$('#bodyvalue').tagsinput('add',res.body_group_val);
					$('#ammotype').tagsinput('add',res.ammo_type);
					$('#ammoamount').tagsinput('add',res.ammo_amount);
					$('#steamids').tagsinput('add',res.steamids);
					$('#groups').tagsinput('add',res.groups);
					$('#jobs').tagsinput('add',res.jobs);
					
				} // end success function 
			});
		}); // end .premade
		