<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
    <?php
$typeName=array('fe'=>"Front End",'be'=>'Back End','fru'=>'ForRent University');
$path = "/releases/qa/";
$d = dir($path);
$dirs=array();
while (false !== ($entry = $d->read())) {
	if (($entry!=".") && ($entry!="..") && (!is_link($path.$entry))) {
		array_push($dirs,$path.$entry);
	}
}
$d->close();
asort($dirs);
$code=array();
foreach ($dirs as $dir) {
	preg_match("/\/releases\/qa\/([argon]+)(be|fe|fru)/",$dir,$matches);
	if ($matches[1] != "") {
		$name=ucfirst($matches[1])." ".$typeName[$matches[2]];
		$code[$matches[1]][$matches[2]]=array('type'=>$matches[2],'dir'=>$dir, 'name'=>$name);
	}
}
?>
<div class="tabbable tabs-left"> 
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Betawatch</a></li>
    <!--<li><a href="#tab2" data-toggle="tab">Neon</a></li>-->
  </ul>
  <div class="tab-content">
  
    <div class="tab-pane active" id="tab1">
    <table class="table table-bordered table-striped">
      <?php 

      foreach ($code as $c => $ode) {
		echo "<th>Back End</th>";
		echo "<th>Front End</th>";
		echo "<th>FRU</th>";
      	echo "<tr>";
      	foreach ($ode as $sd) {
      		$pushtimefile=$sd['dir']."/pushtime";
      		if (file_exists($pushtimefile)) {
      			$pushtime=" - Last Pushed ".date("Y-m-d H:i:s",file_get_contents($pushtimefile));
      		} else { $pushtime = 'Never Pushed'; }
      		echo "<td width=500>".$pushtime."<br/><br/>";
      		$cmd="svn info ".$sd['dir'];
      		echo (nl2br(`$cmd`));
      		echo "</td>";
      	}
      	echo "</tr>";
      }
      
      ?></table>
    </div>
    
  <!--<div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>-->
    
  </div>
</div>

    </div>
  </div>
  
</div>

