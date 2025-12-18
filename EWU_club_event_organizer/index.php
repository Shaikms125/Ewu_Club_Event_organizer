<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) ) {

	 include "DB_connection.php";
    include "app/Model/Task.php";
    include "app/Model/User.php";

	if ($_SESSION['role'] == "admin") {
		  $todaydue_task = count_tasks_due_today($conn);
	     $overdue_task = count_tasks_overdue($conn);
	     $nodeadline_task = count_tasks_NoDeadline($conn);
	     $num_task = count_tasks($conn);
	     $num_users = count_users($conn);
	     $in_progress = count_in_progress_tasks($conn);
	     $completed = count_completed_tasks($conn);
	}else if ($_SESSION['role'] == "club_admin") {
        include "app/Model/Club.php";
        $club_id = get_club_id_by_admin($conn, $_SESSION['id']);
        $club_members = get_club_members($conn, $club_id);
        $num_members = ($club_members != 0) ? count($club_members) : 0;
        
        $num_task = count_tasks_by_club($conn, $club_id);
        $todaydue_task = count_tasks_due_today_by_club($conn, $club_id);
        $overdue_task = count_tasks_overdue_by_club($conn, $club_id);
        $nodeadline_task = count_tasks_NoDeadline_by_club($conn, $club_id);
        $pending = count_pending_tasks_by_club($conn, $club_id);
        $in_progress = count_in_progress_tasks_by_club($conn, $club_id);
        $completed = count_completed_tasks_by_club($conn, $club_id);
	}else {
        // Fetch User Info to check Club Membership
        include "app/Model/Club.php";
        $curr_user = get_user_by_id($conn, $_SESSION['id']);
        $user_club_id = get_user_club_id($conn, $_SESSION['id']);

        $num_my_task = count_my_tasks($conn, $_SESSION['id']);
        $overdue_task = count_my_tasks_overdue($conn, $_SESSION['id']);
        $nodeadline_task = count_my_tasks_NoDeadline($conn, $_SESSION['id']);
        $pending = count_my_pending_tasks($conn, $_SESSION['id']);
	     $in_progress = count_my_in_progress_tasks($conn, $_SESSION['id']);
	     $completed = count_my_completed_tasks($conn, $_SESSION['id']);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<div class="main-container">
			<?php include "inc/header.php" ?>
			<div class="content">
				<?php if ($_SESSION['role'] == "admin") { ?>
				<h1 class="section-title">
					<span class="title-text">
						<i class="fa fa-dashboard"></i>
						Dashboard Overview
					</span>
				</h1>
				<div class="dashboard">
						<div class="dashboard-item">
							<i class="fa fa-users"></i>
							<div class="item-number"><?=$num_users?></div>
							<div class="item-label">Organizers</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-calendar"></i>
							<div class="item-number"><?=$num_task?></div>
							<div class="item-label">All Tasks</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-window-close-o"></i>
							<div class="item-number"><?=$overdue_task?></div>
							<div class="item-label">Overdue</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-clock-o"></i>
							<div class="item-number"><?=$nodeadline_task?></div>
							<div class="item-label">No Deadline</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-exclamation-triangle"></i>
							<div class="item-number"><?=$todaydue_task?></div>
							<div class="item-label">Due Today</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-bell"></i>
							<div class="item-number"><?=$overdue_task?></div>
							<div class="item-label">Notifications</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-square-o"></i>
							<div class="item-number"><?=$pending?></div>
							<div class="item-label">Pending</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-spinner"></i>
							<div class="item-number"><?=$in_progress?></div>
							<div class="item-label">In Progress</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-check-square-o"></i>
							<div class="item-number"><?=$completed?></div>
							<div class="item-label">Completed</div>
						</div>
					</div>
			<?php } else if ($_SESSION['role'] == "club_admin") { ?>
				<h1 class="section-title">
					<span class="title-text">
						<i class="fa fa-dashboard"></i>
						Club Dashboard
					</span>
				</h1>
				<div class="dashboard">
						<div class="dashboard-item">
							<i class="fa fa-users"></i>
							<div class="item-number"><?=$num_members?></div>
							<div class="item-label">Club Members</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-calendar"></i>
							<div class="item-number"><?=$num_task?></div>
							<div class="item-label">Club Tasks</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-window-close-o"></i>
							<div class="item-number"><?=$overdue_task?></div>
							<div class="item-label">Overdue</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-clock-o"></i>
							<div class="item-number"><?=$nodeadline_task?></div>
							<div class="item-label">No Deadline</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-exclamation-triangle"></i>
							<div class="item-number"><?=$todaydue_task?></div>
							<div class="item-label">Due Today</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-square-o"></i>
							<div class="item-number"><?=$pending?></div>
							<div class="item-label">Pending</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-spinner"></i>
							<div class="item-number"><?=$in_progress?></div>
							<div class="item-label">In Progress</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-check-square-o"></i>
							<div class="item-number"><?=$completed?></div>
							<div class="item-label">Completed</div>
						</div>
				</div>
			<?php } else { 
                if (empty($user_club_id)) { 
            ?>
                 <div class="no-club-widget">
                    <i class="fa fa-frown-o"></i>
                    <h2>You are not a member of any club</h2>
                 </div>
            <?php } else { ?>
				<h1 class="section-title">
					<span class="title-text">
						<i class="fa fa-dashboard"></i>
						My Tasks Overview
					</span>
				</h1>
				<div class="dashboard">
						<div class="dashboard-item">
							<i class="fa fa-calendar"></i>
							<div class="item-number"><?=$num_my_task?></div>
							<div class="item-label">My Tasks</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-window-close-o"></i>
							<div class="item-number"><?=$overdue_task?></div>
							<div class="item-label">Overdue</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-clock-o"></i>
							<div class="item-number"><?=$nodeadline_task?></div>
							<div class="item-label">No Deadline</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-square-o"></i>
							<div class="item-number"><?=$pending?></div>
							<div class="item-label">Pending</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-spinner"></i>
							<div class="item-number"><?=$in_progress?></div>
							<div class="item-label">In Progress</div>
						</div>
					<div class="dashboard-item">
						<i class="fa fa-check-square-o"></i>
						<div class="item-number"><?=$completed?></div>
						<div class="item-label">Completed</div>
					</div>
				</div>
			<?php } } ?>
			</div>
		</div>
	</div>
</body>
</html>
<?php }else{ 
   $em = "First login";
   header("Location: login.php?error=$em");
   exit();
}
 ?>