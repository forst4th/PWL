<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Data Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Form Input Data Obat</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php echo (isset($alert)) ? $alert:'' ;?>
            <form method="post" action="<?php echo base_url()?>admin/simpan_obat">
              <input type="hidden" name="id" value="<?php echo (!empty($data)) ? $data->id:'';?>">
              <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Obat" value="<?php echo (!empty($data)) ? $data->kode:'';?>" required="">
              </div>
              <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Obat" value="<?php echo (!empty($data)) ? $data->nama:'';?>" required="">
              </div>
              <div class="form-group">
                <label>Satuan</label>
                <select class="select2" name="satuan" id="satuan" required="">
                  <option value="" disabled="" selected="">Pilih Satuan</option>
                  <option value="Botol" <?php echo ((!empty($data->satuan)) == 'Botol') ? 'selected':'';?>>Botol</option>
                  <option value="Strip" <?php echo ((!empty($data->satuan)) == 'Strip') ? 'selected':'';?>>Strip</option>
                  <option value="Dos" <?php echo ((!empty($data->satuan)) == 'Dos') ? 'selected':'';?>>Dos</option>
                  <option value="Sachet" <?php echo ((!empty($data->satuan)) == 'Sachet') ? 'selected':'';?>>Sachet</option>
                </select>
              </div>
              <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" class="form-control" id="beli" name="beli" placeholder="Harga Beli" value="<?php echo (!empty($data)) ? $data->harga_beli:'';?>" required="">
              </div>
              <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" class="form-control" id="jual" name="jual" placeholder="Harga Jual" value="<?php echo (!empty($data)) ? $data->harga_jual:'';?>" required="">
              </div>
              <button type="submit" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->