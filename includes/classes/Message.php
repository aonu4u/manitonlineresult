<?php
class Message {
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}


	public function sendMessage( $body, $date) {

		if($body != "") {
			$userLoggedIn = $this->user_obj->getUsername();
			$query = mysqli_query($this->con, "INSERT INTO messages VALUES(0, '$userLoggedIn', '$body', '$date')");
		}
	}

	public function getMessages() {
		$userLoggedIn = $this->user_obj->getUsername();
		$data = "";
		$get_messages_query = mysqli_query($this->con, "SELECT * FROM messages WHERE (user_from='$userLoggedIn') ");

		while($row = mysqli_fetch_array($get_messages_query)) {
			
			$body = $row['body'];
			$data = $data . $body . "<br><br>";
		}
		return $data;
	}
}
?>