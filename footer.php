<?php
#Declares that this is the wordpress footer so it may be used with get_footer();
wp_footer();

#Creating basic text footer to sit at the bottom of pages. Calling in jQuery and Bootstrap JS.
echo "
<hr>
<footer style=\"text-align:center;\">
		<p><i><i class=\"fa fa-code fa-lg\"></i> with <a href='https://github.com/Cole-Campbell'><i class=\"fa fa-heart\" style=\"color:#cc504a\"></i></a> by Cole.</i></i></p>
</footer>
</div>

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
</div>
</body>
</html>"
?>