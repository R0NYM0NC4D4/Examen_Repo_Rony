<?php

namespace Controllers\Proveedores;

use Controllers\PublicController;
use Dao\Proveedores\ProveedoresModel;
use Views\Renderer;

class Proveedores extends PublicController
{
    public function run(): void
    {
        $viewData = [];

        $proveedores = ProveedoresModel::obtenerProveedores();
        $viewData["proveedores"] = $proveedores;
        $viewData["total"] = count($proveedores);

        Renderer::render("Proveedores/lista", $viewData);
    }
}