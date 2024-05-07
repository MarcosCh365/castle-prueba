$(document).ready(function() {
    initProductsTable();
});

function initProductsTable() { 
    productosTable = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "POST",
            url: base_url + 'product/getProducts'
        },
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Agregar Producto',
                className: 'dtc-button',
                action: function(e, dt, node, config) {
                    showAddProductModal();
                }
            },
            {
                text: 'Eliminar Producto',
                className: 'dtc-button',
                action: function(e, dt, node, config) {
                    deleteProduct();
                }
            },
            {
                text: 'Exportar',
                className: 'dtc-button',
                action: function(){},
                split: ['csv', 'pdf', 'excel']
            }
        ],
        lengthMenu: [[10, 20, 30], [10, 20, 30]],
        order: [[1, "desc"]],
        columns: [
            { data: 'id' },
            { data: 'strNombre' }
        ]
    });

    $('#products-table').on('click', 'tbody tr', function (e) { 

        let classList = e.currentTarget.classList;
 
        if (classList.contains('selected')) {
            classList.remove('selected');
        }
        else {
            productosTable.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
            classList.add('selected');
        }
    });

    $('#products-table').on('dblclick', 'tbody tr', function () { 
        let row = productosTable.row(this).data();
     
        showAddProductModal(row);
    });
}

function showAddProductModal(row = {}) {
    $('#productName').val((row.strNombre != undefined && row.strNombre !== "" ? row.strNombre : ""));

    $('#agregarEditarProductoBox .edit-product').hide();
    $('#agregarEditarProductoBox .add-product').show();

    if(row.id !== undefined) {
        $('#agregarEditarProductoBox .edit-product').show();
        $('#agregarEditarProductoBox .add-product').hide();
    }

    $('#agregarEditarProductoBox').modal('show');

    $('#agregarEditarProductoBox .edit-product').off('click').click(async function() {
        // validamos que esten los inputs
        if(!checkInputs("#agregarEditarProductoBox .form-control")) return;

        let formData = new FormData();
        formData.append('productName', $('#productName').val());

        const response = await fetch(base_url + "product/edit/" + row.id, {
            body: formData,
            method: "post"
        });

        let json = await response.json(); 
        console.log(json);
        if(json.success == 1) {
            Swal.fire({
                title: "",
                icon: "success",
                text: "Guardado exitoso"
            });

            $('#agregarEditarProductoBox').modal('hide');

            $('#products-table').DataTable().destroy();

            initProductsTable();
        } else {
            Swal.fire({
                title: "",
                icon: "info",
                text: json.msg
            });
        }

    });

    $('#agregarEditarProductoBox .add-product').off('click').click(async function() {
        // validamos que esten los inputs
        if(!checkInputs("#agregarEditarProductoBox .form-control")) return;

        let formData = new FormData();
        formData.append('productName', $('#productName').val());

        const response = await fetch(base_url + "product/save", {
            body: formData,
            method: "post"
        });

        let json = await response.json(); 
        console.log(json);
        if(json.success == 1) {
            Swal.fire({
                title: "",
                icon: "success",
                text: "Guardado exitoso"
            });

            $('#agregarEditarProductoBox').modal('hide');

            $('#products-table').DataTable().destroy();

            initProductsTable();
        } else {
            Swal.fire({
                title: "",
                icon: "info",
                text: json.msg
            });
        }

    });
}

async function deleteProduct() {
    
    if(!productosTable.rows('.selected').any()) {
        Swal.fire({
            title: "",
            icon: "info",
            text: "Debe seleccionar un registro"
        });

        return;
    } 

    let row = productosTable.rows('.selected').data()[0];

    if (!await confirm('Esta seguro que desea elliminar el registro?')) {
        return;
    }

    const response = await fetch(base_url + "product/delete/" + row.id, {
        method: "post"
    });

    let json = await response.json(); 
        
    if(json.success == 1) {
        Swal.fire({
            title: "",
            icon: "success",
            text: "Guardado exitoso"
        });

        $('#agregarEditarProductoBox').modal('hide');

        $('#products-table').DataTable().destroy();

        initProductsTable();
    } else {
        Swal.fire({
            title: "",
            icon: "info",
            text: json.msg
        });
    }

}