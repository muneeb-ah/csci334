<?php
	 session_start();

	if(isset($_SESSION["uid"])){
	  if((int)$_SESSION["groupID"] != 0){
	    header("Location: ../assets/php/classes/run.php?a=logout&p=admin");
	  }else{
	  	require_once "../assets/php/classes/build.php";
		  $userFac = new userFactory();
		  $userObj = $userFac->getUser($_SESSION["groupID"], $_SESSION["uid"]);
	  }
	}else{
		header("Location: /csci334/admin/login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<!-- Bootstrap 4 CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css"></link>
  	<link rel="stylesheet" type="text/css" href="../assets/css/root.css"></link>
  	<link rel="stylesheet" type="text/css" href="../assets/css/customer.css"></link>
</head>
<body>
	<?php
		if($userObj->getPermissionID() == 2){
			echo '<div class="modal fade" id="assginDiv" tabindex="-1" role="dialog" aria-labelledby="assginDiv" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="assginDivTitle">Assign Staff</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-between align-items-center">
            	<span class="mr-3">Staff:</span>
            	<select id="staff_sel" class="form-control">
            		<option value="0">Select a staff</option>
            	</select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-main" id="assignCom">Assign</button>
          </div>
        </div>
      </div>
  </div>';
		}
	?>
	<!-- Loading Page -->
	<div class="loading-wrapper">
		<div class="loading-title">
			<span>Loading</span>
		</div>
		<div class="loading-dots">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>

	<!-- Body -->
	<div class="w-100 body row no-gutters">
		<!-- Sidebar -->
		<nav id="sidebar" class="col-2">
			<ul class="list-unstyled components">
				<?php 
					foreach (ADTECH::getMenu() as $menu) {
						if($menu->userAuth($userObj->getPermissionID()) == true){
							if(sizeof($menu->print()["subMenu"]) > 0){
								echo '<li class="" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><a>'.$menu->print()["label"].'</a><ul class="collapse list-unstyled" id="homeSubmenu">';
								foreach ($menu->getSubMenus() as $subMenu) {
									if($subMenu->userAuth($userObj->getPermissionID()) == true){
										echo '<li><a href="'.$subMenu->print()["path"].'">'.$subMenu->print()["label"].'</a></li>';
									}
								}
								echo '</ul>';

							}else{
								echo '<li><a href="'.$menu->print()["path"].'">'.$menu->print()["label"].'</a></li>';
							}
						}
					}
				?>
			</ul>
		</nav>
		<!-- Page Content -->
		<div class="col-10">

			<!-- Header -->
			<header id="header" class="d-flex justify-content-between">
				<div class="text-left">
					<span>AdTech IT Consulting</span>
				</div>

				<div>
					<div class="noti_div">
						<button type="button" class="notification-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></button>
						<span class="noti-num">1</span>
					  <div class="notifications dropdown-menu dropdown-menu-right">

					  </div>
					</div>

					<div class="btn-group">
	  					<button type="button" class="btn btn-grey dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <?php echo $userObj->getData()["fname"] . " " . $userObj->getData()["lname"] ." (". $userObj->getData()["position"] . ")"?>
					  </button>
					  <div class="dropdown-menu dropdown-menu-right">
					    <a class="dropdown-item" href="#">Account</a>
					    <a class="dropdown-item logout" href="../assets/php/classes/run.php?a=logout&p=admin">Logout</a>
					  </div>
					</div>
				</div>
			</header>

			<!-- Content -->
			<div class="align-items-stretch content">
				<!-- Main Content -->
				<main class="p-4">
					<h1 class="page-title">Customer Request</h1>
					<div class="tablelist">
			          <table class="table table-sm table-hover" id="record_table">
			       		<?php
			       			$rFilter = new filterRequest(ADTECH::getDB());
			       			if(isset($_GET["f"])){
			       				if($userObj->getPermissionID() == 3){
			       					$param = array($_GET["f"],$userObj->getData()["id"]);
			       					
			       				}else{
			       					$param = array($_GET["f"]);
			       				}
			       				
			       			}else{
			       				if($userObj->getPermissionID() == 3){
			       					$param = array("all",$userObj->getData()["id"]);
			       					
			       				}else{
			       					$param = array("all");
			       				}
			       				
			       			}
			       			$rFilter->setParam($param);
			       			$filterResult = $rFilter->execute();
			       			if(sizeof($filterResult) >= 1){
			       				$haveAssign = false;

			       				foreach ($filterResult as $req) {
			       					if($req["status"] == 1){
			       						$haveAssign = true;
			       						break;
			       					}
			       				}
		       				
								if($userObj->getPermissionID() == 2){
									if($haveAssign == true){
										echo '<thead><tr><th scope="col" width="10%">Request#</th><th scope="col">Subject</th><th scope="col">Company</th><th scope="col">Assigned Staff</th><th scope="col">Status</th><th scope="col">Last Update</th><th scope="col">Action</th></tr></thead><tbody>';
									}else{
										echo '<thead><tr><th scope="col" width="10%">Request#</th><th scope="col">Subject</th><th scope="col">Company</th><th scope="col">Assigned Staff</th><th scope="col">Status</th><th scope="col">Last Update</th></tr></thead><tbody>';
									}
			       					
			       				}else{
			       					echo '<thead><tr><th scope="col" width="10%">Request#</th><th scope="col">Subject</th><th scope="col">Company</th><th scope="col">Assigned Date</th><th scope="col">Status</th><th scope="col">Last Update</th></tr></thead><tbody>';
			       				}

			       				foreach ($filterResult as $req) {
			       					$status = "";
			       					$assignBtn = "";
			       					if($req["status"] == 1) $status = "New";
			       					else if($req["status"] == 2) $status = "Assigned";
			       					else if($req["status"] == 3) $status = "On-Going";
			       					else if($req["status"] == 4) $status = "Pending";
			       					else if($req["status"] == 5) $status = "Completed";
			       					else if($req["status"] == 6) $status = "Reviewed";

				       				if($userObj->getPermissionID() == 2){
				       					if($haveAssign == true){
				       						if($req["status"] == 1)
				       							echo '<tr><td><a class="view" title="View Request" href="viewRequest.php?v='.$req["rid"].'">'.$req["rid"].'</a></td><td>'.$req["subject"].'</td><td>'.$req["createdBy"].'</td><td>'.$req["assignedTo"].'</td><td>'.$status.'</td><td>'.$req["updateDate"].'</td><td><a class="btn btn-sm btn-main assignBtn" type="button" data-toggle="modal" data-rid="'.$req["rid"].'" data-target="#assginDiv">Assign</a></td></tr>';
				       						else
				       							echo '<tr><td><a class="view" title="View Request" href="viewRequest.php?v='.$req["rid"].'">'.$req["rid"].'</a></td><td>'.$req["subject"].'</td><td>'.$req["createdBy"].'</td><td>'.$req["assignedTo"].'</td><td>'.$status.'</td><td>'.$req["updateDate"].'</td><td></td></tr>';
				       					}
				       					else
				       						echo '<tr><td><a class="view" title="View Request" href="viewRequest.php?v='.$req["rid"].'">'.$req["rid"].'</a></td><td>'.$req["subject"].'</td><td>'.$req["createdBy"].'</td><td>'.$req["assignedTo"].'</td><td>'.$status.'</td><td>'.$req["updateDate"].'</td></tr>';
				       				}else{
				       					echo '<tr><td><a class="view" title="View Request" href="viewRequest.php?v='.$req["rid"].'">'.$req["rid"].'</a></td><td>'.$req["subject"].'</td><td>'.$req["createdBy"].'</td><td>'.$req["assignedDate"].'</td><td>'.$status.'</td><td>'.$req["updateDate"].'</td></tr>';
				       				}

				       			}

				       			echo '</tbody></table>';
			       			}
			       			
			       		?>    
			          </table>
				     </div>
				</main>
				<!-- Footer -->
				<footer id="footer"></footer>
			</div>

			
		</div>

		
	</div>

	<!-- Jquery JS -->
	<script type="text/javascript" src="../assets/vendor/jquery/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Google Chart API JS -->
  	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript">
		$("#footer").load("../assets/snippet/footer.html");

		var uid = <?php echo '"'. $userObj->getData()["id"] .'"' ?>;
		var position = <?php echo '"'. $userObj->getPermissionID() .'"' ?>;

		//connect to socket
		var sock = new WebSocket("ws://localhost:55000");
		var userList = [];
		sock.onopen = function(event){
			sock.send('{"action":"open", "uid":"'+ uid +'"}');	
		};

		sock.onmessage = function(event){
			const jsonData = JSON.parse(event.data);
			if(jsonData.action == "notifyAll" || jsonData.action == "notify"){
				console.log(jsonData);
				if(jsonData.msg == "notification"){
					getNotification();
				}
			}else if(jsonData.action == "list"){
				const clients = (jsonData.msg).split(",");
				clients.forEach((key)=>{
					userList.push(key);
				});
			}
			
		};

		sock.onerror = function(error){
			console.log("Can't connect to server");
		}

		$(window).on("unload", function(e) {
		    sock.close(1000,'{"uid":"'+ uid +'"}');
		});

		function getNotification(){
			$.ajax({
	          type: "POST",
	          dataType: "json",
	          url: "../assets/php/classes/run.php?a=getNotification",
	          data:{
	          	uid: uid,
	          	pos: position
	          },
	          success: function(data) {
	          	if(data[2] == 0){
	          		$(".noti-num")[0].style.display = "none";
	          	}else{
	          		$(".noti-num")[0].style.display = "";
	          		$(".noti-num")[0].innerHTML = data[2];
	          	}
	          	$(".notifications")[0].innerHTML = "";
	            data[1].forEach((noti)=>{
	            	if(noti["read"] == 1){
	            		$(".notifications").append('<div class="notification no-gutters" data-nid=""><div class="col-11"><span class="noti-title read">'+noti["title"]+'</span><span class="noti-content read">'+noti["content"]+'</span><span class="noti-date">'+noti["date"]+'</span></div><div class="col-1"></div></div>');
	            	}else{
	            		$(".notifications").append('<div class="notification no-gutters" data-nid="'+noti["nid"]+'"><span class="noti-title"><b>'+noti["title"]+'</b></span><span class="noti-content"><b>'+noti["content"]+'</b></span><span class="noti-date">'+noti["date"]+'</span></div>');
	            	}
	            	
	            });

	            $(".notification").click((event)=>{
					if(event.currentTarget.getAttribute("data-nid") != ""){
						$.ajax({
				          type: "POST",
				          dataType: "json",
				          url: "../assets/php/classes/run.php?a=readNoti", 
				          data:{
				          	nid: event.currentTarget.getAttribute("data-nid")
				          },
				          success: function(data) {
				            console.log(data);
				            getNotification();
				          }
				      	});
					}
						
				});
	          }
	      	});
		}

		$(document).ready(()=>{
			getNotification();
			$('.loading-wrapper').addClass('hide');
			var rid = "";
			$(".assignBtn").click((event)=>{
				rid = event.currentTarget.getAttribute( "data-rid" );
				$.ajax({
		          type: "POST",
		          dataType: "json",
		          url: "../assets/php/classes/run.php?a=getStaffList", 
		          success: function(data) {
		            $("#staff_sel")[0].innerHTML = '<option value="0">Select a staff</option>';
		            data[1].forEach((staff)=>{
		            	$("#staff_sel").append('<option value="'+staff["sid"]+'">'+staff["name"]+' (' + staff["freq"] + ')</option>');
		            });
		          }
		      	});
			});

			$("#assignCom").click(()=>{
				if($("#staff_sel").val() != 0){
					$.ajax({
			          type: "POST",
			          dataType: "json",
			          url: "../assets/php/classes/run.php?a=assignStaff",
			          data:{
			          	sid: $("#staff_sel").val(),
			          	rid: rid
			          },
			          success: function(data) {
			            if(data[0] == true){
			            	sock.send('{"action":"notification"}');
			            	location.reload();
			            }

			          }
			      	});
				}
			});
		});
		
	</script>
</body>
</html>