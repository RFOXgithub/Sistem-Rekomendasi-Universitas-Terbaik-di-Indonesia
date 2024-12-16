<div class="container">
    <h2>Alternatif</h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Alternatif</th>
                <th colspan="3">Kriteria</th>
                <th rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>Akreditasi</th>
                <th>Fasilitas</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($alternatif as $row): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row->nama_universitas; ?></td>
                    <td><?php echo $row->akreditasi; ?></td>
                    <td><?php echo $row->fasilitas; ?></td>
                    <td><?php echo "Rp " . number_format($row->biaya_perkuliahan, 0, ',', '.'); ?></td>

                    <td>
                        <?php echo anchor('alternatif/edit/' . $row->id_alternatif, 'Edit <i class="icon-trash"></i>', array('class' => 'btn btn-mini btn-edit')); ?>
                        <?php echo anchor('alternatif/deleteAlternatif/' . $row->id_alternatif, 'Hapus <i class="icon-trash"></i>', array('class' => 'btn btn-mini btn-delete', 'onclick' => "return confirm('Are you sure to delete this alternatif?')")); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?php echo site_url('alternatif/tambah/'); ?>" class="btn btn-tambah" style="margin-left: auto;">Tambah Alternatif</a>
    <a href="<?php echo site_url('alternatif/process_wp/'); ?>" class="btn btn-lanjut" style="margin-left: auto;">Lanjut</a>
</div>