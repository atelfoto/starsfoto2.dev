<p>
	<strong>Bonjour <?php echo $username; ?></strong>
</p>

<p>Pour activer ce compte suivez le lien : </p>
<p><?= $this->Html->link('Activer mon compte',$this->Html->url(array('controller' => 'users', 'action' => 'activate', $id, $token),true)); ?></p>
