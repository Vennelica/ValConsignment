<?= $this->extend('admin\template\main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <?php if (session()->getFlashdata("error")) : ?>
    <div class="row">
      <div class="col-xl-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
          <ul>
            <?php foreach (session()->getFlashdata('validation') as $err) : ?>
              <li><?= $err ?></li>
            <?php endforeach; ?>
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata("success")) : ?>
    <div class="row">
      <div class="col-xl-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div
    class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Add Product</h1>
  </div>
  <form action="<?= base_url('/admin/update/product') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="key" value="<?= $dataProduct['id'] ?>">
    <div class="row">
      <div class="col-xl-6">
        <div class="form-group">
          <label for="jenisProduct">Jenis Product</label>
          <select class="form-control" id="jenisProduct" name="jenis_product">
            <?php foreach ($dataVariant as $data) : ?>
              <option value="<?= $data['id'] ?>" <?= ($data['jenis_product'] == $dataProduct['jenis_product']) ? 'selected' : '' ?>><?= $data['jenis_product'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama Product</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= (session()->getFlashdata('validation')) ? old('nama') : $dataProduct['nama'] ?>" aria-describedby="namaHlp">
        </div>
        <div class="form-group">
          <label for="harga">Harga Product</label>
          <input type="text" inputmode="numeric" class="form-control" id="harga" aria-describedby="hargaHlp" name="harga" value="<?= (session()->getFlashdata('validation')) ? old('harga') : $dataProduct['harga'] ?>">
          <small id="hargaHlp" class="form-text text-muted">Contoh input 1k dan 1jt.</small>
        </div>
        <div class="form-group">
          <label for="deskripsi1">Deskripsi 1</label>
          <textarea class="form-control" id="deskripsi1" rows="3" name="deskripsi1" aria-describedby="desk1Hlp"><?= (session()->getFlashdata('validation')) ? old('deskripsi1') : $dataProduct['deskripsi1'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="deskripsi2">Deskripsi 2</label>
          <textarea class="form-control" id="deskripsi2" rows="3" name="deskripsi2" aria-describedby="desk2Hlp"><?= (session()->getFlashdata('validation')) ? old('deskripsi2') : $dataProduct['deskripsi2'] ?></textarea>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="form-group">
          <img src="<?= base_url('venelica/src/img/products/') . $dataProduct['gambar'] ?>" alt="Gambar prev" class="w-25 img-thumnail mb-2">
          <input type="file" class="form-control-file" id="gambarProduct" name="gambar">
        </div>
        <div class="form-group">
          <label for="deskripsi3">Deskripsi 3</label>
          <textarea class="form-control" id="deskripsi3" rows="3" name="deskripsi3" aria-describedby="desk3Hlp"><?= (session()->getFlashdata('validation')) ? old('deskripsi3') : $dataProduct['deskripsi3'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="deskripsi4">Deskripsi 4</label>
          <textarea class="form-control" id="deskripsi4" rows="3" name="deskripsi4" aria-describedby="desk4Hlp"><?= (session()->getFlashdata('validation')) ? old('deskripsi4') : $dataProduct['deskripsi4'] ?></textarea>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="available" name="available" <?= ($dataProduct['available'] == true) ? 'checked' : '' ?>>
          <label class="form-check-label" for="available">Available</label>
        </div>
        <div class="d-flex gap-3">
          <button type="reset" class="btn btn-danger mr-3">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
  </form>
</div>
</div>
<?= $this->endSection() ?>