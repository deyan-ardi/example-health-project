<html>
<head><title></title></head>
<body>
<h1>Input</h1>
<form action="" method="post">
NAMA : <input type="text" name="name" maxlength="60"/><br/>
PASSWORD : <input type="text" name="password" size="30"/><br/>
<input type="submit" name="Simpan" value="Simpan"/>
<input type="reset" name="Reset" value="Reset"/>
</form>
 
<?php
if (isset($_POST['Simpan'])) {
	//ambil data
	$name = $_POST['name'];
	$password = $_POST['password'];
 
	$arrdata = array($name,$password);
 
	$fp = fopen('users.txt', 'a+');
 
	$tulis = fputcsv($fp, $arrdata);
 
	fclose($fp);
}
?>
 
</body>
</html>