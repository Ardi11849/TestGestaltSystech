 <div id="container">
	<h1>Jawaban Soal 4</h1>

	<div id="body">
		<p>Jawaban Soal 4</p>
		<code>
			<?php 
				foreach ($soal4 as $key) {
					echo '<ol><li>'.$key['mob'].'</li>';
					echo '<li>'.$key['email'].'</li>';
					if (empty($key['hp'])) {
						echo '<li>Tidak punya no hp</li></ol>'; 
					} else {
						echo '<li>'.$key['hp'].'</li></ol>';
					}
				}
			?>
		</code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>