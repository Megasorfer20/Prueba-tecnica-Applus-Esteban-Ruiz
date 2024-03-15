<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nueva Categoria
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newCategoryForm" action="#" method="post">
                <div class="modal-body">
                    <label for="name" class="form-label">Nombre Categoria</label>
                    <input type="text" name="name" id="name" class="form-control">
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
        fetch(`http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/category.controller.php?act=post`, {
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