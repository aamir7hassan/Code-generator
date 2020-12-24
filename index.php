<?php 

	include_once('db.php');
	$data = getData('id,name','models','');
	if(isset($_REQUEST['req'])) {
		if($_GET['req']=='fetchdata') {
			$data = getData('id,name','models',"");
			$array=[];
			while($rows = mysqli_fetch_assoc($data))
			{
				$arr['name'] = $rows['name'];
				$array[] = $arr;
			}
			echo json_encode($array);
			exit;
		} else if($_POST['req']=='getdata') {
			$id = $_POST['id'];
			$res = getData('*','models','where id='.$id);
			$row = mysqli_fetch_assoc($res);
			echo json_encode($row);
			die;
		}
	}
	
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap1.min.css" />
<!-- <link rel="stylesheet" href="css/jquery.tagsinput.min.css" /> -->
<link rel="stylesheet" href="css/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="css/select2.min.css" />
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
					<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-info"><span class=""></span>Clone</a>
					<a href="" class="btn btn-default"><span class=""></span>Edit</a>
					<a href="" class="btn btn-success"><span class=""></span>Save</a>
				</div>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<div class="grid">
					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" autocomplete="off" id="f1">
							  <fieldset>
							    <legend>Base Configuration</legend>
							    <div class="form-group row">
							      <label for="teamID" class="col-lg-3 col-form-label">TeamID <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" id="teamID" name="teamID" placeholder="team_citizen">
									  <span class="help-block">The ID used to identify the job in the code.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="name" class="col-lg-3 control-label">Name <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" id="name" placeholder="citizen" />
									  <span class="help-block">The name shown on the F4 menu, Scoreboard, HUD and such.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Model <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" id="models" placeholder="player/indigo" />
									  <span class="help-block">The model shown on the F4 menu and used when changed.</span>
							      </div>
							    </div>
								 <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Category</label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" id="category" placeholder="citizen" />
									  <span class="help-block">(DarkRP 2.6+) The category the job should show up in. You must create the category.</span>
							      </div>
							    </div>
							  </fieldset>
							</form>
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f2">
							  <fieldset>
							    <legend>Job Configuration</legend>
								 <div class="form-group  row">
								  <label for="inputEmail" class="col-lg-3 control-label">Color <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" id="color" placeholder="eg Color(23,23,34,255)">
								  </div>
								</div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Description <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <textarea class="form-control" id="description" placeholder="E.g. The Citizen is the most basic level of society you can hold besides being a hobo. You have no specific role in city life."></textarea>
								  </div>
							   </div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Command <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" id="command" placeholder="E.g citizen" />
								  </div>
							   </div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Weapons <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" id="weapons" placeholder="E.g. 'weapon_ak472', 'weapon_m42'" />
								  </div>
							   </div>
								<div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Change <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="text" class="form-control" id="change" placeholder="E.g. TEAM_POLICE" />
								  </div>
							   </div>
							  </fieldset>
							</form>
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f3">
							  <fieldset>
							    <legend>Permission Configuration</legend>
							    <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Access <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							       <select class="form-control" id="access">
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
							       <select class="form-control" id="vote">
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
							       <select class="form-control" id="license">
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
							       <select class="form-control" id="demote">
										 	<option value="" >Choose an option</option>
											<option value="true">Yes, allow demoted</option>
											<option value="false">No, don't allow demoted</option>
									 </select>
									 <div class="help-block">Whether or not the job can be demoted by other players.</div>
							      </div>
							    </div>
							  </fieldset>
							</form>
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f4">
							  <fieldset>
							    <legend>Economy Configuration</legend>
							    <div class="form-group row">
							      <label for="inputEmail" class="col-lg-3 control-label">Salary <span class="text-danger">*</span></label>
							      <div class="col-lg-9">
							        <input type="number" class="form-control" id="salary" placeholder="E.g 250">
									  <span class="help-block">The salary the player receive.</span>
							      </div>
							    </div>
								 <div class="form-group row">
								  <label for="inputEmail" class="col-lg-3 control-label">Max <span class="text-danger">*</span></label>
								  <div class="col-lg-9">
									 <input type="number" class="form-control" id="max" placeholder="E.g 3">
									 <span class="help-block">The amount of players that can have the job at the same time. Unlimited: 0.</span>
								  </div>
							   </div>
							  </fieldset>
							</form>
						</div>
					</div>

					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f5">
							  	<fieldset>
							    	<legend>Type Configuration <small>(Mayor, Medic etc.)</small>
									 <input type="checkbox" name="type" id="type" class="pull-right"  /></legend>
							    	<div class="typec d-none">
							<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Mayor </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" id="mayor">
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
										  		<select class="form-control" id="chief">
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
										  		<select class="form-control" id="medic">
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
										  		<select class="form-control" id="cook">
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
										  		<select class="form-control" id="hobo">
													<option value="" disabled selected >Choose an option</option>
												 	<option value="1">Yes</option>
												 	<option value="0">No</option>
										  		</select>
												<span class="help-block">Gives access to nothing. External addons may use this.</span>
										 	</div>
									  	</div>
								 	</div>
							  </fieldset>
							</form>
						</div>
					</div>


					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f6">
		                 <fieldset>
		                   <legend>Spawn Configuration <small>(Health, Armor, Bodygroups and Ammo)</small>
		                      <input type="checkbox" name="type" id="spawn" class="pull-right" /></legend>
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
		                         <input type="text" class="form-control" id="armor" placeholder="E.g 150">
										 <span class="help-block">The amount of armor the job should spawn with.</span>
		                       </div>
		                     </div>
		                     <div class="form-group row">
		                      <label for="inputEmail" class="col-lg-3 control-label">Bodygroup Group</label>
		                      <div class="col-lg-9">
		                        <input type="text" class="form-control" id="bodygroup" placeholder="E.g 0,1,2">
										<span class="help-block">The position of the group in the C right click menu (Start at 0). <b>Must match with the value below.</b></span>
		                      </div>
		                    </div>
		                    <div class="form-group row">
		                     <label for="inputEmail" class="col-lg-3 control-label">Bodygroup value</label>
		                     <div class="col-lg-9">
		                       <input type="text" class="form-control" id="bodyvalue" placeholder="E.g 2,6,1">
									  <span class="help-block">The position of the bodygroup value in the C right click menu (Start at 0). <b>Must match with the group above.</b></span>
		                     </div>
		                   </div>
		                    <div class="form-group row">
		                     <label for="inputEmail" class="col-lg-3 control-label">Ammo Types</label>
		                     <div class="col-lg-9">
		                       <input type="text" class="form-control" id="ammotype" placeholder="E.g pistol, ak-47">
									  <span class="help-block">The ammo types the job should spawn with. <b>Must match with the numbers below.</b></span>
		                     </div>
		                   </div>
		                   <div class="form-group row">
		                    <label for="inputEmail" class="col-lg-3 control-label">Ammo Amount</label>
		                    <div class="col-lg-9">
		                      <input type="text" class="form-control" id="ammoamount" placeholder="E.g 40,50">
									 <span class="help-block">The amount of ammo the job should spawn with. <b>Must match with the names above.</b></span>
		                    </div>
		                  </div>
		                   </div>
		                 </fieldset>
		               </form>
						</div>
					</div>
					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f7">
		                 <fieldset>
		                 	<legend>CustomCheck Configuration <small>(Restrict access)</small>
									 <input type="checkbox" name="type" id="custom" class="pull-right" /></legend>
		                  <div class="customc d-none">
									 <div class="form-group row">
										 <label for="inputEmail" class="col-lg-3 control-label">Visibility <span class="text-danger">*</span></label>
										 <div class="col-lg-9">
											 <select class="form-control" id="visibility">
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
										 <input type="text" class="form-control" id="checkmessage" placeholder="E.g The job is donator only.">
										 <span class="help-block">The message shown if the player can't pass the customCheck.</span>
									  </div>
								   </div>
									<div class="form-group row">
										<label for="inputEmail" class="col-lg-3 control-label">Methods <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="form-control" id="method">
												<option value=""  >Choose an option</option>
												<option value="1">Jobs</option>
												<option value="2">Groups</option>
												<option value="3">SteamIDs</option>
											</select>
											<span class="help-block">The restriction method you want to use.</span>
										</div>
									</div>
									<!-- if(method=1 then open this div.) -->
									<div class="form-group d-none option1 row">
									 <label for="inputEmail" class="col-lg-3 control-label">Jobs</label>
									 <div class="col-lg-9">
										<input type="text" class="form-control" id="jobs" placeholder="E.g Team_chief,Team_player.">
										<span class="help-block">The teams the item should be restricted to.</span>
									 </div>
								  </div>
								  <!-- else if(method=2 then open this div.) -->
								  	<div class="option2 d-none">
									  <div class="form-group row">
										  <label for="inputEmail" class="col-lg-3 control-label">Admin System <span class="text-danger"></span></label>
										  <div class="col-lg-9">
											  <select class="form-control" id="adminsystem">
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
		  										<input type="text" class="form-control" id="groups" placeholder="E.g Team_chief,Team_player.">
												<span class="help-block">The groups the item should be restricted to.</span>
		  									 </div>
		  								</div>
								  	</div>
									<!-- else if(method=3 then open this div.) -->
									<div class="form-group d-none option3 row">
									 <label for="inputEmail" class="col-lg-3 control-label">SteamIDs</label>
									 <div class="col-lg-9">
										<input type="text" class="form-control" id="steamids" placeholder="E.g STEAM_0:1:1234" />
										<span class="help-block">The SteamIDs the item should be restricted to.</span>
									 </div>
								  </div>
								 </div>
		                 </fieldset>
		               </form>
						</div>
					</div>
					<div class="grid-item">
						<div class="well bs-component">
							<form class="form-horizontal" id="f8">
							  <fieldset>
							    <legend>Other Configuration <small>(Demote on Death)</small>
									 <input type="checkbox" name="type" id="other" class="pull-right" /></legend>
							    	<div class="otherc d-none">
										<div class="form-group row">
										 	<label for="inputEmail" class="col-lg-3 control-label">Demote on Death </label>
										 	<div class="col-lg-9">
										  		<select class="form-control" id="demotedeath">
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
										 		<input type="text" class="form-control" id="demotemessage" placeholder="The mayer died therefore demoted." />
												<span class="help-block">The message it should display when the player is demoted.</span>
									  		</div>
								   	</div>
								 	</div>
							  </fieldset>
							</form>
						</div>
					</div>
				</div>
				<!-- / .grid -->
			</div>
		</div>
	</div>
	<br><br><br>
	<div class="clearfix"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="card border-primary">
					<div class="card-header">
						Generated Code Here
						<p class="d-none text-danger Error"></p>
						<p class="errors"><span class="eteamid d-none"></span><span class="ename d-none"></span> <span class="emodel d-none "></span><span class="edesc d-none"></span><span class="ecommand d-none"></span><span class="eweapons d-none"></span><span class="echange d-none"></span>
						<span class="eaccess d-none"></span><span class="evote d-none"></span><span class="elicense d-none"></span><span class="edemote d-none"></span><span class="esalary d-none"></span><span class="emax d-none"></span><span class="evisibility d-none"></span><span class="emethod d-none"></span><span class="eadminsystem d-none"></span></p>
					</div>
					<div class="card-body" >
						<button type="button" onclick="copyDivToClipboard()" class="pull-right btn-info">Copy Code</button><div class="clearfix"></div>
						<!-- Generated code here-->
						<div class="testing">
						<code id="copy" >
