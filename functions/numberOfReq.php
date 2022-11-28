<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$output = '';

if(isset($_POST["request"]))
{
if($_POST["request"]=="1"){
                        $output = '<div class="fillup-input-group">
                        <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                        <label class="fillup-label">Requirements: 1</label>
                        </div>';
}
else if($_POST["request"]=="2"){
   						 $output = '<div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> ';
}
else if($_POST["request"]=="3"){
    					$output = ' <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            ';
}
 else if($_POST["request"]=="4"){
    					$output = ' <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            ';
}
  else if($_POST["request"]=="5"){
    					$output = '<div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_5" id="sa" value="">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                          
                            ';
}
  else if($_POST["request"]=="6"){
    					$output = ' 			   <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_5" id="sa" value="">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_6" id="sa" value="">
                                  <label class="fillup-label">Requirements: 6</label>
                            </div>
                            ';
}
  else if($_POST["request"]=="7"){
    					$output = ' 			   <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_5" id="sa" value="">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_6" id="sa" value="">
                                  <label class="fillup-label">Requirements: 6</label>
                            </div>
                             <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_7" id="sad" value="">
                                  <label class="fillup-label">Requirements: 7</label>
                            </div>   
                            ';
}
  else if($_POST["request"]=="8"){
    					$output = ' 		   <div class="fillup-input-group">
                                  <input required  type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_5" id="sa" value="">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_6" id="sa" value="">
                                  <label class="fillup-label">Requirements: 6</label>
                            </div>
                          	 <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_7" id="sad" value="">
                                  <label class="fillup-label">Requirements: 7</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_8" id="sa" value="">
                                  <label class="fillup-label">Requirements: 8</label>
                            </div>
                          
                            ';
}
  else if($_POST["request"]=="9"){
    					$output = ' 				   <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_5" id="sa" value="">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_6" id="sa" value="">
                                  <label class="fillup-label">Requirements: 6</label>
                            </div>
                          	 <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_7" id="sad" value="">
                                  <label class="fillup-label">Requirements: 7</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_8" id="sa" value="">
                                  <label class="fillup-label">Requirements: 8</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_9" id="sa" value="">
                                  <label class="fillup-label">Requirements: 9</label>
                            </div>
                            ';
}
  else if($_POST["request"]=="10"){
    					$output = ' 				   <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_1" id="sadawd" value="">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                                  
                            <div class="fillup-input-group">      
                                  <input required type="text" class="fillup-field" name="req_2" id="sadaw" value="">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                           
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_3" id="sada" value="">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                            
                            <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_4" id="sad" value="">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_5" id="sa" value="">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_6" id="sa" value="">
                                  <label class="fillup-label">Requirements: 6</label>
                            </div>
                          	 <div class="fillup-input-group">     
                                  <input required type="text" class="fillup-field" name="req_7" id="sad" value="">
                                  <label class="fillup-label">Requirements: 7</label>
                            </div>      
                                  
                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_8" id="sa" value="">
                                  <label class="fillup-label">Requirements: 8</label>
                            </div>
                          
                          	 <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_9" id="sa" value="">
                                  <label class="fillup-label">Requirements: 9</label>
                            </div>
                          	<div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="req_10" id="sa" value="">
                                  <label class="fillup-label">Requirements: 10</label>
                            </div>
                            ';
}

  
}


echo $output;

?>