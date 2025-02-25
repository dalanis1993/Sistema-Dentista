<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Icon;
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
        return view('categories/new',$data);
    }

    public function create()
    {
        var_dump($this->request->getPost());
       $data = [
        'name' => $this->request->getPost('nombre_categoria'),
        'color' => $this->request->getPost('color'),
        'icon_id' => $this->request->getPost('selectedIcon'),
    ];


       // Intentamos insertar los datos
       if ($this->categoryModel->insert($data)) {
           return redirect()->to('/categories'); // Redirigir a la lista de categorías
       } else {
           // Si no se pudo insertar, podemos mostrar un error
           return redirect()->back()->with('error', 'Hubo un problema al guardar los datos.');
       }
    }

}
