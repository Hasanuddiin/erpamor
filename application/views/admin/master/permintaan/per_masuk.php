<table  class="table table-bordered table-hover dataTable" id="example1">
					<thead>
						<tr>
							<th>No.</th>
							<th>No. Permintaan</th>
							<th>Admin</th>
							<th>Tanggal Permintaan</th>
							<th>Permintaan Dari</th>
							<th>Status Permintaan</th>
							<th>Detail Permintaan</th>

						</thead>
						<tbody>
							<?php $i = 0; foreach ($detail_masuk as $data) { $i++; ?>

							<tr>
								<td><?= $i ?></td>
								<td class="nr"><?= $data->invoiceOrderID ?></td>
								<td class="nr"><?= $data->nama_lengkap ?></td>
								<td align="center"><?= date("d-m-Y", strtotime($data->trxDate)) ?></td>
								<td class="nr"><?= $data->identityName ?></td>
								<?php 
								$status=$data->order_status;
								if($status=='0')
								{
									$status="<span class='label label-warning'>Belum Dicek</span>";
								}
								else if($status=='1')
								{
								$status="<span class='label label-info'>Sedang di Proses</span>";
								}
								if($status=='2')
								{
									$status="<span class='label label-success'>Disetujui</span>";
								}
								if($status=='3')
								{
									$status="<span class='label label-danger'>Ditolak</span>";
								}

								?>
								<td><?php echo $status; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>permintaan/detail_permintaan_masuk?orderID=<?php echo $data->invoiceOrderID ?>&identityID=<?php echo $data->identityID ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-search"></i> Detail</a>
								</td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>