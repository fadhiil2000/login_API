<?php 
//untuk mengirim nilai post ke service.php 
//lalu service memberi respon true atau false

$username=$_POST['username'];
$password=$_POST['password'];

$url="http://localhost/login_api/sistem_a/service.php?username=".$username."&password=".$password."&api_key=3e4r5";

$bacaxml=simplexml_load_file($url);

foreach($bacaxml->responkey as $responkey){
    if($responkey=="TRUE"){

foreach($bacaxml->response as $respon){

//memberi aksi True atau False dari respon service
if($respon=="TRUE"){


    //echo"Login Berhasil !";
    session_start();
    $nama_lengkap="$bacaxml->nama";
    $_SESSION['nama']=$nama_lengkap;

    header('location:utama.php');


}else{


    echo"Login Gagal !";
}
}
}else{
    echo"Maaf Api Key Yang Digunakan Tidak Terdaftar";
}
      
}


?>