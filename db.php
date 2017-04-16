<?php 
	//error_reporting(0);
	class db{
		public $server;
        public $user;
        public $password;
        public $database;


        /**
         * @return mixed
         */
        public function getServer(){
            return $this->server;
        }

        /**
         * @param mixed $server
         */
        public function setServer($server){
            $this->server = $server;
        }

        /**
         * @return mixed
         */
        public function getUser(){
            return $this->user;
        }

        /**
         * @param mixed $user
         */
        public function setUser($user){
            $this->user = $user;
        }

        /**
         * @return mixed
         */
        public function getPassword(){
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password){
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getDatabase(){
            return $this->database;
        }

        /**
         * @param mixed $database
         */
        public function setDatabase($database){
            $this->database = $database;
        }


		public function open(){
			$conn = mysqli_connect($this->server , $this->user , $this->password , $this->database) or die("Sunucuya baglanilamadi.");
			mysqli_query($conn , "SET NAMES utf8");
			mysqli_query($conn , "SET CHARACTER SET utf8");
			mysqli_query($conn , "SET COLLATION_CONNECTION='utf8_general_ci'");
			return $conn;
		} 

		public function getRecordCount($sql){
		    $query = $this->runSql($sql);
		    return mysqli_num_rows($query);
        }

		public function runSql($sql){
			$conn = $this->open();
			$query = mysqli_query($conn, $sql);
			if($query)
				return $query;
		}
	}
?>