<span class="teamid"></span>= DarkRP.createJob("<span class="cname"></span>", {
	<ul class="list-unstyled one">
		<li>color = <span class="ccolor"></span>,</li>
		<li>model = {
			<ul class="list-unstyled one">
				<li><span class="cmodel"></span></li>
			</ul>
		},</li>
		<li>description = [[<span class="cdescription"></span>]],</li>
		<li>weapons = {<span class="cweapons"></span>},</li>
		<li>command = "<span class="ccommand"></span>",</li>
		<li>max = <span class="cmax"></span>,</li>
		<li>salary = <span class="csalary"></span>,</li>
		<li>admin = <span class="caccess"></span>,</li>
		<li>vote = <span class="cvote"></span>,</li>
		<li>hasLicense = <span class="clicense"></span>,</li>
		<li>candemote = <span class="candemote"></span>,</li>
		<li><span class="ccategory"></span></li>
		<li><span class="cchange"></span></li>
		<li><span class="mayor d-none"></span></li>
		<li><span class="chief d-none"></span></li>
		<li><span class="medic d-none"></span></li>
		<li><span class="cook d-none"></span></li>
		<li><span class="hobo d-none"></span></li>
		<li><span class="cammo d-none">ammo = {
			<ul class="list-unstyled one">
				<li><span class="cammoss"></span></li>
			</ul>
			},</span>
		</li>
		<li><span class="spawnss"><span class="func d-none">PlayerSpawn = function(ply)
			<ul class="list-unstyled one">
				<li><span class="health"></span></li>
				<li><span class="armor"></span></li>
				<li><span class="groups"></span></li>
			</ul>
			end,</span></span>
		</li>
		<li><span class="otherss d-none"><span class="funcO d-none">PlayerDeath = function(ply, weapon, killer)
			<ul class="list-unstyled one">
				<li>ply:teamBan()</li>
				<li>ply:changeTeam(GAMEMODE.DefaultTeam, true)</li>
				<li>	DarkRP.notifyAll(0, 4,"<span class='omessage'></span>")</li>
			</ul>
			end,</span></span>
		</li>
		<li><span class="checks d-none"><span class="funcC">customCheck = function(ply) return<span class="list"></span>
			<ul class="list-unstyled one">
				<li><span class="cjobs d-none"> table.HasValue({<span class="cjobss"></span>}, ply:Team())</span></li>
				<li><span class="cadmin d-none"></span></span></li>
				<li><span class="csteamids d-none"> table.HasValue({<span class="stids"></span>}, ply:SteamID())</span></li>
			</ul>
			<span>end,</span><br>
			<span>CustomCheckFailMsg = "<span class='cmessage'></span>",</span></span>
		</li>
	</ul>
<span>})</span>

