<?php 
session_start();
class auth {
    public $username;
    public $password;

    public function __construct()
    {
        if(isset($_POST["username"])){
            $this->username = str_replace("'","",trim($_POST["username"]));
        }
        if(isset($_POST["password"])){
            $this->password = str_replace("'","",trim($_POST["password"]));
        }
    }

    protected function connect(){
        $connect = mysqli_connect('localhost','root','','ayam');
        return $connect;
    }

    protected function query($command){
        $query = mysqli_query($this->connect(),$command);
        return $query;
    }

    public function querys($command){
        return $this->query($command);
    }

    public function require_check(){
  
        $build["status"] = true;
        foreach($_POST as $key => $val){
            if($val == ""){
                $build["status"] = false;
            }
        }
        return $build;
    }

    protected function user_check(){
        $query = $this->query("select * from admin where username = '".$this->username."'");
        $row = mysqli_num_rows($query);
        if($row < 1){
            return false;
        }else{
            return true;
        }
    }

    public function check_user(){
        return $this->user_check();
    }

    protected function check_password(){
        $query = $this->query("select * from admin where username = '".$this->username."'");
        while($data = mysqli_fetch_assoc($query)){
            if(password_verify($this->password,$data["password"])){
                return true;
            }else{
                return false;
            }
        }
    }

    public function password_check(){
        return $this->check_password();
    }


}

?>