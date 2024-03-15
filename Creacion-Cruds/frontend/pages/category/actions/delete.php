<?php
function insertDelete($id)
{ ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $id ?>1">
        Eliminar
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop<?= $id ?>1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres Eliminar esta Categoria?<br />
                        Esta acción no se puede deshacer</p>
                </div>
                <form id="delCategoryForm<?= $id ?>" action="#" method="post">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Eliminar" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('delCategoryForm<?= $id ?>').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            console.log(formData);
            fetch(`http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/category.controller.php?act=delete&id=<?= $id ?>`, {
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