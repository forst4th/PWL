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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel - Data Obat</h3>
                <div class="text-right">
                  <a href="<?php echo base_url()?>admin/form_obat" class="btn btn-primary">Tambah Data</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo (isset($alert)) ? $alert:'' ;?>
                <table id="tabel" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;foreach($data as $row):?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $row->kode;?></td>
                      <td><?php echo $row->nama;?></td>
                      <td><?php echo $row->satuan;?></td>
                      <td>Rp. <?php echo number_format($row->harga_beli);?></td>
                      <td>Rp. <?php echo number_format($row->harga_jual);?></td>
                      <td>
                        <a href="<?php echo base_url('admin/form_obat?id='.$row->id)?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url('admin/hapus_obat?id='.$row->id)?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->