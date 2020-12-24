<?php 
	include_once('db.php');
	if(isset($_REQUEST['frm']))
	{
		
		$req = $_REQUEST;
		$name = $req['name'];
		$type = empty($req['type'])?"":$req['type'];
		$spawn = empty($req['spawn'])?"":$req['spawn'];
		$custom = empty($req['custom'])?"":$req['custom'];
		$other = empty($req['other'])?"":$req['other'];
		$array = array(
			'team_id'		=> $req['teamID'],
			'name'			=> $req['name'],
			'model'			=> $req['models'],
			'category'		=> $req['category'],
			'color'			=> $req['color'],
			'job_desc'		=> $req['description'],
			'command'		=> $req['command'],
			'weapons'		=> $req['weapons'],
			'changes'		=> $req['change'],
			'salary'		=> $req['salary'],
			'max'			=> $req['max'],
			'access'		=> $req['access'],
			'vote'			=> $req['vote'],
			'license'		=> $req['license'],
			'demote'		=> $req['demote'],
			'mayor'			=> $req['mayor'],
			'chief'			=> $req['chief'],
			'medic'			=> $req['medic'],
			'cook'			=> $req['cook'],
			'hobo'			=> $req['hobo'],
			'health'		=> $req['health'],
			'armor'			=> $req['armor'],
			'body_group'	=> $req['bodygroup'],
			'body_group_val'=> $req['bodyvalue'],
			'ammo_type'		=> $req['ammotype'],
			'ammo_amount'	=> $req['ammoamount'],
			'visibility'	=> $req['visibility'],
			'check_desc'	=> $req['checkmessage'],
			'methods'		=> $req['method'],
			'jobs'			=> $req['jobs'],
			'admin_system'	=> $req['adminsystem'],
			'groups'		=> $req['groups'],
			'steamids'		=> $req['steamids'],
			'deathdemote'	=> $req['deathdemote'],
			'demotemessage'	=> $req['demotemessage'],
			'date_created'	=> date('Y-m-d H:i:s'),
			'type'			=> $type,
			'spawn'			=> $spawn,
			'custom'		=> $custom,
			'other'			=> $other,
		);
		$errMsg = "";
		
		$query = getData('id','models',"where name='".$name."'");
		$check = mysqli_num_rows($query);
		if($check==0) {
			$res = insert('models',$array);
			if($res==true) {
				echo "1";
			} else {
				echo "0";
			}
		} else {
			
			echo "2";
		}
		die;
		
		
	}
	
	
?>


<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap1.min.css" />

<!-- <link rel="stylesheet" href="css/jquery.tagsinput.min.css" /> -->
<link rel="stylesheet" href="css/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/style.css" />
<title>Casaluze - Chile</title>
	<style>
			  
	</style>
</head>

