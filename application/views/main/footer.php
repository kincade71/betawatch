<hr>
<div class="container-fluid">
  <footer>
    <div class="row-fluid">
      <div class="span4">
        <p>&copy;
          <?= $title ?>
          <?= date('Y'); ?>
        </p>
      </div>
      <div class="span4">
      </div>
      <div class="span4">
        <p class="pull-right"><a href="<?= base_url() ?>user_guide/"><i class="fa fa-fire"></i> Framework UG</a> | </p>
      </div>
    </div>
  </footer>
</div>
<!-- javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>

$(document).ready(function() {
    $('.sort').dataTable( {
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>"
    } );
} );

$.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
} );
</script>

<script>
$(document).ready(function() {
	$(".my-table").tablecloth();
});
</script>
<script>
$(document).ready(function(){
    $('.tipping').tooltip();
});
</script> 
<script>
$(document).ready(function(){
    $('.pop').popover();
});
</script> 
<script>
$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})
</script>
<script>
window.setInterval(function(){
	$(".overview").overview();
}, 1000);
</script>
</body></html>