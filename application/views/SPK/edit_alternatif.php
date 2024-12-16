<div class="alt-container">
    <h2 class="alt-form-title">Edit Alternatif</h2>
    <form action="<?php echo site_url('alternatif/update/' . $row->id_alternatif); ?>" method="post">
        <div class="alt-form-group">
            <label for="nama_universitas" class="alt-label">Nama Universitas</label>
            <input type="text" class="alt-input" id="nama_universitas" name="nama_universitas" value="<?php echo $row->nama_universitas; ?>" required>
        </div>

        <div class="alt-form-group">
            <label for="akreditasi" class="alt-label">Akreditasi</label>
            <select class="alt-input" id="akreditasi" name="akreditasi" required>
                <option value="">Pilih Akreditasi</option>
                <option value="1" <?php echo ($row->akreditasi == 1) ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo ($row->akreditasi == 2) ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo ($row->akreditasi == 3) ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo ($row->akreditasi == 4) ? 'selected' : ''; ?>>4</option>
            </select>
        </div>

        <div class="alt-form-group">
            <label for="fasilitas" class="alt-label">Fasilitas</label>
            <select class="alt-input" id="fasilitas" name="fasilitas" required>
                <option value="">Pilih Fasilitas</option>
                <option value="1" <?php echo ($row->fasilitas == 1) ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo ($row->fasilitas == 2) ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo ($row->fasilitas == 3) ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo ($row->fasilitas == 4) ? 'selected' : ''; ?>>4</option>
                <option value="5" <?php echo ($row->fasilitas == 5) ? 'selected' : ''; ?>>5</option>
            </select>
        </div>

        <div class="alt-form-group">
            <label for="biaya" class="alt-label">Biaya</label>
            <input type="number" class="alt-input" id="biaya" name="biaya" value="<?php echo $row->biaya_perkuliahan; ?>" required>
        </div>

        <button type="submit" class="alt-btn-primary">Update</button>

        <button style="margin-top:15px;" type="button" class="alt-btn-secondary" onclick="window.location.href='<?php echo site_url('alternatif'); ?>'">Batal</button>
    </form>
</div>