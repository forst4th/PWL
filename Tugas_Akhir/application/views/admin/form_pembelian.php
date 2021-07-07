<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pembelian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item active">Pembelian</li>
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
            <h3 class="card-title">Form Input Pembelian</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php echo (isset($alert)) ? $alert:'' ;?>
            <form method="post" action="<?php echo base_url()?>admin/simpan_pembelian">
              <input type="hidden" name="id" value="<?php echo (!empty($data)) ? $data->id:'';?>">
              <div class="form-group">
                <label>Obat</label>
                <select class="select2 form-control" name="obat" id="obat" required="">
                  <option value="" disabled="" selected="">Pilih Obat</option>
                  <?php foreach($obat as $row): ?>
                  <option value="<?php echo $row->id;?>" <?php echo (!empty($data->id_obat) == $row->id) ? 'selected':'';?>><?php echo $row->nama;?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label>Supplier</label>
                <select class="select2 form-control" name="supplier" id="supplier" required="">
                  <option value="" disabled="" selected="">Pilih Supplier</option>
                  <?php foreach($supplier as $row): ?>
                  <option value="<?php echo $row->id;?>" <?php echo (!empty($data->id_supplier) == $row->id) ? 'selected':'';?>><?php echo $row->nama;?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label>Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Qty" value="<?php echo (!empty($data)) ? $data->qty:'';?>" required="">
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?php echo (!empty($data)) ? $data->tanggal:'';?>" required="">
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