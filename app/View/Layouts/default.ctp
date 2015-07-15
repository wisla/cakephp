<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'WORDs');

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('add', 'demo', 'cake.generic'));
echo $this->Html->script(array('jquery-1.10.2.min'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
					<div class="container">
			<header class="clearfix">
				<span>Salt-Gallery LAnguage <span class="bp-icon bp-icon-about"</span></span>
				<h1>WORDs</h1>
				<nav>
					
					<!--<a href="words/display" class="bp-icon bp-icon-prev" data-info="Zarządzanie WORDsami"><span>Zarządzanie WORDsami</span></a>-->
					<?= $this->Html->link('', array('controller' => 'words', 'action' => 'display'), array('class' => 'bp-icon bp-icon-prev', 'data-info' => 'Admin'))?> 
					<?= $this->Html->link('', array('controller' => 'words', 'action' => 'add'), array('class' => 'bp-icon bp-icon-drop', 'data-info' => 'Add'))?> 
					<?= $this->Html->link('', array('controller' => 'words', 'action' => 'index'), array('class' => 'bp-icon bp-icon-archive', 'data-info' => 'Show'))?> 
					<!--<a href="words/index" class="bp-icon bp-icon-archive" data-info="WORDs"><span>WORDs</span></a>-->
                    
                    <?php
                    if($this->Session->read('Auth.User')){
                        echo $this->Html->link('', array('controller'=>'users', 'action'=> 'logout'), array('class' => 'bp-icon bp-icon-next', 'data-info' => 'Wyloguj'));
                    }else{
                        echo $this->Html->link('', array('controller'=>'users', 'action'=> 'login'), array('class' => 'bp-icon bp-icon-archive', 'data-info' => 'Zaloguj'));
						echo $this->Html->link('', array('controller'=>'users', 'action'=>'add'), array('class' => 'bp-icon bp-icon-archive', 'data-info' => 'Załóż konto'));
                    }
                    ?>
				</nav>
			</header>
			</div>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, ''); ?></h1>
            <h3>Welcome <?php print $this->Session->read('Auth.User.username'); ?></h3>
		</div>
			
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
