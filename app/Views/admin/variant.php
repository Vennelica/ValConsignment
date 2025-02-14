<?= $this->extend('admin\template\main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <div
    class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Variant Product</h1>
    <a
      href="#"
      class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addVariant"><i class="fas fa-plus fa-sm text-white-50"></i> Add Variant</a>
  </div>
  <?php if (session()->getFlashdata("error")) : ?>
    <div class="row">
      <div class="col-xl-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
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
  <div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Variant Product</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($dataVariant) <= 0) : ?>
            <tr>
              <th scope="row">#</th>
              <td>Data masih kosong</td>
            </tr>
          <?php else : ?>
            <?php $i = 1;
            foreach ($dataVariant as $data) : ?>
              <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data['jenis_product'] ?></td>
                <td><a href="<?= base_url('admin/delete/variant/') . $data['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addVariant" tabindex="-1" aria-labelledby="addVariantLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addVariantLabel">Add Variant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('/admin/create/variant') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="variant">Jenis Product</label>
            <input type="text" class="form-control <?= (session()->getFlashdata("validation")) ? 'is-invalid' : '' ?>" id="variant" aria-describedby="variantH" name="jenis_product" value="<?= (session()->getFlashdata("validation")) ? old("jenis_product") : "" ?>">
            <?php if (session()->getFlashdata("validation")) : ?>
              <small id="variantH" class="form-text text-danger invalid-feedback"><?= session()->getFlashdata("validation")["jenis_product"] ?></small>
            <?php else : ?>
              <small id="variantH" class="form-text text-muted">Ini akan digunakan untuk ketegori produk.</small>
            <?php endif; ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>