
<div class="copyright text-right">
<p style="padding-right:100px"></p>
</div>
  <script src="user/js/jquery.scrollTo.js"></script>
	<script src="user/js/jquery.nav.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#nav').onePageNav({
			begin: function() {
			console.log('start')
			},
			end: function() {
			console.log('stop')
			}
		});
	});
	</script>
  