</code>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Clone Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
		<ul class="nav nav-tabs" id="mytab" role="tablist">
			<li class="nav-item disabled ">
				<a class="nav-link" data-toggle="tab" disabled href="#myitems"><del>Your Items</del></a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#premade">Premade Items</a>
			</li>
		</ul>
		
		<div class="tab-content mt-3" id="myTabContent" >
			<!--<select class="form-control" id="search"></select>-->
			<br>
			<div class="tab-pane fade show active" id="myitems" role="tabpanel" aria-labelledby="home-tab"></div>
			<div class="tab-pane fade active show" id="premade" role="tabpanel" aria-labelledby="premade-tab">
				<div class="list-group">
				<?php 
					while($row = mysqli_fetch_assoc($data)) {
				?>
					<button type="button" data-premade="<?php echo $row['id']?>"  class="list-group-item text-left premade"><strong>Premade </strong><?php echo $row['name']?></button>
				<?php } ?>
				</div>
			</div>
		</div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/masonry.js"></script>
	<script src="js/colorpicker.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>

	<script src="js/custom.js"></script>
		<script src="js/preappend.js"></script>
	<script>
			var $grid;
		$(window).on('load',function() {

			 $grid = $('.grid').masonry({
				  // options
				  itemSelector: '.grid-item',
				  columnWidth: '.grid-item',
				  gutter: 20,
			 });
			 $('#type,#spawn,#custom,#other').on('change',function(){
				 $grid.masonry('layout');
			 });
 
			$('#color').colorpicker({
				//format: 'rgb'
			});

			 $( "#form" ).validate({
			   rules: {
			     name: {
			       required: true
			     }
			  }

			 });
			 validations();
			// $(".Error").validate({
			//     onkeyup: false,
			//     onfocusout: false
			// });
		
		//https://next.json-generator.com/api/json/get/V1cGoKmDV
		//json-genarator.com for mock data
			$.ajax({
				url:"index.php",
				type:"GET",
				dataType:"JSON",
				data:{'req':'fetchdata'},
				success:function(res) {
					$("#search").select2();
				}
			});
			
		
		
	}); // window load
	
	</script>

</body>
</html>

