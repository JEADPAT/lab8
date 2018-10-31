<?php
  require_once('connect.php');

  $groupid = $_GET['groupid'];
  $sql = "SELECT * FROM usergroup WHERE USERGROUP_ID=$groupid";
  $result = $mysqli->query($sql);
  if(!$result){
    echo "SELECT failed. Error: ".$mysqli->error ;
  } else {
    while($row=$result->fetch_array()){
      $USERGROUP_CODE = $row[1];
      $USERGROUP_NAME = $row[2];
      $USERGROUP_REMARK = $row[3];
      $USERGROUP_URL = $row[4];
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
				<h2>Add User Group</h2>
				<form action="group.php?edit_groupid=<?php echo $groupid; ?>" method="post">
  				<label>Group Code</label>
  				<input type="text" name="groupcode" value="<?php echo $USERGROUP_CODE; ?>">

  				<label>Group Name</label>
  				<input type="text" name="groupname" value="<?php echo $USERGROUP_NAME; ?>">

  				<label>Remark</label>
  				<textarea name="remark"><?php echo $USERGROUP_REMARK; ?></textarea><br>

  				<label>URL</label>
  				<input type="text" name="url" value="<?php echo $USERGROUP_URL; ?>">

  				<div class="center">
  					<input type="submit" name="edit" value="Submit">
  					<input type="reset" value="Cancel">
  				</div>
				</form>
		</div> <!-- end div_content -->

	</div> <!-- end div_main -->

	<div id="div_footer">

	</div>

</div>
</body>
</html>
