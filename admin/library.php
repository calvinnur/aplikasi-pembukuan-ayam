<?php 
session_start();



class admin {
    public $username;
    public $phone;
    public $harga_pasar;
    public $harga_pribadi;
    public $timbangan;
    public $keranjang;
    public $biaya;


    public function __construct()
    {
        if(isset($_POST["username"])){
            $this->username = str_replace("'","",trim($_POST["username"]));
        }
        if(isset($_POST["phone"])){
            $this->phone = str_replace("'","",trim($_POST["phone"]));
        }

        if(isset($_POST["pasar"])){
            $this->harga_pasar = str_replace("'","",trim($_POST["pasar"]));
        }

        if(isset($_POST["pribadi"])){
            $this->harga_pribadi = str_replace("'","",trim($_POST["pribadi"]));
        }

        if(isset($_POST["timbangan"])){
            $this->timbangan = str_replace(",",".",trim($_POST["timbangan"]));
        }

        if(isset($_POST["keranjang"])){
            $this->keranjang = str_replace("'","",trim($_POST["keranjang"]));
        }

        if(isset($_POST["biaya"])){
            $this->biaya = str_replace("'","",trim($_POST["biaya"]));
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
    

    public function phone_length(){
        $phone = strlen($this->phone);
        if($phone >= 10 and $phone <=13){
            return true;
        }else{
            return false;
        }
    }

    public function phone_numeric(){
        if(is_numeric($this->phone) == true){
            return true;
        }else{
            return false;
        }
    }

    protected function check_number(){
        $query = $this->query("select * from user where phone = '".$this->phone."'");
        $row = mysqli_num_rows($query);
        if($row > 0){
            return false;
        }else{
            return true;
        }
    }

    protected function check_user(){
        $query = $this->query("select * from user where username = '".$this->username."'");
        $row = mysqli_num_rows($query);
        if($row > 0){
            return false;
        }else{
            return true;
        }
    }

    public function number_check(){
        return $this->check_number();
    }

    public function user_check(){
        return $this->check_user();
    }

    protected function insert_user(){
        $query =  $this->query("insert into user (username,phone) values(
            '".$this->username."',
            '".$this->phone."'
        )");
        return $query;
    }

    public function user_insert(){
        return $this->insert_user();
    }

    public function pagination($command, $page, $limit_data) {
        $query = $this->query($command);
        $count_data = mysqli_num_rows($query);
        $data['total_page'] = ceil(($count_data / $limit_data));
        $data['offset'] = ($page - 1) * $limit_data;
        $data['limit'] = $limit_data;
        return $data;
    }
    
    protected function user_id(){
        $query = $this->query("select * from user");
        while($show = mysqli_fetch_assoc($query)){
            $build[$show["id"]] = $show;
        }
        return $build;
    }

    public function id_user(){
        return $this->user_id();
    }

    protected function delete_user($id){
        $query = $this->query("delete from user where id = '".$id."'");
        return $query;
    }

    public function user_delete($id){
        return $this->delete_user($id);
    }

    protected function ubah_user(){
        $query = $this->query("update user set
        username = '".$this->username."',
        phone = '".$this->phone."'
        where id = '".$_POST['id']."'");
        return $query;
    }
    public function user_ubah(){
        return $this->ubah_user();
    }

    protected function all_user(){
        $query = $this->querys("select * from user");
        while($show = mysqli_fetch_assoc($query)){
            $build[] = $show;
        }
        return $build;
    }

    public function user_all(){
        return $this->all_user();
    }
    protected function insert_harga(){
        $query = $this->querys("insert into harga (harga_pasar,harga_pribadi,biaya,waktu) values(
            '".$this->harga_pasar."',
            '".$this->harga_pribadi."',
            '".$this->biaya."',
            '".$_POST["tanggal"]."'
        )");
        return $query;
    }

    public function harga_insert(){
        return $this->insert_harga();
    }

    public function numeric_harga(){
        if(is_numeric($this->harga_pribadi) == true and is_numeric($this->harga_pasar) and is_numeric($this->biaya)){
            return true;
        }else{
            return false;
        }
    }
    protected function date_harga(){
        $query = $this->querys("select * from harga where waktu = '".$_POST["tanggal"]."'");
        $row = mysqli_num_rows($query);
        if($row > 0){
            return false;
        }else{
            return true;
        }
    }

    public function harga_date(){
        return $this->date_harga();
    }

    protected function data_harga($waktu){
        $query = $this->querys("select * from harga where waktu like '%$waktu%'");
        $row = mysqli_num_rows($query);
        if($row < 1){
            return false;
        }else{
            return true;
        }
    }

    public function harga_data($waktu){
        return $this->data_harga($waktu);
    }

    protected function harga_ini($waktu){
        $query = $this->querys("select * from harga where waktu like '%$waktu%'");
        while($show = mysqli_fetch_assoc($query)){
            $build[] = $show;
        }
        return $build;
    }
    
    public function ini_harga($waktu){
        return $this->harga_ini($waktu);
    }

    protected function ubah_harga(){
        $query = $this->querys("update harga set
        harga_pasar = '".$this->harga_pasar."',
        harga_pribadi = '".$this->harga_pribadi."',
        biaya = '".$this->biaya."'
        where id = '".$_POST["id"]."'
        ");
        return $query;
    }

    public function harga_ubah(){
        return $this->ubah_harga();
    }

    protected function delete_harga($id){
        $query = $this->querys("delete from harga where id = '".$id."'");
        return $query;
    }

    public function harga_delete($id){
        return $this->delete_harga($id);
    }


    public function numeric_setoran(){
        if(is_numeric($this->timbangan) == true and is_numeric($this->keranjang)){
            return true;
        }else{
            return false;
        }
    }

    protected function insert_setoran(){
        $query = $this->query("insert into setoran (waktu,username,timbangan,keranjang) values(
            '".$_POST["tanggal"]."',
            '".$this->username."',
            '".$this->timbangan."',
            '".$this->keranjang."'
        )");
        return $query;
    }

    public function setoran_insert(){
        return $this->insert_setoran();
    }

    protected function setoran_check(){
        $query = $this->query("select * from setoran where username = '".$this->username."' and waktu = '".$_POST["tanggal"]."'");
        $row = mysqli_num_rows($query);
        if($row > 0){
            return false;
        }else{
            return true;
        }

    }

    public function check_setoran(){
        return $this->setoran_check();
    }

    protected function setoran_data(){
        $query = $this->querys("select * from setoran");
        while($show = mysqli_fetch_assoc($query)){
            $build[$show["id"]] = $show;
        }
        return $build;
    } 

    public function data_setoran(){
        return $this->setoran_data();
    }
    
    protected function ubah_setoran(){
        $query = $this->querys("update setoran set
        timbangan = '".$this->timbangan."',
        keranjang = '".$this->keranjang."',
        status = '".$_POST["status"]."'
        where id = '".$_POST["id"]."'
        ");
        return $query;
    }

    public function setoran_ubah(){
        return $this->ubah_setoran();
    }

    protected function delete_setoran($id){
        $query = $this->querys("delete from setoran where id = '".$id."'");
        return $query;
    }

    public function setoran_delete($id){
        return $this->delete_setoran($id);
    }

}

?>