<!-- Base de datos -->
<?php include("db.php") ?>

<!-- Header -->
<?php include("includes/header.php") ?>

<div class="container p-2">
    <div class="row">

        <div class="col-md-6">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>   
            <form action="save.php" method="post" class="mt-2">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección" autofocus>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button class="btn btn-warning mt-2">Localizar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-2 mb-2">
                    <input type="number" name="latitud" class="form-control" disabled placeholder="lat">
                </div>
                <div class="form-group">
                    <input type="number" name="longitud" class="form-control" disabled placeholder="long">
                </div>

                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-success mt-2" name="save" value="Guardar direccion">
                </div>

            </form>                 
            <div id="map"></div>                            
        </div>

        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Direccion</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM direcciones";
                    $result_direcciones = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_direcciones)) { ?>
                        <tr>
                            <td><?php echo $row['direccion'] ?></td>
                            <td><?php echo $row['latitud'] ?></td>
                            <td><?php echo $row['longitud'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("includes/footer.php") ?>