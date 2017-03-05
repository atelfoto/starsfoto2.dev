<?php $this->assign('title',"l'equipe"); ?>
<div class="container" style="background-color:#ecf0f5;">
	<div class="page-header">
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset- "><!-- Widget: user widget style 1 -->
			<div class="box box-widget widget-user"><!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-aqua-active" style="background-color: #f39c12;">
					<h3 class="widget-user-username"> <?php echo strtoupper("benevoles") ?></h3>
				</div>
			</div>
		</div>
		<div class="col-md-4"><!-- Widget: user widget style 1 -->
			<div class="box box-widget widget-user col-md-offset-3"><!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-aqua-active" style="background-color: #f39c12;">
					<h3 class="widget-user-username">CONSEIL D’ADMINISTRATION</h3>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-md-offset-4"><!-- Widget: user widget style 1 -->
			<div class="box box-widget widget-user"><!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-aqua-active" style="background-color: #f39c12;">
					<h3 class="widget-user-username">BUREAU</h3>
				</div>
			</div>
		</div>
	</div>
	<hr  class="style-two" style="border-style:dashed;background-color: #000; width: 80%; text-align: center">
	<div class="row">
		<div class="col-md-3 col-md-offset- "><!-- Widget: user widget style 1 -->
			<div class="box box-widget widget-user"><!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-aqua-active" style="background-color: #00ff00;">
					<h3 class="widget-user-username"> <?php echo strtoupper("salaries") ?></h3>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-md-offset-1"><!-- Widget: user widget style 1 -->
			<div class="box box-widget widget-user"><!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-aqua-active" style="background-color: #00a7d0;">
					<h3 class="widget-user-username"> <?php echo ucwords("henri dréan ") ?></h3>
					<h5 class="widget-user-desc">PRESIDENT</h5>
				</div>
				<div class="widget-user-image">
					<img class="img-circle" src="img/avatars/gravatar_thumb.jpg" alt="User Avatar">
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">&nbsp;</h5>
								<span class="description-text">&nbsp;</span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">&nbsp;</h5>
								<span class="description-text"></span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
						<div class="col-sm-4">
							<div class="description-block">
								<h5 class="description-header">&nbsp;</h5>
								<span class="description-text">&nbsp;</span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div>
			</div><!-- /.widget-user -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="padding-bottom: 50px;">
			<div class="box box-widget widget-user"> <!-- Widget: user widget style 1 -->
				<div class="widget-user-header bg-black" style="background: url('img/photo1.png') center center;"><!-- Add the bg color to the header using any of the bg-* classes -->
					<h3 class="widget-user-username" style="color: #fff;">
						<?php echo ucwords($user['User']['firstname'].' '. $user['User']['lastname']);?>
					</h3>
					<h5 class="widget-user-desc" style="color: #fff;">
						<?php echo strtoupper($user['User']['fonction']); ?>
					</h5>
				</div>
				<div class="widget-user-image">
					<img class="img-circle" src="img/avatars/gravatar_thumb.jpg" alt="User Avatar">
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">&nbsp;</h5>
								<span class="description-text">&nbsp;</span>
							</div>  <!-- /.description-block -->
						</div><!-- /.col -->
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">&nbsp;</h5>
								<span class="description-text">&nbsp;</span>
							</div> <!-- /.description-block -->
						</div><!-- /.col -->
						<div class="col-sm-4">
							<div class="description-block">
								<h5 class="description-header">&nbsp;</h5>
								<span class="description-text">&nbsp;</span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div>
			</div> <!-- /.widget-user -->
		</div>
	</div>
	<div class="row">
		<?php foreach ($users as $user): ?>
		<div class="col-md-2" style="min-height: 243px;">
			<div class="box box-primary">
				<div class="box-body box-profile" style="min-height: 243px;">
					<img class="profile-user-img img-responsive img-circle" src="img/avatars/gravatar_thumb.jpg" alt="User profile picture">
					<h3 class="profile-username text-center">
						<?php echo ucwords($user['User']['firstname']." ".$user['User']['lastname']); ?>
					</h3>
					<p class="text-muted text-center"><?php echo ucfirst( $user['User']['fonction']); ?></p>
					<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
				</div><!-- /.box-body -->
			</div>
		</div><!-- /.box -->
		<?php endforeach ?>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="padding-bottom: 50px;">
			<div class="box box-widget widget-user"> <!-- Widget: user widget style 1 -->
				<div class="widget-user-header bg-black" ><!-- Add the bg color to the header using any of the bg-* classes -->
					<h3 class="widget-user-username" style="text-align: center">
					<?php echo ucfirst("personnel en insertion"); ?>

					</h3>
					<h5 class="widget-user-desc" style="text-align: center;">
						<?php echo ucfirst("16 personnes en contrat de 6 mois renouvelable 1 fois"); ?>

					</h5>
				</div>
				<div class="box-footer">

				</div>
			</div> <!-- /.widget-user -->
		</div>
	</div>
</div>
