<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Eliminar
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newCategoryForm" action="#" method="post">
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres Eliminar esta Categoria?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
function insertModal($id, $name)
{ ?>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="uptCategoryForm<?= $id ?>" action="#" method="post">
                    <div class="modal-body">
                        <label for="name<?= $id ?>">Nombre Categoria</label>
                        <input type="text" name="name<?= $id ?>" id="name<?= $id ?>" value="<?= $name ?>">
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
        fetch(`http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/category.controller.php?act=update&id=<?= $id ?>`, {
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
                    window.location.href = 'http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/category';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al procesar la solicitud');
            });
    });
    </script>

<?php } ?>