<?php 
include("includes/header.php");
$user_obj = new User($con, $userLoggedIn);
$message_obj = new Message($con, $userLoggedIn);


if(isset($_POST['post_message'])) {

	if(isset($_POST['message_body'])) {
		$body = mysqli_real_escape_string($con, $_POST['message_body']);
		$date = date("Y-m-d H:i:s");
		$message_obj->sendMessage( $body, $date);
		    header ('Location: messages.php');
                exit();
	}

}

 ?>

<div class="container-fluid " >
	<div class="row outline d-flex justify-content-center" >

<div class="col-xs-12 col-md-8 col-md-push-2" >
 <div class="user_details column float">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a class="space_between" href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>
			</a>
			
		</div>
	</div>
	</div>
	</div>
	</div>

			<div class="main_column column" id="main_column">
		<?php  
		
				echo "<h4>You Messages </h4><hr><br>";
				echo "<div class='loaded_messages' id='scroll_messages'>";
				echo $message_obj->getMessages();
				echo "</div>";
		?>
</div>

<div class="main_column column" id="main_column">
		<div class="message_post">
			<form action="index.php" method="POST">
				<?php
				
					echo "<textarea name='message_body' id='message_textarea' placeholder='Write your message ...'></textarea>";
					echo "<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>";
				
				?>
			</form>

		</div>

		<script>
			var div = document.getElementById("scroll_messages");
			div.scrollTop = div.scrollHeight;
		</script>



</div>


</div>	

</div>

  