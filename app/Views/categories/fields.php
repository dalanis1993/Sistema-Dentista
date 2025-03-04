<div class="card-body">
    <div class="row g-3 mx-5 px-5">
        <div class="col-12">
            <?= csrf_field() ?>
            <label for="nombre_categoria" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control"
                id="nombre_categoria"
                name="nombre_categoria"
                value="<?= isset($category) ? esc($category['name']) : '' ?>"
                required />
            <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-12">
            <label for="icons" class="form-label">Icono</label>
            <input type="hidden" id='selectedIcon' name='selectedIcon' value="<?= isset($category) ? esc($category['icon_id']) : '' ?>">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= isset($category) ? '<i class="fa ' . esc($category['tag']) . '"></i> ' . esc($category['name_icon']) : 'Selecciona un icono' ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($icons as $icon): ?>
                        <li data-id="<?= $icon->id; ?>" class="dropdown-item">
                            <a href="#" class="no-style-link">
                                <i class="fa <?= $icon->tag; ?>"></i> <?= $icon->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="invalid-feedback">Seleccione un icono</div>
        </div>
        <div class="col-12">
            <label for="color" class="form-label">Color</label>
            <input
                type="color"
                class="form-control"
                id="color"
                name="color"
                value="<?= isset($category) ? esc($category['color']) : '#000000' ?>"
                required />
            <div class="valid-feedback">Looks good!</div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button class="btn btn-info" type="submit">Guardar</button>
</div>