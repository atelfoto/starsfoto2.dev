<?php // $menus=$this->requestAction(array('controller'=>'menus','action'=>'menu','admin'=>true)); ?>
<li class="treeview">
	<?php  echo $this->Html->link('<i class="icon-gauge"></i> '.__('dashboard'),
	 array('controller' => 'menus', 'action' => 'dashboard'),array('escape'=>false)); ?>
</li>
<?php //foreach ($menus as $k => $v): $v = current($v);?>
	<li class="treeview <?php // if ($this->request->controller ==$v['controller'] && $this->request->action =='admin_add' || $this->request->controller ==$v['controller'] && $this->request->action =='admin_index'  ):?>active<?php // endif; ?>">
		<a href="#"><i class="icon-<?php // $v['controller'];?>"></i>&nbsp;
		<span><?php // $v['controller']; ?>
		</span> <i class="icon-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li <?php // if ($this->request->controller ==$v['controller'] && $this->request->action =='admin_index'):?> class="active"<?php // endif; ?>>
			<?php // echo $this->Html->link("<i class='icon-circle-empty'></i>".__("%s manager",$v['controller']  ),
			// array('controller' => $v['controller'], 'action' => 'index'),array('escape'=>false));?>
			</li>
			<li <?php // if ($this->request->controller ==$v['controller'] && $this->request->action =='admin_add'):?> class="active"<?php //  endif; ?>>
				<?php // $this->Html->link("<i class='icon-circle-empty'></i>".__("add"),
				// array('controller' => $v['controller'], 'action' => 'add'),array('escape'=>false)); ?>
			</li>
    	</ul>
    </li>
<?php // endforeach ?>

