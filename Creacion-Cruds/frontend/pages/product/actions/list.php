<?php
include "update.php";
include "delete.php";

$url = "http://localhost/Prueba-tecnica-Applus/Creacion-Cruds/backend/controller/product.controller.php?act=getAll";
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

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombe</th>
                    <th>Categoia</th>
                    <th>Precio</th>
                    <th>Creada en</th>
                    <th>Ultima Actualización</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($output as $out) {
                    ?>

                    <tr>
                        <td>
                            <?= $out->id; ?>
                        </td>
                        <td>
                            <?= $out->name; ?>
                        </td>
                        <td>
                            <?= $out->category; ?>
                        </td>
                        <td>
                            <?= $out->price; ?>
                        </td>
                        <td>
                            <?= $out->createdAt; ?>
                        </td>
                        <td>
                            <?= $out->updatedAt == null ? "Null" : $out->updatedAt; ?>
                        </td>
                        <td>
                            <?= insertModal($out->id, $out->name, $out->price) ?>
                            <?= insertDelete($out->id) ?>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombe</th>
                    <th>Categoia</th>
                    <th>Precio</th>
                    <th>Creada en</th>
                    <th>Ultima Actualización</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>