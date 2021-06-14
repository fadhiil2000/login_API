<?php
//koneksi ke database
$server		="localhost";
$username	="root";
$password	="";
$database	="login";

$db=mysqli_connect($server,$username,$password,$database) or die("Koneksi Gagal");

//membaca data dari get request
$user = $_GET["username"];
$pass = $_GET["password"];
$api_key = $_GET["api_key"];

//memanggil atau membaca data
$query = "select * from users where username='$user' and password='$pass' ";
$hasil = mysqli_query($db,$query);
$data  = mysqli_fetch_array($hasil);
$nama  = $data['nama'];
//fungsi
if($nama!=''){ $response="TRUE"; }else{ $response="FALSE";}

$query2 = "select api_key from api_key where api_key='$api_key'";
$hasil2 = mysqli_query($db,$query2);
$data2  = mysqli_num_rows($hasil2);

if($data2>0){ $respon_key="TRUE"; }else{ $respon_key="FALSE";}

// File XML
header('Content-Type: text/xml');
echo"<?xml version='1.0'?>";

echo"<data>";
echo"<responkey>".$respon_key."</responkey>";
echo"<response>".$response."</response>";
echo"<nama>".$nama."</nama>";
echo"</data>";
?>