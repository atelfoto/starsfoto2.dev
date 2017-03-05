<p>
	<strong>Bonjour <?php echo $username; ?></strong>
</p>

<p>Pour activer votre compte suivez le lien : </p>
<p><?php // echo $this->Html->link('Activer mon compte',$this->Html->url($link,true)); ?></p>


<p><?php //  $this->Html->url(array('controller' => 'users', 'action' => 'activate', $id, $token),true); ?></p>
<p><?= $this->Html->link('Activer mon compte',$this->Html->url(array('controller' => 'users', 'action' => 'activate', $id,"admin"=>false, $token),true)); ?></p>

