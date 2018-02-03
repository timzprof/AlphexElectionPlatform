<?php
require_once 'php/ca4nafa3ga.php';
session_start();
logged();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Election Platform | Add Voter</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.php"> <h1>INEC Board</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/p1.png" alt=""> </span> 
												<div class="user-name">
													<p>INEC Admin</p>
													<span>Admin001</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
    <div class="blank">
    	<h2>Add Voter</h2>
    	<div class="blankpage-main">
    		<form id="add_voter">
    			<div id="error_handler" class="hide" style=" color: #fff; padding: 5px; text-align: center;">
					<p>Message</p>
				</div>
			  <div class="form-group">
			    <label for="">Voter's firstame:</label>
			    <input type="text" class="form-control" id="voter_firstname" name="voter_firstname">
        </div>
        <div class="form-group">
			    <label for="">Voter's lastame:</label>
			    <input type="text" class="form-control" id="voter_lastname" name="voter_lastname">
        </div>
        <div class="form-group">
			    <label for="">Voter's other name:</label>
			    <input type="text" class="form-control" id="voter_othername" name="voter_othername">
			  </div>
			  <div class="form-group">
			    <label for="">Voters Date Of Birth:</label>
			    <input type="date" class="form-control" id="voter_dob" name="voter_dob">
			  </div>
			  <div class="form-group">
			    <label for="">Voters Address:</label>
			    <input type="text" class="form-control" id="voter_address" name="voter_address">
			  </div>
			  <div class="form-group">
          <label for="">Voters State of Origin:</label>
          <input type="text" class="form-control" id="voter_sorigin" name="voter_sorigin">
        </div>
        <div class="form-group">
          <label for="">Voters Phone Number:</label>
          <input type="text" class="form-control" id="voter_phone" name="voter_phone">
			  </div>
			  <button type="submit" id="add_voterx" class="btn btn-primary">Submit</button>
			</form>
    	</div>
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2019 INEC Board. All Rights Reserved | Developed by  <a href="" target="_blank">Alphex</a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li><a href="#"><i class="fa fa-cogs"></i><span>Elections</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
                    <li><a href="set_election.php">Create an Election</a></li>
                    <li><a href="add_election.php">Add Candidates</a></li>
		            <li><a href="presidential.php">Presidential</a></li>
		            <li><a href="state.php">State</a></li>	
		            <li><a href="senate.php">Senate</a></li>
		            <li><a href="local.php">Local Government</a></li>	            
		          </ul>
		        </li>
		         <li><a href="#"><i class="fa fa-cog"></i><span>Logout</span></a></li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<script src="js/custom.js"> </script>
<!-- mother grid end here-->
</body>
</html>


