<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Proveedores</title>
</head>
<body>

<section class="WWForm">
    <h2>{{modeDsc}}</h2>

    {{if hasErrores}}
    <ul>
        {{foreach errores}}
        <li>{{this}}</li>
        {{endfor errores}}
    </ul>
    {{endif hasErrores}}

    <form action="index.php?page=ProveedoresForm&mode={{mode}}&codigo={{proveedor_id}}" method="post">

        <input type="hidden" name="vlt" value="{{token}}">

        <div>
            <label>ID</label>
            <input type="text" name="proveedor_id" value="{{proveedor_id}}" {{idReadonly}}>
        </div>

        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{nombre}}" {{readonly}}>
        </div>

        <div>
            <label>Contacto</label>
            <input type="text" name="contacto" value="{{contacto}}" {{readonly}}>
        </div>

        <div>
            <label>Teléfono</label>
            <input type="text" name="telefono" value="{{telefono}}" {{readonly}}>
        </div>

        <div>
            <label>Estado</label>
            {{ifnot readonly}}
            <select name="estado">
                <option value="ACT" {{selectedACT}}>Activo</option>
                <option value="INA" {{selectedINA}}>Inactivo</option>
            </select>
            {{endifnot readonly}}

            {{if readonly}}
            <input type="text" name="estado" value="{{estado}}" {{readonly}}>
            {{endif readonly}}
        </div>

        <div>
            <a href="index.php?page=Proveedores">Cancelar</a>

            {{ifnot isDisplay}}
            <button type="submit">Confirmar</button>
            {{endifnot isDisplay}}
        </div>

    </form>
</section>

</body>
</html>