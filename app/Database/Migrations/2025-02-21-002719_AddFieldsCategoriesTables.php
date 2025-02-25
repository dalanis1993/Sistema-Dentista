<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateCategoriesTable extends Migration
{
    public function up()
    {
        // Eliminar el campo 'description'
        $this->forge->dropColumn('categories', 'description');

        // Agregar los nuevos campos 'color' y 'icon_id'
        $this->forge->addColumn('categories', [
            'color' => [
                'type'       => 'VARCHAR',
                'constraint' => 7,
                'null'       => true,
                'after'      => 'name', // Colocarlo después del campo 'name'
            ],
            'icon_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'color',
            ],
        ]);

        // Agregar clave foránea a 'icon_id'
        $this->db->query("ALTER TABLE categories ADD CONSTRAINT fk_categories_icons FOREIGN KEY (icon_id) REFERENCES icons(id) ON DELETE SET NULL ON UPDATE CASCADE");
    }

    public function down()
    {
        // Eliminar la clave foránea
        $this->db->query("ALTER TABLE categories DROP FOREIGN KEY fk_categories_icons");

        // Eliminar los campos añadidos
        $this->forge->dropColumn('categories', ['color', 'icon_id']);

        // Restaurar el campo 'description'
        $this->forge->addColumn('categories', [
            'description' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'name',
            ],
        ]);
    }
}
