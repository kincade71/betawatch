<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
<div class="tabbable tabs-left"> 
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Overview</a></li>
    <li><a href="#tab2" data-toggle="tab">History</a></li>
    <?php
	$i = 3;
    foreach($server as $tab){?>
		<li><a href="#tab<?= $i ?>" data-toggle="tab"><?= $tab?></a></li>
	 <?php $i++; } ?>
  </ul>
  <div class="tab-content">
  
   <div class="tab-pane active" id="tab1">
    <h1 class="lead pull-right"><?= $whereiam?> overview</h1>
    <table class="table table-bordered table-striped table-hover">
      <?php      	
      	foreach ($overview as $sd) {
				echo '<tr class="';
				switch ($sd->success) {
				    case '1':
				        echo "alert alert-success";
				        break;
				    case '0':
				        echo "alert alert-error";
				        break;
				    case ($sd->datestamp - time())<=10:
			    		echo "alert alert-warning";
			    		break;
				    default:
				       echo "alert alert-warning";
				}
				echo'">';
				echo "<td>";
				echo $sd->server.' - ';
				switch ($sd->codebase) {
				    case 'fe':
				        echo "Front End - ";
				        break;
				    case 'be':
				        echo "Back End - ";
				        break;
				    default:
				       echo ucfirst($sd->codebase).' - ';
				}
				echo "".$sd->release." - ";
				echo "".$sd->datestamp."";
				//echo "".$sd->md5."<br/>";
				//echo "".$sd->server."<br/>";
				echo "</tr>";
      	}
      	
      
      ?></table>
    </div>
    
     <div class="tab-pane" id="tab2">
    <h1 class="lead pull-right"><?= $whereiam?> history</h1>
    <table class="table table-bordered table-striped table-hover">
      <?php      	
      	foreach ($history as $sd) {
				echo '<tr class="';
				switch ($sd->success) {
				    case '1':
				        echo "alert alert-success";
				        break;
				    case '0':
				        echo "alert alert-error";
				        break;
				    case ($sd->datestamp - time())<=10:
			    		echo "alert alert-warning";
			    		break;
				    default:
				       echo "alert alert-warning";
				}
				echo'">';
				echo "<td>";
				echo $sd->server.' - ';
				switch ($sd->codebase) {
				    case 'fe':
				        echo "Front End - ";
				        break;
				    case 'be':
				        echo "Back End - ";
				        break;
				    default:
				       echo ucfirst($sd->codebase).' - ';
				}
				echo "".$sd->release." - ";
				echo "".$sd->datestamp."";
				//echo "".$sd->md5."<br/>";
				//echo "".$sd->server."<br/>";
				echo "</tr>";
      	}
      	
      
      ?></table>
    </div>
    
 <?php 
 	$i = 3;
 	foreach($server as $tab){?>
 	<div class="tab-pane" id="tab<?= $i?>">
 	<h1 class="lead pull-right"><?= $tab?></h1>
 	    <table class="table table-bordered table-striped">
 	      <?php      	
 	      	foreach ($this->read->server($tab) as $sd) {
 					echo '<tr class="';
 					switch ($sd->success) {
 					    case '1':
 					        echo "alert alert-success";
 					        break;
 					    case '0':
 					        echo "alert alert-error";
 					        break;
 					    default:
 					       echo "alert alert-warning";
 					}
 					echo'">';
 					echo "<td>";
 					switch ($sd->codebase) {
 					    case 'fe':
 					        echo "Front End<br/>";
 					        break;
 					    case 'be':
 					        echo "Back End<br/>";
 					        break;
 					    case 'fru':
 					        echo "FRU<br/>";
 					        break;
 					    default:
 					       echo ucfirst($sd->codebase).' - ';
 					}
 					echo "".$sd->datestamp."<br/>";
 					echo "".$sd->md5."<br/>";
 					echo "".date('m-d-Y',$sd->release)."<br/>";
 					echo "".$sd->server."<br/>";
 					echo "</tr>";
 	      	}
 	      	
 	      
 	      ?></table>
 	    </div>
	<?php $i++; }?>
	
    </div>
  </div>
  
</div>

