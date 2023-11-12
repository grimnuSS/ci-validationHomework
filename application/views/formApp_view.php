<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form İşlemleri</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Kayıt Formu</h1>

	<div id="body">
		<form action="<?php echo base_url("formApp/save")?>" method="post">
            <label for="ad">İsminiz: </label> <input type="text" name="ad" value="<?php echo isset($form_error) ? set_value("ad") : ""?>" placeholder="Adınızı Giriniz"><br><br>
			<?php if(isset($form_error)){ 
				echo form_error("ad");
			}?>
            <label for="soyad">Soyisminiz: </label> <input type="text" name="soyad" value="<?php echo isset($form_error) ? set_value("soyad") : ""?>" placeholder="Soyadınızı Giriniz"><br><br>
            <?php if(isset($form_error)){ 
				echo form_error("soyad");
			}?>
			<label for="email">E-Postanız: </label> <input type="email" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""?>" placeholder="E-Posta Adresinizi Giriniz"><br><br>
            <?php if(isset($form_error)){ 
				echo form_error("email");
			}?>
			<label for="sifre">Şifre: </label> <input type="password" name="sifre" value="<?php echo isset($form_error) ? set_value("sifre") : ""?>" placeholder="Şifre Giriniz"><br><br>
            <?php if(isset($form_error)){ 
				echo form_error("sifre");
			}?>
			<label for="sifreOnay">Şifre Onay: </label> <input type="password" name="sifreOnay" value="<?php echo isset($form_error) ? set_value("sifreOnay") : ""?>" placeholder="Şifre Onayı Giriniz"><br><br>
            <?php if(isset($form_error)){ 
				echo form_error("sifreOnay");
			}?>
			<input type="submit" value="Kişiyi Kaydet"><br><br>
        </form>
	</div>
</div>

</body>
</html>
