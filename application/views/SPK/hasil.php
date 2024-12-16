<div class="container">

    <?php if (!empty($weights)): ?>
        <h2>Bobot Kriteria (Dari AHP)</h2>
        <table>
            <tr>
                <th>Kriteria</th>
                <th>Bobot</th>
            </tr>
            <tr>
                <td>Akreditasi</td>
                <td><?php echo round($weights[0], 6); ?></td>
            </tr>
            <tr>
                <td>Fasilitas</td>
                <td><?php echo round($weights[1], 6); ?></td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td><?php echo round($weights[2], 6); ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <h2 style="margin-top:25px">Hasil Perhitungan Weighted Product (WP)</h2>
    <table>
        <tr>
            <th>Alternatif</th>
            <th>Akreditasi</th>
            <th>Fasilitas</th>
            <th>Biaya</th>
            <th>Vektor S</th>
            <th>Nilai Preferensi (V)</th>
        </tr>
        <?php foreach ($alternatif as $alt): ?>
            <tr>
                <td><?php echo $alt['nama_universitas']; ?></td>
                <?php foreach ($alt['kriteria'] as $val): ?>
                    <td><?php echo $val; ?></td>
                <?php endforeach; ?>

                <?php if (!empty($alt['s_value']) && !empty($alt['v_value'])): ?>
                    <td><?php echo round($alt['s_value'], 6); ?></td>
                    <td><?php echo round($alt['v_value'], 6); ?></td>
                <?php else: ?>
                    <td>Data belum dihitung</td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>


    <h2 style="margin-top:25px">Kesimpulan</h2>
    <?php

    usort($alternatif, function ($a, $b) {
        return $b['v_value'] <=> $a['v_value'];
    });
    ?>
    <p style="margin-right:auto">Alternatif terbaik adalah <strong><?php echo $alternatif[0]['nama_universitas']; ?></strong> dengan nilai preferensi <strong><?php echo round($alternatif[0]['v_value'], 6); ?></strong>.</p>
</div>