<body>
	<div class="container main" >
		<div class="row">
			<div class="col-md-6">
				<button class="btn btn-success">Return</button>
			</div>
			<div class="col-md-6">
				<div class="pull-right">
					<a href="" class="btn btn-danger"><span class=""></span>Clear</a>
					<a href="" class="btn btn-info"><span class=""></span>Clone</a>
					<a href="" class="btn btn-default"><span class=""></span>Edit</a>
					<a href="" class="btn btn-success"><span class=""></span>Save</a>
				</div>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
			<form role="form" id="form" action="upload.php" method="post" class="frm" >
				<?php 
					if($errMsg!=="") {
						
				?>
					<div class="alert <?php echo $class;?>"><?php echo $errMsg; ?></div>
				<?php } ?>
				<div class="grid">
					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal" autocomplete="off"> -->
							  <fieldset>
								<input type="hidden" name="frm" id="frm" value="1" />
							    <legend>Base Configuration</legend>
							    <div class="form-group row">
							      <label for="teamID" class="col-lg-3 control-label">TeamID <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" id="teamID" name="teamID" placeholder="team_citizen">
									  <span class="help-block">The ID used to identify the job in the code.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="name" class="col-lg-3 control-label">Name <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" name="name" id="name" placeholder="citizen" />
									  <span class="help-block">The name shown on the F4 menu, Scoreboard, HUD and such.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Model <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" name="models" id="models" placeholder="player/indigo" />
									  <span class="help-block">The model shown on the F4 menu and used when changed.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Category</label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" name="category" id="category" placeholder="citizen" />
									  <span class="help-block">(DarkRP 2.6+) The category the job should show up in. You must create the category.</span>
							      </div>
							    </div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
							  <fieldset>
							    <legend>Job Configuration</legend>
								 <div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Color <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" name="color" id="color" placeholder="eg rgb(23,23,34)">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Description <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <textarea class="form-control" name="description" id="description" placeholder="E.g. The Citizen is the most basic level of society you can hold besides being a hobo. You have no specific role in city life."></textarea>
								  </div>
							   </div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Command <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" name="command" id="command" placeholder="E.g citizen" />
								  </div>
							   </div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Weapons <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" name="weapons" id="weapons" placeholder="E.g. 'weapon_ak472', 'weapon_m42'" />
								  </div>
							   </div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Change <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" name="change" id="change" placeholder="E.g. TEAM_POLICE" />
								  </div>
							   </div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
							  <fieldset>
							    <legend>Permission Configuration</legend>
							    <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Access <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							       <select class="form-control" name="access" id="access">
										 	<option value="" readonly >Choose an option</option>
											<option value="0">Anyone</option>
											<option value="1">Admin & Higher</option>
											<option value="2">Superadmin & Higher</option>
									 </select>
									 <span class="help-block">The admin status required for the job. CustomChecks may work better in some situations and got more options.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Vote <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							       <select class="form-control" name="vote" id="vote">
										 	<option value="" readonly >Choose an option</option>
											<option value="true">Yes, require vote</option>
											<option value="false">No, don't require vote</option>
									 </select>
									 <div class="help-block">Whether or not a vote should be required to become the job.</div>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">License <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							       <select class="form-control" name="license" id="license">
										 	<option value="" >Choose an option</option>
											<option value="true">Yes, spawn with license</option>
											<option value="false">No, don't spawn with license</option>
									 </select>
									 <div class="help-block">Whether or not the job should spawn with a gun license.</div>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Demote <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							       <select class="form-control" name="demote" id="demote">
										 	<option value="" >Choose an option</option>
											<option value="true">Yes, allow demoted</option>
											<option value="false">No, don't allow demoted</option>
									 </select>
									 <div class="help-block">Whether or not the job can be demoted by other players.</div>
							      </div>
							    </div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
							  <fieldset>
							    <legend>Economy Configuration</legend>
							    <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Salary <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="number" class="form-control" name="salary" id="salary" placeholder="E.g 250">
									  <span class="help-block">The salary the player receive.</span>
							      </div>
							    </div>
								 <div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Max <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="number" class="form-control" name="max"  id="max" placeholder="E.g 3">
									 <span class="help-block">The amount of players that can have the job at the same time. Unlimited: 0.</span>
								  </div>
							   </div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
							  	<fieldset>
							    	<legend>Type Configuration <small>(Mayor, Medic etc.)</small>
									 <input type="checkbox" name="type" name="type" id="type" class="pull-right" /></legend>
							    	<div class="typec d-none">
							<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Mayor </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" name="mayor" id="mayor">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes</option>
												 	<option value="0">No</option>
										  		</select>
												<div class="help-block">Gives access to lockdown, lottery, broadcast and more.</div>
										 	</div>
									  	</div>
										<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Chief </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" name="chief" id="chief">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes</option>
												 	<option value="0">No</option>
													<div class="help-block">Gives access to jail positions.</div>
										  		</select>
										 	</div>
									  	</div>
										<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Medic </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" name="medic" id="medic">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes</option>
												 	<option value="0">No</option>
										  		</select>
												<span class="help-block">Gives access to nothing. External addons may use this.</span>
										 	</div>
									  	</div>
										<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Cook </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" name="cook" id="cook">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes</option>
												 	<option value="0">No</option>
										  		</select>
												<span class="help-block">Gives access to food and the microwave.</span>
										 	</div>
									  	</div>
										<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Hobo </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" name="hobo" id="hobo">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes</option>
												 	<option value="0">No</option>
										  		</select>
												<span class="help-block">Gives access to nothing. External addons may use this.</span>
										 	</div>
									  	</div>
								 	</div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>


					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
		                 <fieldset>
		                   <legend>Spawn Configuration <small>(Health, Armor, Bodygroups and Ammo)</small>
		                      <input type="checkbox" name="spawn" id="spawn" class="pull-right" /></legend>
		                   <div class="spawnc d-none">
		                      <div class="form-group row">
		                        <label for="inputEmail" class="col-lg-3 control-label">Health</label>
		                        <div class="col-lg-9">
		                          <input type="number" class="form-control" id="health" placeholder="E.g 150">
										  <span class="help-block">The amount of health the job should spawn with. <b>This may not be compatible with all addons such as HUDs.</b></span>
		                        </div>
		                      </div>
		                      <div class="form-group row">
		                       <label for="inputEmail" class="col-lg-3 control-label">Armor</label>
		                       <div class="col-lg-9">
		                         <input type="text" class="form-control" name="armor" id="armor" placeholder="E.g 150">
										 <span class="help-block">The amount of armor the job should spawn with.</span>
		                       </div>
		                     </div>
		                     <div class="form-group row">
		                      <label for="inputEmail" class="col-lg-3 control-label">Bodygroup Group</label>
		                      <div class="col-lg-9">
		                        <input type="text" class="form-control" name="bodygroup" id="bodygroup" placeholder="E.g 0,1,2">
										<span class="help-block">The position of the group in the C right click menu (Start at 0). <b>Must match with the value below.</b></span>
		                      </div>
		                    </div>
		                    <div class="form-group row">
		                     <label for="inputEmail" class="col-lg-3 control-label">Bodygroup value</label>
		                     <div class="col-lg-9">
		                       <input type="text" class="form-control" name="bodyvalue" id="bodyvalue" placeholder="E.g 2,6,1">
									  <span class="help-block">The position of the bodygroup value in the C right click menu (Start at 0). <b>Must match with the group above.</b></span>
		                     </div>
		                   </div>
		                    <div class="form-group row">
		                     <label for="inputEmail" class="col-lg-3 control-label">Ammo Types</label>
		                     <div class="col-lg-9">
		                       <input type="text" class="form-control" name="ammotype" id="ammotype" placeholder="E.g pistol, ak-47">
									  <span class="help-block">The ammo types the job should spawn with. <b>Must match with the numbers below.</b></span>
		                     </div>
		                   </div>
		                   <div class="form-group row">
		                    <label for="inputEmail" class="col-lg-3 control-label">Ammo Amount</label>
		                    <div class="col-lg-9">
		                      <input type="text" class="form-control" name="ammoamount" id="ammoamount" placeholder="E.g 40,50">
									 <span class="help-block">The amount of ammo the job should spawn with. <b>Must match with the names above.</b></span>
		                    </div>
		                  </div>
		                   </div>
		                 </fieldset>
		               <!-- </form> -->
						</div>
					</div>


					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
							  <fieldset>
							    <legend>CustomCheck Configuration <small>(Restrict access)</small>
									 <input type="checkbox" name="custom" id="custom" class="pull-right" /></legend>
							    <div class="customc d-none">
									 <div class="form-group row">
										 <label for="inputEmail" class="col-lg-3 control-label">Visibility <span class="text-danger">*</span></label>
										 <div class="col-lg-9">
											 <select class="form-control" name="visibility" id="visibility">
												 <option value="" >Choose an option</option>
												 <option value="0">Restricted to players that can pass the check</option>
												 <option value="1">Visible for everyone</option>
											 </select>
											 <span class="help-block">The visibility of item in the F4 menu.</span>
										 </div>
									 </div>
									 <div class="form-group row">
									  <label for="inputEmail" class="col-lg-3 control-label">Description</label>
									  <div class="col-lg-9">
										 <input type="text" class="form-control" name="checkmessage" id="checkmessage" placeholder="E.g The job is donator only.">
										 <span class="help-block">The message shown if the player can't pass the customCheck.</span>
									  </div>
								   </div>
									<div class="form-group row">
										<label for="inputEmail" class="col-lg-3 control-label">Methods <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="form-control" name ="method" id="method">
												<option value=""  >Choose an option</option>
												<option value="1">Jobs</option>
												<option value="2">Groups</option>
												<option value="3">SteamIDs</option>
											</select>
											<span class="help-block">The restriction method you want to use.</span>
										</div>
									</div>
									<!-- if(method=1 then open this div.) -->
									<div class="form-group row d-none option1">
									 <label for="inputEmail" class="col-lg-3 control-label">Jobs</label>
									 <div class="col-lg-9">
										<input type="text" class="form-control" name="jobs" id="jobs" placeholder="E.g Team_chief,Team_player.">
										<span class="help-block">The teams the item should be restricted to.</span>
									 </div>
								  </div>
								  <!-- else if(method=2 then open this div.) -->
								  	<div class="option2 d-none">
									  <div class="form-group row">
										  <label for="inputEmail" class="col-lg-3 control-label">Admin System <span class="text-danger"></span></label>
										  <div class="col-lg-9">
											  <select class="form-control" name="adminsystem" id="adminsystem">
												  <option value="">Choose an option</option>
												  <option value="1">ULX,FAdmin & More</option>
												  <option value="2">ServerGuard</option>
											  </select>
											  <span class="help-block">The admin system you are running on your server.</span>
											</div>
									  	</div>
									  	<div class="form-group row">
		  									 <label for="inputEmail" class="col-lg-3 control-label">Groups</label>
		  									 <div class="col-lg-9">
		  										<input type="text" class="form-control" name="groups" id="groups" placeholder="E.g Team_chief,Team_player.">
												<span class="help-block">The groups the item should be restricted to.</span>
		  									 </div>
		  								</div>
								  	</div>
									<!-- else if(method=3 then open this div.) -->
									<div class="form-group row d-none option3">
									 <label for="inputEmail" class="col-lg-3 control-label">SteamIDs</label>
									 <div class="col-lg-9">
										<input type="text" class="form-control" name="steamids" id="steamids" placeholder="E.g STEAM_0:1:1234" />
										<span class="help-block">The SteamIDs the item should be restricted to.</span>
									 </div>
								  </div>
								 </div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>


					<div class="grid-item">
						<div class="well bs-component">
							<!-- <form class="form-horizontal"> -->
							  <fieldset>
							    <legend>Other Configuration <small>(Demote on Death)</small>
									 <input type="checkbox" name="other" id="other" class="pull-right" /></legend>
							    	<div class="otherc d-none">
										<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Demote on Death </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" name="demotedeath" id="demotedeath">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes, demote on death</option>
												 	<option value="0">No, don't demote on death</option>
										  		</select>
												<span class="help-block">Whether or not the player should be demoted on death.</span>
										 	</div>
									  	</div>
									 	<div class="form-group row">
									  		<label for="inputEmail" class="col-lg-3 control-label">Demote Message</label>
									  		<div class="col-lg-9">
										 		<input type="text" class="form-control" name="demotemessage" id="demotemessage" placeholder="The mayer died therefore demoted." />
												<span class="help-block">The message it should display when the player is demoted.</span>
									  		</div>
								   	</div>
								 	</div>
							  </fieldset>
							<!-- </form> -->
						</div>
					</div>
				</div>
					<center><a href="#" class="btn btn-success" name="submit" id="add">Add</a></center>
				<!-- / .grid -->
				</form>
			</div>
		</div>
	</div>
	<br><br><br><br>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/masonry.js"></script>
	<script src="js/colorpicker.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>

	<script src="js/custom.js"></script>
	<script>
	
		$('#add').on('click',function(e) {
			var frmdata = $('#form').serialize();
			$.ajax({
				url:"upload.php",
				type:"POST",
				dataType:"JSON",
				data:frmdata,
				success:function(res) {
					if(res=="1") {
						alert('Data added successfully');
						window.location.reload();
					} else if(res=="0") {
						alert('An error occured, please try again.');
						return false;
					} else if(res=="2") {
						var name = $('#name').val();
						alert('This name '+name+' already exists,try different name');
						return false;
					}
				}
			});
		});
		
		
		$(window).on('load',function() {
				
			 var $grid = $('.grid').masonry({
				  // options
				  itemSelector: '.grid-item',
				  columnWidth: '.grid-item',
				  gutter: 20,
			 });
			 $('#type,#spawn,#custom,#other').on('change',function(){
				 $grid.masonry('layout');
			 });

			$('#color').colorpicker();

			 
		});

	</script>

</body>
</html>
