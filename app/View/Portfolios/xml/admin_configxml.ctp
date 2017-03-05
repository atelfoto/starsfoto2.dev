<?php  App::uses('Xml', 'Utility');
$nbre = sprintf('%02d', 0);
debug($nbre);die();
?>

<juiceboxgallery showOpenButton="true" thumbFrameColor="rgba(204,204,204,0.5)" useFullscreenExpand="true">
<?php while($nbre<=$counts){$nbre++ ?>
	<image imageURL="images/<?php  echo $portfolio['Portfolio']['id']; ?>-<?php  echo $nbre; ?>" thumbURL="thumbs/<?php  echo $portfolio['Portfolio']['id']; ?>-<?php  echo $nbre; ?>" linkURL="" linkTarget="_blank">
		<title><![CDATA[ ]]></title>
		<caption><![CDATA[alb25]]></caption>
	</image>
<?php } ?>
</juiceboxgallery>

