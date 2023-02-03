<?php 

	function clean($data) {
		$data = trim($data);
		$data = stripslashes($data);

		return $data;
	}

	function showPrompt() {
		echo "<div class='alert alert-success' style='font-size:15px;'>".$_SESSION['prompt']."</div>";
	}

	function showError() {
		echo "<div class='alert alert-danger' style='font-size:15px;'>".$_SESSION['errprompt']."</div>";
	}

?>