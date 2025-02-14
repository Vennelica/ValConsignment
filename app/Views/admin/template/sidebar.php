<ul
  class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
  id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a
    class="sidebar-brand d-flex align-items-center justify-content-center"
    href="<?= base_url('/admin/product') ?>">
    <div class="sidebar-brand-text mx-3">ValConsignment</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Heading -->
  <div class="sidebar-heading">Product</div>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/admin/product') ?>">
      <i class="fas fa-cart-plus"></i>
      <span>Products</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/admin/variant') ?>">
      <i class="fas fa-tools"></i>
      <span>Jenis Products</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>