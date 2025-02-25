<?= $this->extend('template/admin_template') ?>

<?= $this->section('content') ?>


<div class="col p-3">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
            <a href="<?= base_url('categories/new') ?>">
                <button type="button" class="btn btn-primary btn-block" style="float: right;">Add</button>
            </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>Icono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr class="align-middle">
                            <td><?= esc($category['id']); ?></td>
                            <td><?= esc($category['name']); ?></td>
                            <td><input type="color" value="<?= esc($category['color']); ?>" disabled></input> </td>
                            <td><i data-bs-toggle="tooltip" data-bs-placement="top" title="<?= esc($category['name_icon']); ?>" class="fa <?= esc($category['tag']); ?>"></i></td>

                            <td>
                                <a href="<?= site_url('categories/edit/' . $category['id']); ?>"
                                    class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('categories/delete/' . $category['id']); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar esta categoría?');"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
    <!-- /.card -->

</div>



<?= $this->endSection() ?>