<?php  App::uses('Xml', 'Utility');?>
<juiceboxgallery showOpenButton="true" thumbFrameColor="rgba(204,204,204,0.5)" useFullscreenExpand="true">
<?php
$nbre = sprintf('%02d', 0);
while($nbre<=$counts-1){$nbre++ ?>
	<image imageURL="images/<?php  echo $portfolio['Portfolio']['id']; ?>-<?php  echo sprintf('%02d',$nbre); ?>.jpg" thumbURL="thumbs/<?php  echo $portfolio['Portfolio']['id']; ?>-<?php  echo sprintf('%02d',$nbre); ?>.jpg" linkURL="" linkTarget="_blank">
		<title><![CDATA[<?php  echo $portfolio['Portfolio']['slug']; ?> ]]></title>
		<caption><![CDATA[]]></caption>
	</image>
<?php } ?>
</juiceboxgallery>
