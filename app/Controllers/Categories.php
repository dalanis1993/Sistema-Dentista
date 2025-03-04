<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Icon;
use CodeIgniter\CLI\Console;
use CodeIgniter\HTTP\ResponseInterface;

class Categories extends BaseController
{
    private $categoryModel;
    private $iconModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
        $this->iconModel = new Icon();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->getCategoriesWithIcons();

        return view('categories/index', $data);
    }

    public function new()
    {
        $data['icons'] = $this->iconModel->findAll();
        return view('categories/new', $data);
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getPost('nombre_categoria'),
            'color' => $this->request->getPost('color'),
            'icon_id' => $this->request->getPost('selectedIcon'),
        ];

        if ($this->categoryModel->insert($data)) {
            return redirect()->to('/categories');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
        }
    }

    public function edit($id)
    {
        $data['category']  = $this->categoryModel->getCategoryWithIcon($id);
        $data['icons'] = $this->iconModel->findAll();

        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getRawInput();
        var_dump($data);
        $data = [
            'name' => $this->request->getPost('nombre_categoria'),
            'color' => $this->request->getPost('color'),
            'icon_id' => $this->request->getPost('selectedIcon'),
        ];

        if ($this->categoryModel->insert($data)) {
            return redirect()->to('/categories');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
        }
    }

   
    public function delete($id)
    {
        // Verificamos si la categoría existe
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to('/categories')->with('error', 'Categoría no encontrada.');
        }

        // Intentamos eliminar la categoría
        if ($this->categoryModel->delete($id)) {
            return redirect()->to('/categories')->with('success', 'Categoría eliminada con éxito.');
        } else {
            return redirect()->to('/categories')->with('error', 'No se pudo eliminar la categoría.');
        }
    }
}
