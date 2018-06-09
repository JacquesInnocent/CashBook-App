<!DOCTYPE html>
<html lang="en">
<head>
<title>jubilee university</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Style the body */
body {
    font-family: Arial;
    margin: 0;
}

/* Header/logo Title */
.header {
    padding: 20px;
    text-align: center;
    background: #1abc9c;
    color: white;
}

/* Increase the font size of the heading */
.header h1 {
    font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Column container */
.row {  
    display: -ms-flexbox; 
    display: flex;
    -ms-flex-wrap: wrap; 
    flex-wrap: wrap;
}

.side {
    -ms-flex: 30%; /* IE10 */
    flex: 30%;
    background-color: #f1f1f1;
    padding: 20px;
}

/* Main column */
.main {   
    -ms-flex: 70%; /* IE10 */
    flex: 70%;
    background-color: white;
    padding: 20px;
}

/* Fake image, just for this example */
.img {
    background-color: #aaa;
    width: 100%;
    padding:60px;
}

/* Footer */
.footer {
    padding: 8px;
    text-align: center;
    background: #ddd;
}
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width: 100%;
    }
}
</style>
</head>
<body>

<div class="header">
  <h1><b>Jubilee University</b></h1>
  <p>..we build for the future....</p>
</div>

<div class="navbar">
  <a href="welcome.php">HOME</a>
  <a href="studentregistration.php">COURSES</a>
  <a href="accounts.php">ACCOUNTS</a>
  <a href="#">EXAMS</a>
  <a href="profile.php">PROFILE</a>
  <a href="logout.php" class="right">LOG OUT</a>
</div>

<div class="row">
  <div class="side">
      <h2>ABOUT US</h2>
      <h5>college campus</h5>
       <img src="images/grad.jpeg" style="width:100%" height"100%">
      <p>welcome to the center of innovation and technology..</p>
      <h3>NEWS&EVENTS</h3>
      
      <div class="image" style="height:60px;">Image</div><br>
      <div class="image" style="height:60px;">Image</div><br>
      <div class="image" style="height:60px;">Image</div>
  </div>
  <div class="main">
      <h2>MAIN BUILDING</h2>
      
      <img src="images/main 2.jpeg" style="width:100%" height="400">
      
      <p>This is the ivory tower of the great university </p>
      <br>
      <h2>LIBRARY</h2>
      <h5></h5>
      <img src="images/lib 2.jpeg" style="width:100%"height"400">
      
      <p>A well equiped and fully stocked international university.</p>
  </div>
</div>

<?php
$start_year=2017; // Starting year for dropdown list box
$end_year=2027;  // Ending year for dropdown list box
////// end of settings ///////////
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net Calendar</title>
<link rel="canonical" href="http://www.plus2net.com/php_tutorial/cal2.php"/>
<script langauge="javascript">
function post_value(mm,dt,yy){
opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
/// cheange the above line for different date format
self.close();
}

function reload(form){
var month_val=document.getElementById('month').value; // collect month value
var year_val=document.getElementById('year').value;      // collect year value
self.location='cal2.php?month=' + month_val + '&year=' + year_val ; // reload the page
}
</script>
<style type="text/css">
table.main {
  width: 100%; 
border: 1px solid black;
  background-color: #9dffff;
}
table.main td {

font-family: verdana,arial, helvetica,  sans-serif;
font-size: 11px;
}
table.main th {
  border-width: 1px 1px 1px 1px;
  padding: 0px 0px 0px 0px;
 background-color: #ccb4cd;
}
table.main a{TEXT-DECORATION: none;}
table,td{ border: 1px solid #ffffff }
</style>
</head>
<body>
<?Php
@$month=$_GET['month'];
@$year=$_GET['year'];

if(!($month <13 and $month >0)){
$month =date("m");  // Current month as default month
}

if(!($year <=$end_year and $year >=$start_year)){
$year =date("Y");  // Set current year as default year 
}

$d= 2; // To Finds today's date
//$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); //This is to calculate number of days in a month
$no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);//calculate number of days in a month

$j= date('w',mktime(0,0,0,$month,1,$year)); // This will calculate the week day of the first day of the month
//echo $j;
$adj=str_repeat("<td bgcolor='#ffff00'>*&nbsp;</td>",$j);  // Blank starting cells of the calendar 
$blank_at_end=42-$j-$no_of_days; // Days left after the last day of the month
if($blank_at_end >= 7){$blank_at_end = $blank_at_end - 7 ;} 
$adj2=str_repeat("<td bgcolor='#ffff00'>*&nbsp;</td>",$blank_at_end); // Blank ending cells of the calendar

/// Starting of top line showing year and month to select ///////////////

echo "<table class='main'><td colspan=6 >

<select name=month value='' onchange=\"reload(this.form)\" id=\"month\">
<option value=''>Select Month</option>";
for($p=1;$p<=12;$p++){

$dateObject   = DateTime::createFromFormat('!m', $p);
$monthName = $dateObject->format('F');
if($month==$p){
echo "<option value=$p selected>$monthName</option>";
}else{
echo "<option value=$p>$monthName</option>";
}
}
echo "</select>
<select name=year value='' onchange=\"reload(this.form)\" id=\"year\">Select Year</option>
";
for($i=$start_year;$i<=$end_year;$i++){
if($year==$i){
echo "<option value='$i' selected>$i</option>";
}else{
echo "<option value='$i'>$i</option>";
}
}
echo "</select>";

echo " </td><td align='center'><a href=# onClick='self.close();'>X</a></td></tr><tr>";
echo "<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";

////// End of the top line showing name of the days of the week//////////

//////// Starting of the days//////////
for($i=1;$i<=$no_of_days;$i++){
$pv="'$month'".","."'$i'".","."'$year'";
echo $adj."<td><a href='#' onclick=\"post_value($pv);\">$i</a>"; // This will display the date inside the calendar cell
echo " </td>";
$adj='';
$j ++;
if($j==7){echo "</tr><tr>"; // start a new row
$j=0;}

}
echo $adj2;   // Blank the balance cell of calendar at the end 

echo "</tr></table>";
echo "<center><a href=cal2.php>Reset PHP Calendar</a></center>";

?>

<div class="footer">
 <h2><p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">jubilee@educ.com</a></p></h2>
 
</div>

</body>
</html>
