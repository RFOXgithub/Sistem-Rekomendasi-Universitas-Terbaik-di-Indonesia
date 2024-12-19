<div class="container">
    <h2>Data Kriteria</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Nilai</th>
                <th>Penjelasan</th>
                <th>Indicator</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($grouped_kriteria as $kriteria => $rows): ?>
                <tr>
                    <td rowspan="<?php echo count($rows); ?>"><?php echo $i++; ?></td>
                    <td rowspan="<?php echo count($rows); ?>"><?php echo $kriteria; ?></td>
                    <td><?php echo $rows[0]['nilai_sub_kriteria']; ?></td>
                    <td><?php echo $rows[0]['nama_sub_kriteria']; ?></td>
                    <td style="text-align: left;"><?php echo nl2br($rows[0]['indicator']); ?></td>
                </tr>
                <?php foreach (array_slice($rows, 1) as $row): ?>
                    <tr>
                        <td><?php echo $row['nilai_sub_kriteria']; ?></td>
                        <td><?php echo $row['nama_sub_kriteria']; ?></td>
                        <td style="text-align: left;"><?php echo nl2br($row['indicator']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo site_url('kriteria/perbandinganKriteria/'); ?>" class="btn btn-lanjut" style="margin-left: auto;">Lanjut</a>
</div>