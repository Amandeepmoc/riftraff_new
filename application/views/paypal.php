<?php include('header2.php'); ?>

<?php if($this->uri->segment(2) == 'success_item')
{  if($id == 'failed') { ?>
	<h1>Your payment has failed.</h1>
	
<?php	} else { ?>
		
		<h1>Your payment has been successful.</h1>
	   <h1>Your Payment ID :  <?php echo $id; ?>.</h1>
		
		
	<?php	}?>
	
	
<?php
}
else if($this->uri->segment(2) == 'cancel_item')
{
	?>
	<h1>Your PayPal transaction has been canceled.</h1>
	
<?php	
}
?>

<?php include('footer.php');?>
