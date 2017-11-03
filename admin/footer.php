</div>
</div>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
  	// get current URL path and assign 'active' class
  	var pathname = window.location.pathname;
  	$('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
  })
</script>

</body>
<footer>
        created by west
</footer>
</html>
