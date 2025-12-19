<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores</title>
</head>
<body>

<section class="WWList">
    <h2>Listado de Proveedores</h2>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>
                    <a href="index.php?page=ProveedoresForm&mode=INS">Nuevo</a>
                </th>
            </tr>
        </thead>

        <tbody>
            {{foreach proveedores}}
            <tr>
                <td>{{proveedor_id}}</td>
                <td>{{nombre}}</td>
                <td>{{contacto}}</td>
                <td>{{telefono}}</td>
                <td>{{estado}}</td>
                <td>
                    <a href="index.php?page=ProveedoresForm&mode=UPD&codigo={{proveedor_id}}">Editar</a>
                    |
                    <a href="index.php?page=ProveedoresForm&mode=DEL&codigo={{proveedor_id}}">Eliminar</a>
                    |
                    <a href="index.php?page=ProveedoresForm&mode=DSP&codigo={{proveedor_id}}">Ver</a>
                </td>
            </tr>
            {{endfor proveedores}}
        </tbody>

        <tfoot>
            <tr>
                <td colspan="6">
                    Total de registros: {{total}}
                </td>
            </tr>
        </tfoot>
    </table>
</section>

</body>
</html>