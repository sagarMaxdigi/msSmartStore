<?php
	$pagesize=200;

	$totalmembers=getAllMembers($filter);
	$totalmembers=count($totalmembers);
	$pages=$totalmembers/$pagesize;

	$remaining=$totalmembers%$pagesize;

	if($remaining>0)
		$pages++;
?>
    <div class="pager">
<?php
	for($i=1;$i<=$pages;$i++)
	{
		
		if($i>($start/200)+5)
		{
			if($i>5 && $i<$pages-5)
			{
				echo ".";
				continue;
			}
		}
		if($i<($start/200)-5)
		{
			if($i>5 && $i<$pages-5)
			{
				echo ".";
				continue;
			}
		}
		
		$st=($i-1)*$pagesize;

		if($start==$st)
			$current="class=current";
		else
			unset($current);

		if($_SERVER['QUERY_STRING']!="")
		{
			$qstring=$_SERVER['QUERY_STRING'];
			parse_str($qstring, $output);

			$output['start']=$st;
			$output['limit']=$pagesize;
			//$output['sort']=$sort;
			//$output['sort_type']=$sort_type;

			$qstring="";
			foreach($output as $key=>$value)
			{
				$qstring=$qstring."$key=$value&";
			}
		}
		else
			$qstring="start=$st&limit=$pagesize&sort=$sort";
?>
    <a <?php echo $current; ?> href="members.php?<?php echo $qstring; ?>"><?php echo $i; ?></a>
<?php
	}
?>
	<br>
	<span class="info">
	Total Members : <?php echo $totalmembers; ?>
     | </span> 
	<span class="info">
	Showing : <?php echo $start+1; ?> To <?php echo ($start+100>$totalmembers)?$totalmembers:$start+$pagesize; ?>
    </span>
</div>