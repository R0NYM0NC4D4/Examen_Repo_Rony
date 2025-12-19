<?php

namespace Dao\Proveedores;

use Dao\Table;

class ProveedoresModel extends Table
{
    public static function obtenerProveedores(): array
    {
        $sql = "SELECT proveedor_id, nombre, contacto, telefono, estado FROM proveedores";
        return self::obtenerRegistros($sql, []);
    }

    public static function obtenerProveedorPorId(string $proveedor_id): array
    {
        $sql = "SELECT proveedor_id, nombre, contacto, telefono, estado 
                FROM proveedores 
                WHERE proveedor_id = :proveedor_id";

        return self::obtenerUnRegistro($sql, [
            "proveedor_id" => $proveedor_id
        ]);
    }

    public static function crearProveedor(
        string $nombre,
        string $contacto,
        string $telefono,
        string $estado
    ) {
        $sql = "INSERT INTO proveedores (nombre, contacto, telefono, estado)
                VALUES (:nombre, :contacto, :telefono, :estado)";

        return self::executeNonQuery($sql, [
            "nombre"   => $nombre,
            "contacto" => $contacto,
            "telefono" => $telefono,
            "estado"   => $estado
        ]);
    }

    public static function actualizarProveedor(
        string $proveedor_id,
        string $nombre,
        string $contacto,
        string $telefono,
        string $estado
    ) {
        $sql = "UPDATE proveedores 
                SET nombre = :nombre,
                    contacto = :contacto,
                    telefono = :telefono,
                    estado = :estado
                WHERE proveedor_id = :proveedor_id";

        return self::executeNonQuery($sql, [
            "proveedor_id" => $proveedor_id,
            "nombre"       => $nombre,
            "contacto"     => $contacto,
            "telefono"     => $telefono,
            "estado"       => $estado
        ]);
    }

    public static function eliminarProveedor(string $proveedor_id)
    {
        $sql = "DELETE FROM proveedores WHERE proveedor_id = :proveedor_id";

        return self::executeNonQuery($sql, [
            "proveedor_id" => $proveedor_id
        ]);
    }
}