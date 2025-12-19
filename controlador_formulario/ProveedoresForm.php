<?php

namespace Controllers\Proveedores;

use Controllers\PublicController;
use Dao\Proveedores\ProveedoresModel;
use Utilities\Site;
use Utilities\Validators;
use Views\Renderer;
use Exception;

const ProveedoresList = "index.php?page=Proveedores";
const ProveedoresView = "Proveedores/form";

class ProveedoresForm extends PublicController
{
    private array $errores = [];

    private $modes = [
        "INS" => "Nuevo Proveedor",
        "UPD" => "Editando %s",
        "DSP" => "Detalle de %s",
        "DEL" => "Eliminando %s"
    ];

    private string $mode = "";
    private string $proveedor_id = "";
    private string $nombre = "";
    private string $contacto = "";
    private string $telefono = "";
    private string $estado = "ACT";

    private string $validationToken = "";

    public function run(): void
    {
        try {
            $this->page_init();

            if ($this->isPostBack()) {
                $this->errores = $this->validarPostData();

                if (count($this->errores) === 0) {
                    switch ($this->mode) {
                        case "INS":
                            ProveedoresModel::crearProveedor(
                                $this->nombre,
                                $this->contacto,
                                $this->telefono,
                                $this->estado
                            );
                            Site::redirectToWithMsg(ProveedoresList, "Proveedor creado correctamente");
                            break;

                        case "UPD":
                            ProveedoresModel::actualizarProveedor(
                                $this->proveedor_id,
                                $this->nombre,
                                $this->contacto,
                                $this->telefono,
                                $this->estado
                            );
                            Site::redirectToWithMsg(ProveedoresList, "Proveedor actualizado correctamente");
                            break;

                        case "DEL":
                            ProveedoresModel::eliminarProveedor($this->proveedor_id);
                            Site::redirectToWithMsg(ProveedoresList, "Proveedor eliminado correctamente");
                            break;
                    }
                }
            }

            Renderer::render(ProveedoresView, $this->preparar_datos_vista());
        } catch (Exception $ex) {
            Site::redirectToWithMsg(ProveedoresList, "Ocurrió un error");
        }
    }

    private function page_init(): void
    {
        if (!isset($_GET["mode"]) || !isset($this->modes[$_GET["mode"]])) {
            throw new Exception("Modo inválido");
        }

        $this->mode = $_GET["mode"];

        if ($this->mode !== "INS") {
            if (!isset($_GET["codigo"])) {
                throw new Exception("Código inválido");
            }

            $tmp = ProveedoresModel::obtenerProveedorPorId($_GET["codigo"]);

            $this->proveedor_id = $tmp["proveedor_id"];
            $this->nombre = $tmp["nombre"];
            $this->contacto = $tmp["contacto"];
            $this->telefono = $tmp["telefono"];
            $this->estado = $tmp["estado"];
        }
    }

    private function validarPostData(): array
    {
        $errors = [];

        $this->validationToken = $_POST["vlt"] ?? "";

        if (
            isset($_SESSION[$this->name . "_token"]) &&
            $_SESSION[$this->name . "_token"] !== $this->validationToken
        ) {
            throw new Exception("Token inválido");
        }

        $this->proveedor_id = $_POST["proveedor_id"] ?? "";
        $this->nombre = $_POST["nombre"] ?? "";
        $this->contacto = $_POST["contacto"] ?? "";
        $this->telefono = $_POST["telefono"] ?? "";
        $this->estado = $_POST["estado"] ?? "ACT";

        if (Validators::IsEmpty($this->nombre)) {
            $errors[] = "Nombre requerido";
        }

        if (!in_array($this->estado, ["ACT", "INA"])) {
            $errors[] = "Estado inválido";
        }

        return $errors;
    }

    private function generarToken()
    {
        $this->validationToken = md5(gettimeofday(true) . rand(1000, 9999));
        $_SESSION[$this->name . "_token"] = $this->validationToken;
    }

    private function preparar_datos_vista(): array
    {
        $viewData = [];

        $viewData["mode"] = $this->mode;
        $viewData["modeDsc"] = $this->modes[$this->mode];

        if ($this->mode !== "INS") {
            $viewData["modeDsc"] = sprintf($viewData["modeDsc"], $this->nombre);
        }

        $viewData["proveedor_id"] = $this->proveedor_id;
        $viewData["nombre"] = $this->nombre;
        $viewData["contacto"] = $this->contacto;
        $viewData["telefono"] = $this->telefono;
        $viewData["estado"] = $this->estado;

        $this->generarToken();
        $viewData["token"] = $this->validationToken;

        $viewData["errores"] = $this->errores;
        $viewData["hasErrores"] = count($this->errores) > 0;

        $viewData["idReadonly"] = $this->mode !== "INS" ? "readonly" : "";
        $viewData["readonly"] = in_array($this->mode, ["DSP", "DEL"]) ? "readonly" : "";
        $viewData["isDisplay"] = $this->mode === "DSP";

        $viewData["selected"][$this->estado] = "selected";

        return $viewData;
    }
}