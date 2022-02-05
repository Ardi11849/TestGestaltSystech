 <div id="container">
	<h1>Jawaban Soal 3</h1>

	<div id="body">
		<p>Jawaban Soal 3</p>
		<code>
			<?php 
				$datetime1 = date_create('2008-03-24');
				$datetime2 = date_create('2010-06-26');
				$interval = date_diff($datetime1, $datetime2);
				echo 'hasil date tanggal 2008-03-24 sampai 2010-06-26<br>';
				echo $interval->format('%y tahun, %m bulan, %d hari');
			?>
		</code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>