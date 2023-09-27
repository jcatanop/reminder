<?php 
		include 'config.php';
		include 'mailer.php';

// Get data about people
$data = file_get_contents('data.json');
$list = json_decode($data, false);

// get quotes for congrats
$quotes = file_get_contents('quotes.json');
$quotes = json_decode($quotes, false);

$currentDate = date("m/d", time());

foreach($list as $person){

	// Section 1: Send email reminder to administrative recipient
	if( $person->alert === $currentDate ){
		$subject = "Remainder: ".$person->name."'s birthday" ;
		$bodyMail = "
		<div style='color: #34495E; max-width: 800px; background-color: #F7F9F9; padding:10px;'>
			<center>
				<h2>".$person->name."'s birthday !</h2>
				<p>Please remember that ".$person->name."'s birthday is next ".$person->birthday."/".date("Y", time()).". </p>
				<hr>
				<p>Thank ou for your help in managing everything for this special date.</p>
			</center>
		</div>";
		mailer( 'info@mail.mail' , $subject , $bodyMail , $conf['mailUsername'] , $conf['mailPassword'] , $conf['mailHost'] );
	
		echo "Alert mail sent \n" ;
	}

	// Section 2: Send email congrats 
	if( $person->birthday === $currentDate ){
	
		$item = rand(1,12);

		// Section 1: Send email noptification
		$subject = "Happy Birthday !!!" ;
		$bodyMail = "
		<div style='color: #34495E; max-width: 800px; background-color: #F7F9F9; padding:50px 20px 75px 20px;'>
			<center>
				<h1 style='margin:10px 5px 20px 5px;'> 
					Happy Birthday Dear ".$person->name."!
				</h1>
				<p style='font-size: 24px;'>
					".$quotes[$item]."
				</p>
			</center>
		</div>";
		mailer( $person->mail , $subject , $bodyMail , $conf['mailUsername'] , $conf['mailPassword'] , $conf['mailHost'] );
	
		echo "Congrats mail sent \n" ;
	}

}
?>