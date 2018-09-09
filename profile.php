<?php 
include("includes/header.php");


if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
	$user_array = mysqli_fetch_array($user_details_query);
	
}

 ?>

<style type="text/css">
	 	.wrapper {
	 		margin-left: 0px;
			padding-left: 0px;
	 	}

 	</style>


<div class="profile_left" style="
		top: -40px;
		width: 17%;
		max-width: 240px;
		min-width: 130px;
		height: 100%;
		float: left;
		position: relative;
		background-color: #37B0E9;
		border-right: 10px solid #83D6FE;
		color: #CBEAF8;
		margin-right: 20px;
		">
		<?php 
		
				$pic=$user_array['profile_pic'];
		 		echo "<img src=".$pic." style='
		 		min-width: 80px;
				width: 55%;
				margin: 20px;
				border: 5px solid #83D6FE;
				border-radius: 100px;

		 		'>";
	 		
 		?>

 		<?php 
 			$profile_user_obj = new User($con, $username); 
 			
 			
 			?>




 	</div>

 
	<div class="profile_main_column column">

    <?php  
        
      
          echo "<h3>" . $profile_user_obj->getFirstAndLastName() . "</h3><hr>";

          echo "Username    :".$profile_user_obj->getUsername()."<br><br>";
          echo "Email       :".$profile_user_obj->getEmail()."<br><br>";

      
     

?>

   </div>


	</div>
	
</body>




</html>
