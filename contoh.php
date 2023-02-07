<html><title>biston.loop@gmail.com</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

body {
  font-size: 12px;
  font-family: arial, sans-serif;
}

h1,h2,h3,h4 {
  font-family: arial, sans-serif;
}

</style>

<?php

session_start();

echo "
<br><br><br><hr>
<form action='' method='post'>
masukkan id-telegram<br>
<input type='submit' value='get-otp' name='get-otp'>
<input type='text' name='idtele' placeholder='masukkan id-telegram'>
</form>
<hr>

";


echo "
 <br><br><br><hr>
<form action='' method='post'>
<input type='submit' value='login' name='login'>
<input type='password' name='password' >
</form>
<hr>

";


if(!empty($_POST['idtele'])){

$idtele = $_POST['idtele'];
$otp = acak();
$_SESSION["pass"] = $otp; //otp akan dimasukkan ke session, bisa juga simpan di tempat lain, kondisikan saja
tkirim($otp,$idtele);
echo "<h1>OTP Terkirim !!!</h1>";
}


if(!empty($_POST['password'])){
if($_SESSION['pass']==$_POST['password']){ //check apakah input user sudah sesuai otp yg dikirim di telegram
  echo "<h1>Login Sukses !!!</h1>";
}else{
  echo "<h1>Login Gagal !!!</h1>";
}

}


function acak(){
$x = rand(10000,99999);
return $x;
}


function tkirim($pesan,$idtele) {
$apiToken = "botxxxxxxxxyyyyyyyyyyyy"; //ganti dengan token-telegram anda, pastikan sudah pernah chat dengan bot, krn bot tidak bisa yg chat duluan ke user
$data = array(
    'chat_id' => $idtele,
    'text' => $pesan,
    'parse_mode' => 'html',
);

$re="https://api.telegram.org/".$apiToken."/sendMessage?".http_build_query($data);
$res = file_get_contents($re);

}

?>
