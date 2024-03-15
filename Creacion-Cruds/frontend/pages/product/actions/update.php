<?php
function insertModal($id, $name, $price)
{
    $url = "http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/category.controller.php?act=getAll";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    if ($output === false) {
        echo "Error al realizar la solicitud cURL: " . curl_error($curl);
    } else {
        $output = json_decode($output);
    }

    curl_close($curl);

    ?>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $id ?>">
        Actualizar
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop<?= $id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="uptCategoryForm<?= $id ?>" action="#" method="post">
                    <div class="modal-body">
                        <label for="name<?= $id ?>" class="form-label">Nombre Categoria</label>
                        <input type="text" name="name<?= $id ?>" id="name<?= $id ?>" value="<?= $name ?>" class="form-control">

                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-select">
                            <?php
                            foreach ($output as $out) { ?>
                                <option value="<?= $out->id ?>">
                                    <?= $out->name ?>
                                </option>
                            <?php } ?>
                        </select>

                        <label for="price" class="form-label">Precio</label>
                        <input type="text" name="price" id="price" value="<?= $price ?>" class="form-control">
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
        document.getElementById('uptCategoryForm<?= $id ?>').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            console.log(formData);
            fetch(`http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/product.controller.php?act=update&id=<?= $id ?>`, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.log(data.error);
                        alert(data.message);
                    } else {
                        alert('Producto ingresada exitosamente');
                        window.location.href = 'http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al procesar la solicitud');
                });
        });
    </script>

<?php } ?>