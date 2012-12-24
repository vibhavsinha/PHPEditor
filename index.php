<?php
if (isset($_POST['conwebdwebtent']))
{
	$myFile = "test.php";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = $_POST['conwebdwebtent'];
	fwrite($fh, $stringData);
	fclose($fh);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP Editor</title>
<style type="text/css" media="screen">
	#editor { 
		position: absolute;
		width :50%;
		top: 40px;
		right: 0;
		bottom: 0;
		left: 0;
	}
	#display{
		position:absolute;
		width:50%;
		border : none;
		top: 0;
		bottom:0;
		right:0;
		height:100%;
	}
	.toolbar{
		position:absolute;
		width:50%;
		background:#000;
		color:#fff;
		padding:0px;
		top:0;
		height:40px;
		left:0;
		font-family:arial;
		font-size:20px;
	}
</style>
<script type="text/javascript" src="jquery-1.8.2.min.js"></script>
</head>
<body>
<div class="toolbar"><b>PHP Editor</b>
	<button style="float:right;margin-right:20px"  onclick="submit_content();">Update</button>
	<button style="float:right;margin-right:10px">Save</button>
	<button style="float:right;margin-right:10px">Share</button>
</div>
<div id="editor">&lt;?php
function fact($n) {
    if($n ==0)
        return 1;
    else
        return $n*fact($n-1);
}
echo fact(5);
?&gt;</div>
<iframe id="display" src="test.php"></iframe>
<form method="post" id="testform" style="display:none">
<textarea type="hidden" id="content" name="conwebdwebtent"></textarea>
</form>
<script src="ace.js" type="text/javascript" charset="utf-8"></script>
<script>
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/github");
	editor.getSession().setMode("ace/mode/php");
	function submit_content(){
		content.innerHTML = editor.getSession();
		//document.forms[0].submit();
		var a  = editor.getSession();
		$.post('index.php',$("#testform").serialize(),function(data) {
		  $("#display")[0].src = $("#display")[0].src;
		});		
		return false;
	}

</script>
</body>
</html>
<!--
Developed by WebDweb web systems
-->
