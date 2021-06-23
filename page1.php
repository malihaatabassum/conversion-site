<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CONVERSION SITE</title>
</head>
<body>
     
<?php


define("filepath", "data.txt");       
$converter = $result = $val = "";
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$converter = ($_POST['converter']);
    $val = ($_POST["val"]);

if($converter== "feet to inch")
{
	$result= $val*12;
}
if($converter== "meters to centimeters")
{
   $result= $val*100;
}
if($converter== "meters to kilometers")
{
   $result= $val/1000;
}
$data = array("converter" => $converter, "val" => $val, "result" => $result);
$data_encode = json_encode($data);
$res = write($data_encode);
if($res) {
echo "Sucessfully saved.";
}
else {
echo "Error while saving.";
}
}
 function write($content) {
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}

?>

     <fieldset>
     	
     	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <span style="color: rgb(192, 57, 43)"><p>Page 1 [Home]</p></span>

        <span style="color: rgb(192, 57, 43)"><p>Conversion site</p></span>

        <span style="color: rgb(52, 152, 219)">1.</span><a href="homepg1.php">Home</a>

        <span style="color: rgb(52, 152, 219)">2.</span><a href="conversionpg1.php">Conversion Rate</a>
        
        <span style="color:  rgb(52, 152, 219)">3.</span><a href="historypg1.php">History</a>
        <br></br>
        
        
        <span style="color:rgb(192, 57, 43)"><p>Converter:</p></span>
        <select id= "converter" name="converter">
        	<option value="feet to inch">feet to inches</option>
        	<option value="feet to meters ">feet to meters </option>
        	<option value="feet to cm">feet to cm</option>

        </select><br><br>


        <label for="val">Value:</label>
        <input type="text" id="val" name="val" pattern="[0-9]+">
        <input type="submit" name="Submit">
        <br></br>
        <label for="result">Results:</label>
        <input type="text" id="result" name="result">


     </fieldset>

<?php
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>

</body>
</html>