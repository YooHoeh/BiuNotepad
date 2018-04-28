<?php
					
					foreach($arr_nb as $arr){
						$arr_note = noteClass::notebookFristSearch(6,$arr['id']);
						//输出$arr['bookName'];
						
				  		echo '<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
					  		<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						 	 		'.$arr['bookName'].'
								</a>
					  		</h4>
						</div>
				
				
				
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					  		<div class="panel-body">';
					  	foreach($arr_note as $arr1){
									// 输出$arr1['concent'];
							echo "<a>".$arr1['content']."</a>";
				  		}
						echo '</div>
						</div>';
						echo '</div>';
					}
		  		?>