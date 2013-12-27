	<h1 class="lead pull-right"><?= $whereiam?> overview</h1>
    <table class="table table-bordered table-striped table-hover">
    <thead> 
	<tr> 
    <th>Server</th>
    <th>Codebase</th>
    <th>Release</th>
    <th>Datestamp</th>
   </tr>
   </thead>
	   <tbody> 
	      <?php      	
	      	foreach ($overview as $sd) {
	      		$time = date('s',(time() - ($sd->datestamp/ 1000)));
					echo '<tr class="';
					switch ($time) {
					    case ($time <= 60):
					        echo "alert alert-success";
					        break;
					    case ($time >= 300):
					        echo "alert alert-error";
					        break;
					    default:
					       echo "alert alert-success";
					}
					echo'">';
					echo "<td>";
					echo $sd->server.'</td><td>';
					switch ($sd->codebase) {
					    case 'fe':
					        echo "Front End";
					        break;
					    case 'be':
					        echo "Back End";
					        break;
					    default:
					       echo ucfirst($sd->codebase).'';
					}
					echo "</td><td>".$sd->release."";
					echo "</td><td>".date('m-d-y h:i:s',$sd->datestamp/ 1000) .' - '. $this->read->secs_to_h(time() - $sd->datestamp/ 1000);
					//echo "".$sd->md5."<br/>";
					//echo "".$sd->server."<br/>";
					echo "</td></tr>";
	      	}
	      	
	      
	      ?>
	      <tbody> 
	   </table>