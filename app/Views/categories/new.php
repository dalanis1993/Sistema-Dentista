<?= $this->extend('template/admin_template') ?>

<?= $this->section('content') ?>
<!--begin::Form Validation-->
<div class="card card-outline m-3">
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Categoria</div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="<?= base_url('categories') ?>" method="post" class="needs-validation" novalidate>
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3 mx-5 px-5">
                <!--begin::Col-->
                <div class="col-12">
                    <label for="nombre_categoria" class="form-label">Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        id="nombre_categoria"
                        name="nombre_categoria"
                        value=""
                        required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col-->


                <!--begin::Col-->
                <div class="col-12">
                    <label for="icons" class="form-label">Icono</label>
                    <input type="hidden" id='selectedIcon' name='selectedIcon'> <!-- prueba para guardar -->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Selecciona un icono
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php foreach ($icons as $icon): ?>
                                <li ><a data-id="<?= $icon->id; ?>" class="dropdown-item" href="#"><i  class="fa <?= $icon->tag; ?>"></i> <?= $icon->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="invalid-feedback">Seleccione un icono</div>
                </div>


                <!--end::Col-->
                <div class="col-12">
                    <label for="color" class="form-label">Color</label>
                    <input
                        type="color"
                        class="form-control"
                        id="color"
                        name="color"
                        value=""
                        required />
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
            <button class="btn btn-info" type="submit">Submit form</button>
        </div>
        <!--end::Footer-->
    </form>
    <!--end::Form-->
    <!--begin::JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.needs-validation').on('submit', function(event) {
                if (!this.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(this).addClass('was-validated');
            });
        });
    </script>
    <!--end::JavaScript-->





</div>
<!--end::Form Validation-->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url("js/categories/category_new.js") ?>"></script>
<?= $this->endSection() ?>