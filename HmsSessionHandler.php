<?php

	class HmsSessionHandler{

		function __construct()
		{
			if(!isset($_SESSION)){
				session_start();
			}
		}

		public function sessionExist($session_name)
		{
			return isset($_SESSION[$session_name]);
		}

		public function createSession($session_name, $session_data)
		{
			$_SESSION[$session_name] = $session_data;
		}

		public function createSession2($session_name, $is_array = false)
		{
			if(!$this->sessionExist($_SESSION[$session_name])){
				if($is_array == true){
					$_SESSION[$session_name] = array();
				}else{
					$_SESSION[$session_name] = '';
				}
			}
		}

		public function destroySession($session_name = '')
		{
			if(!empty($session_name)){
				unset($_SESSION[$session_name]);
			}else{
				unset($_SESSION);
			}
		}

		public function destroyAllSession()
		{
			session_destroy();
		}

		public function getSessionData($session_name){
			return $_SESSION[$session_name];
			
		}

		public function setSessionData($session_name, $session_data){
			$_SESSION[$session_name] = $session_data;
		}

	}

?>