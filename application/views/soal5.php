 <div id="container">
	<h1>Jawaban Soal 5</h1>

	<div id="body">
		<p>Jawaban Soal 5</p>
		<code>
			<?php 
				$uang = 1586000;
				$pecahan1 = $uang/100000;
				$sisa1 = $uang-(100000*intval($pecahan1));
				$pecahan2 = $sisa1/50000;
				$sisa2 = $sisa1 - (50000*intval($pecahan2));
				$pecahan3 = $sisa2/10000;
				$sisa3 = $sisa2 - (10000*intval($pecahan3));
				$pecahan4 = $sisa3/5000;
				$sisa4 = $sisa3 - (5000*intval($pecahan4));
				$pecahan5 = $sisa4/1000;
				$sisa5 = $sisa4 - (1000*intval($pecahan5));
				echo 'Jumlah Uang: '.$uang.'</br><hr>';
				echo 'Jumlah Pecahan uang 100.000: <b>'.intval($pecahan1).'</b><br>';
				echo 'Sisa uang dari pecahan 100.000: <b>'.intval($sisa1).'</b><br><hr>';
				echo 'Jumlah Pecahan uang 50.000: <b>'.intval($pecahan2).'</b><br>';
				echo 'Sisa uang dari pecahan 50.000: <b>'.intval($sisa2).'</b><br><hr>';
				echo 'Jumlah Pecahan uang 10.000: <b>'.intval($pecahan3).'</b><br>';
				echo 'Sisa uang dari pecahan 10.000: <b>'.intval($sisa3).'</b><br><hr>';
				echo 'Jumlah Pecahan uang 5.000: <b>'.intval($pecahan4).'</b><br>';
				echo 'Sisa uang dari pecahan 5.000: <b>'.intval($sisa4).'</b><br><hr>';
				echo 'Jumlah Pecahan uang 1.000: <b>'.intval($pecahan5).'</b><br>';
				echo 'Sisa uang dari pecahan 1.000: <b>'.intval($sisa5).'</b><br><hr>';
			?>
		</code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>