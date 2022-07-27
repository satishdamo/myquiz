<?php
session_start();

if(!isset($_SESSION['name']))
	header('Location:logout.php');
 

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

require_once 'process_dataV1.php';


?>





<!DOCTYPE html>
<html lang="en">


<head>
  <title>myQuiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once 'includes/styles.php' ?>
</head>

<body>


<?php require_once 'includes/header.php'; ?>


  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!-- <p><a href="dashboard.php">Dashboard</a></p> -->
      <!-- <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p> -->
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
					
					<?php if(!empty($arrLastattemptData[0]['score']) && $arrLastattemptData[0]['subject_id']==$data['subject_id']) { ?>
						<label>Your Last score is <?=$arrLastattemptData[0]['score']?></label>&nbsp;
						<button type="button" class="btn btn-info btn-sm btnExamtake" data-id="<?=$data['subject_id']?>"> Retake Quiz</button>
					<?php } else { ?>
						<button type="button" class="btn btn-primary btn-sm btnExamtake" data-id="<?=$data['subject_id']?>"> Start Quiz</button>	
					<?php } ?>	
				</div>
				</div><br/>
			<?php $counter++; } ?>

	   </div>	

	   <div class="panel panel-danger divQuizquestions">
			<div class="panel-heading"><strong>Choose the correct anwser!..</strong>&nbsp;&nbsp;&nbsp;<a data-backdrop="static" data-target="#modalQuitquiz" data-toggle="modal" href="#" class="btn btn-info btn-sm">Go Back</a></div>
			<div class="panel-body divQuestionPanelbody">
				
			</div>
	   </div>
	   
	   <div class="panel panel-success divScore">
			<div class="panel-heading">Your Score:</div>
			<div class="panel-body divPanelbody">
					<label id="labelScore" class="labelScore"></label>&nbsp;<label class="labelScore">out of 10</label>
						
			</div>
			<div class="panel-footer">
				<a href="dashboard.php" type="button" class="btn btn-primary btn-sm" >Go Back</a>
			</div>
	   </div>
	   
	   <!-- modal -->
	   
		<!-- Modal -->
		<div id="modalQuitquiz" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you Sure want to Quit the Quiz?</h4>
			  </div>
			  <div class="modal-body">
				<p><button type="button" class="btn btn-danger btnOkquitQuiz" >Ok</button>&nbsp;
					<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
				</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
	   
	   <!--- end modal --->
	  
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