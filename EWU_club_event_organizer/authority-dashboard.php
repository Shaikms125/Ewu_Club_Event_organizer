<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "authority") {

	 include "DB_connection.php";
     include "app/Model/Club.php";
     include "app/Model/User.php";

     $num_clubs = count_clubs($conn);
     // We can add counts for Club Admins later if we add a function for it
     $users = get_all_users($conn);
     $num_club_admins = 0;
     if($users != 0){
         foreach($users as $user){
             if($user['role'] == 'club_admin') $num_club_admins++;
         }
     }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Authority Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<div class="main-container">
			<?php include "inc/header.php" ?>
			<div class="content">
				<h1 class="section-title">
					<span class="title-text">
						<i class="fa fa-tachometer"></i>
						Authority Dashboard
					</span>
				</h1>
				<div class="dashboard">
						<div class="dashboard-item">
							<i class="fa fa-university"></i>
							<div class="item-number"><?=$num_clubs?></div>
							<div class="item-label">Clubs</div>
						</div>
						<div class="dashboard-item">
							<i class="fa fa-users"></i>
							<div class="item-number"><?=$num_club_admins?></div>
							<div class="item-label">Club Admins</div>
						</div>
				</div>
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
