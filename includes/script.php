  <script src="./includes/js/jquery.min.js"></script>
  <script src="./includes/js/bootstrap.min.js"></script>
  
  
  <script>
  
	$(document).ready(function(){
		
		var arrOptionsChoosen=[];
		$('.divQuizquestions').hide();
		$('.divScore').hide();
		$('.divSubjects').show();
		
		
		$('.btnOkquitQuiz').on('click',function(){
			var attempt_id=$(this).attr('data-attempt-id');
			//console.log(attempt_id); return false;	
			$.ajax({
			  method: "POST",
			  url: "process_dataV1.php",
			  /*for page 4, Quit the current quiz attempt */
			  data: {page_id:4,attempt_id:attempt_id},
			  success:function(response){
				  var obj=JSON.parse(response);
				  if(obj.success)
					  window.location.href="dashboard.php";
				  else{
					  alert('Unable to perform the request');
					  return false;
				  }
			  },
			  error:function(response){
				  console.log(response);
				  return false;
			  }
			  
			});
			
		});
		
		
		
		$('.btnExamtake').on('click',function(){
			
			
			
			var subject_id=$(this).attr('data-id');	
			$.ajax({
			  method: "POST",
			  url: "process_dataV1.php",
			  /*for page 2 show the question */
			  data: {page_id:2,subject_id:subject_id,attempt:1},
			  success:function(response){
				  
				  //console.log(response);
				  
				  if(response!=0) {
					  //console.log(response) //getting in json string 
					  var obj=JSON.parse(response); 
					  //console.log(obj); //getting in json object
					  
					  $('.divQuizquestions').show();
					  $('.divScore').hide();
					  $('.divSubjects').hide();
					  
					  var htmlString='';
					  var iAttemptid='';
					  htmlString+="<div class='divQuestionsContainer'>";
					  var icount=0;
					  for(var i=0;i<obj.length;i++) {
						  if(icount==0)
							 iAttemptid=obj[i]['attempt_id'];	
						
						  htmlString+="<div data-count="+icount+" class='divQuestions divQuestion"+icount+"' data-question-id='"+obj[i]['question_id']+"'><label>"+obj[i]['question']+"</label>";
						  
						  htmlString+="<ul>";
						  for(var j=0;j<obj[i]['options'].length;j++){
							htmlString+='<li><input data-option-id="'+obj[i]["options"][j]['option_id']+'"  data-question-id='+obj[i]['question_id']+'  data-attempt-id='+obj[i]['attempt_id']+' class="optionSelected optionIdselected'+obj[i]["options"][j]['option_id']+'" name="optionSelected" type="radio" value="'+obj[i]["options"][j]['option_id']+'"/>&nbsp;'+obj[i]["options"][j]['option']+'</li>';  
						  }
						  htmlString+='</ul><button type="button" data-question-id='+obj[i]['question_id']+'  data-count='+icount+' style="display:none;margin-right:10px;" class="btnPrevious btnPrevious'+icount+' btn btn-success btn-sm">Previous</button>';
						  htmlString+='<button type="button" data-question-id='+obj[i]['question_id']+' data-count='+icount+' style="margin-right:10px;" class="btnNext btnNext'+icount+'  btn btn-primary btn-sm">Next</button>';
						  htmlString+='<button data-attempt-id='+obj[i]['attempt_id']+' type="button" data-question-id='+obj[i]['question_id']+' data-count='+icount+' style="display:none;margin-top:20px;margin-left:125px;" class="btnSubmit btn btn-danger btn-sm">Submit</button></div>';
						  icount++;
					  }
					  //console.log(htmlString);
					  //return false;
					  
					  htmlString+='</div>';
					  $('.divQuestionPanelbody').html(htmlString);
					  $('.btnOkquitQuiz').attr('data-attempt-id',iAttemptid);
				  }
				  else {
					  
					alert('There are no Questions in this Subject');
					return false;	
				  }
				  
			  },
			  complete: function(){
				  
				function nextOrPreviousQdivSelected(iCurrent,arrOptionsChoosen) {
					var iChoosenOption=0;
					var velementNumber=Number(iCurrent);
					var iQuestionidNextChoosen=$('.divQuestionsContainer').find('.divQuestion'+velementNumber).attr('data-question-id');
					
						
					for(z=0;z<arrOptionsChoosen.length;z++) {
						if(arrOptionsChoosen[z]['question_id']==iQuestionidNextChoosen) {
							iChoosenOption=arrOptionsChoosen[z]['option_id'];
						}
					}
					
					if(iChoosenOption!=0)
						$('.divQuestionsContainer').find('.divQuestion'+velementNumber).find('.optionIdselected'+iChoosenOption).prop('checked', true);
				}  
				  
				$('.divQuestions').not('.divQuestion0').each(function(){
						$(this).hide();
				});
				
				$('.btnPrevious').on('click',function(){
					
					//console.log(arrOptionsChoosen);
					
					var iCurrent=$(this).attr('data-count');
					
					
					
					
					if(Number(iCurrent)>0) {
						/*function to make the next of previous div choosen*/
						nextOrPreviousQdivSelected(Number(iCurrent-1),arrOptionsChoosen);
					
						$('.divQuestions').each(function(){
							if($(this).attr('data-count')==Number(iCurrent)-1) {
								$(this).attr('style','display:block;');
								
							}
							else
								$(this).attr('style','display:none;');
							
						});
					}
					
					if(Number(iCurrent)==1)
						$('.btnPrevious0').attr('style','display:none');
					
					if(Number(iCurrent)==9) {
							$('.btnSubmit').attr('style','display:none');
					}
					
				});
				
				
				$('.optionSelected').on('click',function(){
					//(1,2,3),(1,2,3)
					var iQuestionid=$(this).attr('data-question-id');
					if(arrOptionsChoosen.length>0){
						for(var x=0;x<arrOptionsChoosen.length;x++) {
							if(iQuestionid==arrOptionsChoosen[x]['question_id']){
								arrOptionsChoosen.splice(x,1);
							}
						}
					}
					arrOptionsChoosen.push({'attempt_id':$(this).attr('data-attempt-id'),'question_id':$(this).attr('data-question-id'),'option_id':$(this).attr('data-option-id')})
				});
			
				
				$('.btnSubmit').on('click',function(){
					
				
					var currentChosenoption=$('.divQuestion9').find("input[name='optionSelected']:checked").val();
					
					if(currentChosenoption===undefined || currentChosenoption===null){
						alert('Please choose any option to Proceed!');
						return false;
					}
					
					var attemptId=$(this).attr('data-attempt-id');
					
					$.ajax({
					  method: "POST",
					  url: "process_dataV1.php",
					  /*for page 2 show the question */
					 data: {page_id:3,arrData:arrOptionsChoosen,attempt_id:attemptId,save:1},
					 success:function(response){
						
						
						
						if(response!='') {
							$('#labelScore').html(response);
							$('.divScore').show();
							$('.divQuizquestions').hide();
							$('.divSubjects').hide();
						}		
						else {
							alert('Response Error!...Please try Again!..');
							return false;
						}
					 },
					 error:function(response){
						console.log(response);
						return false;
					 }
					});
					
				});
				
			
			
				
				$('.btnNext').on('click',function(){
					
					//console.log(arrOptionsChoosen);
					
					var currentChosenoption=$(this).closest('.divQuestions').find("input[name='optionSelected']:checked").val();
					
					if(currentChosenoption===undefined || currentChosenoption===null){
						alert('Please choose any option to Proceed!');
						return false;
					}
										
					var iCurrent=$(this).attr('data-count');
					var iQuestionid=$(this).attr('data-question-id');
					
					/*function to make the next of previous div choosen*/
					if(Number(iCurrent)<9) 
						nextOrPreviousQdivSelected(Number(iCurrent)+1,arrOptionsChoosen);
					
					$('.divQuestions').each(function(){
						if($(this).attr('data-count')==Number(iCurrent)+1) {
							$(this).attr('style','display:block;');
							$('.divQuestions').find('.btnPrevious').show();
							
							
						}
						else
							$(this).attr('style','display:none;');
					});
					
					if(Number(iCurrent)==8) {
						$('.btnNext9').attr('style','display:none');
						$('.btnSubmit').attr('style','display:block;margin-top:20px;margin-left:125px;');
					}
					
					
					
					
				
				});
				
				
			},
			  error:function(response){
				console.log(response);  
				alert('Unable to process the request! Please Try again');
				/* write to log file*/
			  }
			});
  
		});
		
		
		
		
	});
  </script>
  
