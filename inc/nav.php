<?php 
if($_SESSION['role'] == "club_member"){ ?>
	<!-- Sidebar Navigation for Organizer -->
	<div class="sidebar-wrapper">
		<div class="sidebar-logo">
			<div>EWU CLUB</div>
			<div>TASK MANAGER</div>
		</div>
		<nav class="sidebar-nav">
			<a href="index.php" class="nav-link">
				<i class="fa fa-tachometer" aria-hidden="true"></i>
				<span>Dashboard</span>
			</a>
			<a href="my_task.php" class="nav-link">
				<i class="fa fa-calendar" aria-hidden="true"></i>
				<span>My Tasks</span>
			</a>
			<a href="profile.php" class="nav-link">
				<i class="fa fa-user" aria-hidden="true"></i>
				<span>Profile</span>
			</a>
			<a href="notifications.php" class="nav-link">
				<i class="fa fa-bell" aria-hidden="true"></i>
				<span>Notifications</span>
			</a>
		</nav>
	</div>
<?php } else if ($_SESSION['role'] == "authority") { ?>
	<!-- Sidebar Navigation for Authority -->
	<div class="sidebar-wrapper">
		<div class="sidebar-logo">
			<div>EWU CLUB</div>
			<div>TASK MANAGER</div>
		</div>
		
		<nav class="sidebar-nav">
			<a href="authority-dashboard.php" class="nav-link">
				<i class="fa fa-tachometer" aria-hidden="true"></i>
				<span>Dashboard</span>
			</a>
			<a href="clubs.php" class="nav-link">
				<i class="fa fa-university" aria-hidden="true"></i>
				<span>Manage Clubs</span>
			</a>
			<a href="club-admins.php" class="nav-link">
				<i class="fa fa-users" aria-hidden="true"></i>
				<span>Club Admins</span>
			</a>
             <a href="user.php" class="nav-link">
				<i class="fa fa-user-plus" aria-hidden="true"></i>
				<span>Create User</span>
			</a>
			<a href="profile.php" class="nav-link">
				<i class="fa fa-user" aria-hidden="true"></i>
				<span>Profile</span>
			</a>
		</nav>
	</div>
<?php } else if ($_SESSION['role'] == "club_admin") { ?>
	<!-- Sidebar Navigation for Club Admin -->
	<div class="sidebar-wrapper">
		<div class="sidebar-logo">
			<div>EWU CLUB</div>
			<div>TASK MANAGER</div>
		</div>
		<nav class="sidebar-nav">
			<a href="index.php" class="nav-link">
				<i class="fa fa-tachometer" aria-hidden="true"></i>
				<span>Dashboard</span>
			</a>
			<a href="my-club.php" class="nav-link">
				<i class="fa fa-university" aria-hidden="true"></i>
				<span>My Club</span>
			</a>
            <a href="tasks.php" class="nav-link">
				<i class="fa fa-calendar" aria-hidden="true"></i>
				<span>Club Tasks</span>
			</a>
             <a href="club-members.php" class="nav-link">
				<i class="fa fa-users" aria-hidden="true"></i>
				<span>Manage Members</span>
			</a>
			<a href="profile.php" class="nav-link">
				<i class="fa fa-user" aria-hidden="true"></i>
				<span>Profile</span>
			</a>
		</nav>
	</div>
<?php } ?>