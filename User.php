<?php
        class User
    {
        private $db; 
        private $error; 
        function __construct($db_conn)
        {
            $this->db = $db_conn;
            session_start();
        }
        public function registrar($nombre, $email, $password)
        {
            try
            {
                $hashPasswd = password_hash($password, PASSWORD_DEFAULT);
                $query = $this->db->prepare("INSERT INTO Login(nombre, email, password) VALUES(:nomb, :email, :pass)");
                $query->bindParam(":nomb", $nombre);
                $query->bindParam(":email", $email);
                $query->bindParam(":pass", $hashPasswd);
                $query->execute();

                return true;
            }catch(PDOException $e){
                if($e->errorInfo[0] == 23000){
                    $this->error = "El correo electrónico ya está en uso!";
                    return false;
                }else{
                    echo $e->getMessage();
                    return false;
                }
            }
        }
        public function login($email, $password)
        {
            try
            {
                $query = $this->db->prepare("SELECT * FROM Login WHERE Email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();
                if($query->rowCount() > 0){
                    if(password_verify($password, $data['Password'])){
                        $_SESSION['user_session'] = $data['Id'];
                        return true;
                    }else{
                        $this->error = "Correo o contraseña Incorrectos";
                        return false;
                    }
                }else{
                    $this->error = "Correo o contraseña Incorrectos";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function isLoggedIn(){
            if(isset($_SESSION['user_session']))
            {
                return true;
            }
        }
        public function getUser(){
            if(!$this->isLoggedIn()){
                return false;
            }
            try {
                $query = $this->db->prepare("SELECT * FROM Login WHERE Id = :id");
                $query->bindParam(":id", $_SESSION['user_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function logout(){
            session_destroy();
            unset($_SESSION['user_session']);
            return true;
        }
        public function getLastError(){
            return $this->error;
        }
    }
?>
