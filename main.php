<?php 
$data = file_get_contents('data.json');
$list = json_decode($data, false);

$currentDay = date("d", time());
$currentMonth = date("m", time());
foreach($list as $date){
	
if(
		$date->day === $currentDay &&
		$date->month === $currentMonth
	){
		// Section 1: Send email noptification
		include 'config.php';
		include 'mailer.php';
		$subject = "Remainder: ".$date->name."'s birthday" ;
		$bodyMail = "
		<div style='color: #34495E; max-width: 800px; background-color: #F7F9F9; padding:10px;'>
		<center>
		<h2>".$date->name."'s birthday</h2>
		<p>Please remember that ".$date->name."'s birthday is next the ".$date->day." of the month ".$date->month." </p>
		<hr>
		<p>Thank ou for your help in managing everything for this special date.</p>
		</center>
		</div>";
		mailer( 'info@mail.mail' , $subject , $bodyMail , $conf['mailUsername'] , $conf['mailPassword'] , $conf['mailHost'] );
	
		echo "Mail sent \n \n" ;
	}
}
?>