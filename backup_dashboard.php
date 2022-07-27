

<!DOCTYPE html>
<html lang="en">


<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once 'includes/styles.php' ?>
</head>

<body>


<?php require_once 'includes/header.php'; ?>


  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    
	
	<div class="col-sm-10 text-left"> 
      <div class="divIntro">
	  <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      </div>
	  
	  <h3 class="headMessage">Please select a Subject to proceed the Quiz!..</h3>
	  
	   <div class="panel-group divSubjects">
			<?php
			$arrcolor=['primary','success','info','warning','default','danger'];
			$counter=0;	
			foreach($arrSubjectData as $data) { ?>
				<div class="panel panel-<?=$arrcolor[$counter]?>">
				  <div class="panel-heading"><?=ucwords($data['subject'])?></div>
				  <div class="panel-body">
					
					<?php if(!empty($arrLastattemptData[0]['score'])) { ?>
						<label>Your Last score is<?=$arrLastattemptData[0]['score']?></label>&nbsp;
						<button type="button" class="btn btn-info btn-sm btnExamtake" data-id="<?=$data['subject_id']?>">Retake Quiz</button>
					<?php } else { ?>
						<button type="button" class="btn btn-primary btn-sm btnExamtake" data-id="<?=$data['subject_id']?>">Start Quiz</button>	
					<?php } ?>	
				</div>
				</div><br/>
			<?php $counter++; } ?>

	   </div>	

	   <div class="panel panel-danger">
			<div class="panel-heading">Choose the correct anwser!..</div>
			<div class="panel-body divPanelbody">
				
			</div>
	   </div>
	  
    </div>
	
    <!-- <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div> -->
  </div>
  
</div>



<?php require_once 'includes/footer.php' ?>

<?php require_once 'includes/script.php' ?>




</body>
</html>