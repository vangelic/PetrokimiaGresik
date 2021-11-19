<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';

	$result = mysqli_query($koneksi, "SELECT checkin, checkout, nama_alat, nama FROM history, daftar_alat, user WHERE history.id_alat=daftar_alat.id_alat AND history.id_user=user.id_user AND history.checkout IS NOT NULL ORDER BY checkin DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Stock Bahan</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					
                <table class="table table-borderes text-center align-middle" id="mauexport">
				<thead>
                <tr>
					<th>No.</th>
					<th>Nama Alat</th>
					<th>Waktu</th>
					<th>Pengguna</th>
				</tr>
                </thead>
                <tbody>
				<?php $i = 1; ?>
				<?php 
					while ($row = mysqli_fetch_assoc($result)) : ?>
					<tr>
						<td><?=$i; ?></td>
						<td><?= $row["nama_alat"] ?></td>
						<td>
							<div class="card border-primary" style="max-width: 21rem;">
								<div class="card-body text-primary">
									<p class="card-text"><?= $row["checkin"] ?>-<?= $row["checkout"] ?></p>
								</div>
							</div>
						</td>
						<td><?= $row["nama"] ?></td>
					</tr>
					<?php $i++; ?>
				<?php 
					//endforeach; 
					endwhile;
				?>
                </tbody>
			</table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>