 <div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
<div class="tabbable tabs-left span10"> 
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Overview</a></li>
    <li><a href="#tab2" data-toggle="tab">History</a></li>
    <li><a href="#tab3" data-toggle="tab">Comments & Ratings</a></li>
    <?php
	$i = 4;
    foreach($server as $tab){?>
		<li><a href="#tab<?= $i ?>" data-toggle="tab"><?= $tab?></a></li>
	 <?php $i++; } ?>
  </ul>
  <div class="tab-content">
  
   <div class="tab-pane active overview" id="tab1" data="overview-<?= $whereiam?>">
		<h1 class="lead pull-right"> overview<br/><span class="pull-right"><?= $ratings ?></span></h1>
    <table class="table table-bordered table-striped table-hover">
    <thead> 
	<tr> 
    <th>Server</th>
    <th>Codebase</th>
    <th>Release</th>
    <th>Datestamp</th>
   </tr>
   </thead>
	   <tbody id="overview"> 
	   
	   	      <tbody> 
	   </table>
    </div>
    
     <div class="tab-pane" id="tab2">
    <h1 class="lead pull-right"> history<br/><span class="pull-right"><?= $ratings ?></span></h1>
    <table class="table table-bordered table-striped table-hover sort">
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
      	foreach ($history as $sd) {
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
				echo "</td><td>".date('m-d-Y h:i:s',$sd->datestamp/ 1000)."";
				//echo "".$sd->md5."<br/>";
				//echo "".$sd->server."<br/>";
				echo "</td></tr>";
      	}
      	
      
      ?></tbody></table>
    </div>
    <div class="tab-pane" id="tab3" data="comments-<?= $whereiam?>">
    <h1 class="lead pull-right"> comments & ratings<br/>
      <span class="pull-right"><?= $ratings ?></span></h1>

      <div class="span12 pull-right">
        <?php
            foreach($comments as $comment){
              if($comment->comment != ''){
                echo '<div class="well well-small">';
                echo $comment->comment;
                echo '<hr><p class=" pull-right">Posted: ';
                echo $this->read->secs_to_h(time() - $comment->datestamp/1000);
                echo '</p><br/></div>';
              }
            }
        ?>
      </div>
    </div>
 <?php 
 	$i = 4;
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
 					echo "".date('m-d-Y h:i:s',$sd->datestamp/ 1000)."<br/>";
 					echo "".$sd->md5."<br/>";
 					echo "".$sd->release."<br/>";
 					echo "".$sd->server."<br/>";
 					echo "".$this->read->secs_to_h(time() - $sd->datestamp/ 1000)."";
 					echo "</tr>";
 	      	}
 	      	
 	      
 	      ?></table>
 	    </div>
	<?php $i++; }?>
	
    </div>
    
  </div>
  <?php if(count($notes)>0){?>
  <div class="span2 visible-desktop">
   <h1 class="lead pull-right"> notes</h1>
   <div class="span12 well well-small">
   <p><?= $notes['note'];?></p>
   <p>Posted: <?= $notes['date'];?></p>
   </div>
  </div>
  <?php }?>
  <div class="span2 visible-desktop" >
   <h1 class="lead pull-right">leave comment</h1>
   <div class="span12 well well-small">
  <form action="action/comment" method="post">
   <textarea class="span12" name="comment"></textarea>
	 <p class="pull-right">
			Rate this server

			<input type="number" data-max="5" data-min="1" name="rating" id="rating" class="rating" data-clearable="remove" />
</p>
<input type="hidden" value="<?= $whereiam ?>" name="environment"></input> 
<input type="submit" class="btn btn-block btn-success" value="Rate and Comment">
</form>
</div>
	</div>
<div class="span2 pull-right visible-desktop" >
   <h1 class="lead pull-right">facts</h1>
   <div class="span12 well well-small">
    <?php $this->load->view('facts/'.$whereiam.'facts');?>
   </div>
 </div>



</div>


</div>

