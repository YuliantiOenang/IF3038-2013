<?php
require_once('header.php');
	if((isset($_POST['filter'])) && (isset($_POST['keyword'])) && !empty($_POST['keyword']) && $_POST['keyword'] != "Enter search query"){
		$filter = $_POST['filter'];
		$keyword = $_POST['keyword'];
		echo ("<input type='text' id='filter' class='hidden' value='{$filter}'/> <input type='text' class='hidden' id='keyword' value='{$keyword}'/><input type='text' class='hidden' id='user' value='{$_SESSION['bananauser']}'/>");
?>	

			<div id="isi">				
				<div id="rightsidebar1">
					<ul class="user" id="searchAll">
					</ul>
				</div>
			</div>
			
			
			
			<div id="footer" class="home">
				<p>&copy Copyright 2013. All rights reserved<br>
				Chalkz Team<br>
				Yulianti - Adriel - Amelia</p>			
			</div>
		</div>

			
	</body>
</html>
<?php
}else{
		//echo "Anauthorized Access!!";
	}
?>

<script type="text/javascript" language="javascript">		
	document.onscroll = function(){
	//alert("+: "+(window.pageYOffset + window.innerHeight)+"hegi:"+document.height);
		if ((window.pageYOffset + window.innerHeight) > document.height){
			doSearch(document.getElementById('filter').value, document.getElementById('keyword').value, i++, document.getElementById('user').value);
			}
		
		
	}
</script>