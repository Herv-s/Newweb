<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
if(!window.jQuery)
{
   var script = document.createElement('script');
   script.type = "text/javascript";
   script.src = "path/to/jQuery";
   document.getElementsByTagName('head')[0].appendChild(script);
}
</script>
<style type="text/css">
	.styling{
		padding: 200px;
	    font-size: 25px;
	    font-weight: bold;
		}
</style>

<body>

<?php
$handle = fopen("websitelist.txt", "r"); //Add website list filename here!
$numberT=fopen("numberOfTabs.txt", "r"); //Add Number of tabs filename here!


$count=0; $numCount="";
$members=array();
if ($handle && $numberT) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $members[$count]=$line;
        $count++;
    }
    while (($line2 = fgets($numberT)) !== false) {
        $numCount=$line2;
    }

    //$numCount=(int)$numCount;
    $a=$members;
	$random_keys=array_rand($a,$numCount);
	echo "<div style='display:none;' id='numberofT'>".$numCount."</div>";

			echo "<div class='styling'>";
			for ( $i = 0; $i < $numCount; $i++ )
			{
			  echo "<center><div id='link-".$i."'>".$a[$random_keys[$i]] . "</div></center><br>";
			}
			echo "</div>";

    fclose($handle);
} else {
    
} 


?>
</body>
<script type="text/javascript">
	var node = document.getElementById('numberofT');
	var ittrations = parseInt(node.textContent);
	const response = [];

	for (var h = 0; h < ittrations; h++) {
		var temp = document.getElementById('link-' + h);
		response[h] = temp.textContent;
	}

	  setTimeout(function(){

		 	for (let i = 0; i < ittrations; i++) {

			  window.open('https://'+response[i], '_blank');
				}        
        }, 5000);
</script>
</html>