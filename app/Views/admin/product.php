<?= $this->extend('admin\template\main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <div
    class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <div class="row">
      <div class="form-group">
        <select name="jenis_product" class="form-control" id="product-select-variant">
          <option value="0">Semua</option>
          <?php foreach ($dataVariant as $variant) : ?>
            <option value="<?= $variant['id'] ?>"><?= $variant['jenis_product'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <a href="<?= base_url('/admin/form/product') ?>" class="align-self-start mt-1 ml-2 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Product</a>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-10 col-md-6 mb-4">
      <table id="table-product" class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Gambar</th>
            <th scope="col">Harga</th>
            <th scope="col">Jenis</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($dataProducts) <= 0) : ?>
            <tr>
              <th scope="row">#</th>
              <td>Data masih kosong</td>
            </tr>
          <?php endif; ?>
          <?php $i = 1;
          if (count($dataProducts) > 0) : ?>
            <?php foreach ($dataProducts as $data) : ?>
              <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data['nama'] ?></td>
                <?php if ($data['jenis_product'] == 'akun') : ?>
                  <td class="w-25"><img src="<?= base_url('user/src/img/products/') . $data['gambar'] ?>" class="img-thumbnail" alt="<?= $data['nama'] ?>"></td>
                <?php else : ?>
                  <td class="w-25"><img src="<?= base_url('user/src/img/vp/') . $data['gambar'] ?>" class="img-thumbnail" alt="<?= $data['nama'] ?>"></td>
                <?php endif; ?>
                <td><?= $data['harga'] ?></td>
                <td><?= $data['jenis_product'] ?></td>
                <td>
                  <a href="<?= base_url('admin/change/product/') . $data['id'] ?>" class="btn btn-warning"><i class="fas fa-pen-square"></i></a>
                  <a href="<?= base_url('admin/delete/product/') . $data['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection() ?>