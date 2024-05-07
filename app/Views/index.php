<!doctype html>
<html lang="es">
    <head>
        <!--STYLES-->
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!--Datatable-->
        <link href="<?= base_url('css/dataTables.dataTables.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('css/dataTables.bootstrap5.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('css/buttons.bootstrap5.min.css'); ?>" rel="stylesheet">

        <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet">
    </head>
    <body class="content">
        <table id="products-table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
        </table>

        <!-- Modals -->
        <!--Agregar editar producto-->
        <div class="modal fade draggable" id="agregarEditarProductoBox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="productName" class="form-label">Nombre</label>
                                <input name="productName" data-msg= "Ingrese el nombre" type="text" id="productName" class="form-control" placeholder="Ingrese el nombre">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add-product">Agregar</button>
                        <button type="button" class="btn btn-primary edit-product" style="none">Editar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <footer>
        <!--SCRIPTS-->

        <script>
            var base_url = "<?php echo base_url(); ?>";
        </script>

         <!--JQUERY-->
         <script type="text/javascript" src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>
        <!--Bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!--JSZIP-->
        <script type="text/javascript" src="<?= base_url('jszip/dist/jszip.min.js'); ?>"></script>
        <!--PDF MAKE-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js" integrity="sha512-w61kvDEdEhJPJLSAJpuL+RWp1+zTBUUpgPaP+6pcqCk78wQkOaExjnGWrVbovojeisWGQS7XZKz+gr3L+GPYLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!--Datatable-->
        <script type="text/javascript" src="<?= base_url('js/dataTables.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/dataTables.bootstrap5.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/dataTables.buttons.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/buttons.bootstrap5.min.js'); ?>"></script>
        <!--Importante incluir estos para la visualizacion de los botones-->
        <script type="text/javascript" src="<?= base_url('js/buttons.colVis.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/buttons.html5.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/buttons.print.min.js'); ?>"></script>

        <!--SweetAlert2-->
        <script type="text/javascript" src="<?php echo base_url('js/sweetalert2.all.min.js'); ?>"></script>

        <script type="text/javascript" src="<?= base_url('js/generales.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/index.js'); ?>"></script>
    </footer>
</html>