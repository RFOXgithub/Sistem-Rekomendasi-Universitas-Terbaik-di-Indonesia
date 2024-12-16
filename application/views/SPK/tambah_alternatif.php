<div class="alt-container">
    <h2 class="alt-form-title">Tambah Alternatif</h2>
    <form action="<?php echo site_url('alternatif/simpan'); ?>" method="post">
        <div class="alt-form-group">
            <label for="nama_universitas" class="alt-label">Nama Universitas</label>
            <input type="text" class="alt-input" id="nama_universitas" name="nama_universitas" required>
        </div>

        <div class="alt-form-group">
            <label for="akreditasi" class="alt-label">Akreditasi</label>
            <select class="alt-input" id="akreditasi" name="akreditasi" required>
                <option value="">Pilih Akreditasi</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="alt-form-group">
            <label for="fasilitas" class="alt-label">Fasilitas</label>
            <select class="alt-input" id="fasilitas" name="fasilitas" required>
                <option value="">Pilih Fasilitas</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="alt-form-group">
            <label for="biaya" class="alt-label">Biaya</label>
            <input type="number" class="alt-input" id="biaya" name="biaya" required>
        </div>

        <button type="submit" class="alt-btn-primary">Simpan</button>

        <button style="margin-top:15px;" type="button" class="alt-btn-secondary" onclick="window.location.href='<?php echo site_url('alternatif'); ?>'">Batal</button>
    </form>
</div>