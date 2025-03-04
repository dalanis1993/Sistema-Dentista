<?= $this->extend('template/admin_template') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card card-outline m-3">
    <div class="card-header">
        <div class="card-title">Crear Categoria</div>
    </div>
    <form action="<?= base_url('categories') ?>" method="post" class="needs-validation" novalidate>
        <?= $this->include('categories/fields') ?>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url("js/categories/category_utils.js") ?>"></script>
<script src="<?= base_url("js/categories/category_new.js") ?>"></script>
<?= $this->endSection() ?>