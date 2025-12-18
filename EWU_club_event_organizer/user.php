<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "authority")) {
    include "DB_connection.php";
    include "app/Model/User.php";
    include "app/Model/Club.php";

    $users = get_all_users($conn);
  
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<div class="main-container">
			<?php include "inc/header.php" ?>
			<div class="content">
				<div class="section-title">
					<span class="title-text">
						<i class="fa fa-users"></i>
						Manage Users
					</span>
					<a href="add-user.php" class="btn-primary">
						<i class="fa fa-plus"></i>
						Add User
					</a>
				</div>
				
				<?php if (isset($_GET['success'])) {?>
					<div class="success" role="alert">
						<?php echo stripcslashes($_GET['success']); ?>
					</div>
				<?php } ?>
				
				<?php if ($users != 0) { ?>
					<div class="table-container">
						<table class="main-table">
							<thead>
								<tr>
									<th>#</th>
									<th>Full Name</th>
									<th>Username</th>
									<th>Club</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=0; foreach ($users as $user) { 
                                   if($user['id'] == $_SESSION['id']) continue;
                                ?>
								<tr>
									<td><?=++$i?></td>
									<td><?=$user['full_name']?></td>
									<td>@<?=$user['username']?></td>
									<td>
										<?php 
										// Check if user is member or admin of any club
										$user_club_id = get_user_club_id($conn, $user['id']);
										$admin_club_id = get_club_id_by_admin($conn, $user['id']);
										
										if ($user_club_id != 0) {
											$club = get_club_by_id($conn, $user_club_id);
											echo '<span class="status-badge pending" style="background: #d1fae5; color: #059669; border-color: transparent;">' . htmlspecialchars($club['name']) . '</span>';
										} elseif ($admin_club_id != 0) {
											$club = get_club_by_id($conn, $admin_club_id);
											echo '<span class="status-badge pending" style="background: var(--primary-light); color: var(--primary-color); border-color: transparent;">' . htmlspecialchars($club['name']) . ' (Admin)</span>';
										} else {
											echo '<span class="status-badge pending" style="background: #fee2e2; color: #dc2626; border-color: transparent;">NULL</span>';
										}
										?>
									</td>
									<td>
										<div class="table-actions">
											<a href="edit-user.php?id=<?=$user['id']?>" class="icon-btn edit" title="Edit">
												<i class="fa fa-edit"></i>
											</a>
											<a href="delete-user.php?id=<?=$user['id']?>" class="icon-btn delete" title="Delete">
												<i class="fa fa-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } else { ?>
					<div style="text-align: center; padding: 40px; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
						<i style="font-size: 48px; color: #ccc; display: block; margin-bottom: 15px;" class="fa fa-inbox"></i>
						<h3 style="color: #7F8C8D;">No users found</h3>
					</div>
				<?php } ?>
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