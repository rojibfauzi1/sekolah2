<?php  ob_start(); ?>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama</th>
	  <th>Email</th>
	  <th>Kritik</th>
	  <th>Event</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM kritiksaran";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama'] ?></td>
	  <td><?php echo $row['email'] ?></td>
	  <td><?php echo $row['kritik'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskritiksaran&id=<?php echo $row['id_kritiksaran'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=detailkritiksaran&id=<?php echo $row['id_kritiksaran'] ?>">Detail</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>