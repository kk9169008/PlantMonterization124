<!-------------------------------------------------------

Webpage: donation.php
File Version: 1.0.1 (Release.ConfirmedVersion.CurrentVersion)
Author: Kris Kingston

---------------------------------------------------------

Updates:

Link for notifications and navigation movement

---------------------------------------------------------

Description of the page:navigation for member /volunteer /visitor

--------------------------------------------------------->
<nav class="navbar navbar-default navbar-static-top">

	<div class="container-fluid" style="padding-left: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#myNavbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>


		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-left">
                
                <li><img src="../images/HiQLogo2.png" width="56"></li>
				<li><a <?php if($page=='Home'){echo "class='active'";} ?>
					href="index.php">Home</a></li>
                <li><a <?php if($page=='database'){echo "class='current'";} ?> href="database.php">Database</a></li>
                <li><a <?php if($page=='schedule'){echo "class='current'";} ?> href="schedule.php">Schedule</a></li>
                <li><a <?php if($page=='testinggrounds'){echo "class='current'";} ?> href="testinggrounds.php">Testing Grounds</a></li>
				<li><a <?php if($page=='About'){echo "class='current'";} ?> href="about.php">About</a></li>
				<li><a <?php if($page=='Contact'){echo "class='current'";} ?>
					href="contact.php">Contact</a></li>

			</ul>




<ul class="nav navbar-nav navbar-right">
				</ul>
		</div>
    </div>

</nav>

<script type ="text/javascript">
$(document).ready(function() {
	var stickyNavTop = $('nav').offset().top;

	var stickyNav = function(){
	var scrollTop = $(window).scrollTop();

	if (scrollTop > stickyNavTop) { 
	    $('nav').addClass('sticky');
	} else {
	    $('nav').removeClass('sticky'); 
	}
	};

	stickyNav();

	$(window).scroll(function() {
	    stickyNav();
	});
	});
</script>
