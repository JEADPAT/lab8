<?php
  require_once('connect.php');

  $userid = $_GET['userid'];
  $sql = "SELECT * FROM user WHERE USER_ID=$userid";
  $result = $mysqli->query($sql);
  if(!$result){
    echo "SELECT failed. Error: ".$mysqli->error ;
  } else {
    while($row=$result->fetch_array()){
      $user_title = $row[1];
      $user_fname = $row[2];
      $user_lname = $row[3];
      $user_gender = $row[4];
      $user_email = $row[5];
      $user_name = $row[6];
      $user_passwd = $row[7];
      $user_groupid = $row[8];
      $disabled = $row[9];
      if($disabled){
        $user_disabled = 'checked';
      } else {
        $user_disabled = '';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>ITS331 Sample</title>
<link rel="stylesheet" href="default.css">
</head>

<body>

<div id="wrapper">
	<div id="div_header">
		ITS331 System
	</div>
	<div id="div_subhead">
		<ul id="menu">
			<li><a href="user.php">User Profile</a></li>
			<li><a href="add_user.php">Add User</a></li>
			<li><a href="group.php">User Group</a></li>
			<li><a href="add_group.html">Add User Group</a></li>
		</ul>
	</div>
	<div id="div_main">
		<div id="div_left">

		</div>
		<div id="div_content" class="form">
			<!--%%%%% Main block %%%%-->
			<!--Form -->

			<form action="user.php?edit_userid=<?php echo $userid; ?>" method="post">
					<h2>User Profile</h2>
					<label>Title</label>
					<select name="title">
					<?php
						$q='select TITLE_ID, TITLE_NAME from TITLE;';
						if($result=$mysqli->query($q)){
							while($row=$result->fetch_array()){
                if ($row[0]==$user_title){
                  $selected = 'selected';
                } else {
                  $selected = '';
                }
								echo '<option value="'.$row[0].'"'.$selected.'>'.$row[1].'</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
					</select>
					<label>First name</label>
					<input type="text" name="firstname" value="<?php echo $user_fname ?>">

					<label>Last name</label>
					<input type="text" name="lastname" value="<?php echo $user_lname ?>">

					<label>Gender</label>
					<?php
						$q='select GENDER_ID, GENDER_NAME from GENDER;';
						if($result=$mysqli->query($q)){
							while($row=$result->fetch_array()){
                if ($row[0]==$user_gender){
                  $checked = 'checked';
                } else {
                  $checked = '';
                }
								echo '<input type="radio" name="gender" value="'.$row[0].'"'.$checked.'>'.$row[1];
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
					<div></div>

					<label>Email</label>
					<input type="text" name="email" value="<?php echo $user_email ?>">

					<h2> Account Profile</h2>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $user_name ?>">

					<label>Password</label>
					<input type="password" name="passwd" value="<?php echo $user_passwd ?>">

          <label>Confirmed password</label>
          <input type="password" name="cpasswd">

					<label>User group</label>
					<select name="usergroup">
					<?php
						$q='select USERGROUP_ID, USERGROUP_NAME from USERGROUP;';
						if($result=$mysqli->query($q)){
							while($row=$result->fetch_array()){
                if ($row[0]==$user_groupid){
                  $selected = 'selected';
                } else {
                  $selected = '';
                }
								echo '<option value="'.$row[0].'"'.$selected.'>'.$row[1].'</option>';
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
					</select>
					<label>Disabled</label>
					<input type="checkbox" name="disabled" value="1" <?php echo $user_disabled ?>>
					<input type="hidden" name="page" value="adduser" >
					<div class="center">
						<input type="submit" value="Submit" name="edit">
					</div>
				</form>
		</div> <!-- end div_content -->

	</div> <!-- end div_main -->

	<div id="div_footer">

	</div>

</div>
</body>
</html>
