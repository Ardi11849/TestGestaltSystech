 <div id="container">
	<h1>Jawaban Soal 2</h1>

	<div id="body">
		<p>Jawaban Soal 2</p>
		<code>
			<?php 
			for ($i=1; $i <= 10; $i++) { 
				if($i > 5)echo $i;
				for ($j=1; $j <= $i; $j++) { 
					echo '0';
				}
				if($i <= 5)echo $i;
				echo '<br>';
			}?>
		</code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>