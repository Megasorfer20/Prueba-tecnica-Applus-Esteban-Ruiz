<?php $url2 = "http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/category.controller.php?act=getAll";
$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL, $url2);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
$output2 = curl_exec($curl2); 
if ($output2 === false) {
    echo "Error al realizar la solicitud cURL: " . curl_error($curl2);
} else {
    $output2 = json_decode($output2);
}

curl_close($curl2);
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nuevo Producto
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newCategoryForm" action="#" method="post">
                <div class="modal-body">
                    <label for="name" class="form-label">Nombre Producto</label>
                    <input type="text" name="name" id="name" class="form-control">
                    
                    
                    <label for="category" class="form-label">Categoria</label>
                    <select name="category" id="category" class="form-select">
                    <?php
                    foreach ($output2 as $out) {?>
                        <option value="<?= $out->id ?>"><?= $out->name ?></option>
                        <?php }?>
                    </select>

                    <label for="price" class="form-label">Precio</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" value="Ingresar" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('newCategoryForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        console.log(formData);
        fetch(`http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/product.controller.php?act=post`, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.log(data.error);
                    alert(data.message);
                } else {
                    alert('Categoria ingresada exitosamente');
                    window.location.href = 'http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al procesar la solicitud');
            });
    });
</script>