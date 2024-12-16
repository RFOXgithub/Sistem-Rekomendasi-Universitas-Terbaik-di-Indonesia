<div class="container">
    <h2>Masukkan Perbandingan</h2>
    <form method="POST" action="<?php echo site_url('kriteria/hitung_matriks'); ?>" id="comparisonForm">
        <table>
            <tr>
                <th>Kriteria 1</th>
                <th>Nilai</th>
                <th>Kriteria 2</th>
            </tr>
            <tr>
                <td>Akreditasi</td>
                <td>
                    <input type="number" name="akreditasi_fasilitas" step="0.01" min="0" max="5" value="0" required>
                </td>
                <td>Fasilitas</td>
            </tr>
            <tr>
                <td>Akreditasi</td>
                <td>
                    <input type="number" name="akreditasi_biaya" step="0.01" min="0" max="5" value="0" required>
                </td>
                <td>Biaya</td>
            </tr>
            <tr>
                <td>Fasilitas</td>
                <td>
                    <input type="number" name="fasilitas_biaya" step="0.01" min="0" max="5" value="0" required>
                </td>
                <td>Biaya</td>
            </tr>
        </table>
        <br>
        <button type="submit" class="btn btn-lanjut" style="margin-left: auto;">Lanjut</button>
    </form>
</div>

<script>
    document.getElementById('comparisonForm').addEventListener('submit', function(event) {
        const inputs = document.querySelectorAll('input[type="number"]');
        let isValid = true;

        inputs.forEach(input => {
            if (parseFloat(input.value) === 0) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }
        });
        if (!isValid) {
            alert("Nilai tidak boleh 0, silakan masukkan nilai yang valid.");
            event.preventDefault();
        }
    });
</script>