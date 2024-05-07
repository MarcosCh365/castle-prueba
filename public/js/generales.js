function checkInputs(formLabel = ".form-control") {

    let msg = "";
    let valid = true;

    $(formLabel).each(function() {
        let type = $(this).attr('type');

        switch(type) {
            case 'text':
                if($(this).val() === '') {
                    msg = $(this).attr('data-msg');
                    valid = false;
                    if(!$(this).hasClass('is-empty')) $(this).addClass('is-empty');
                    return valid;
                }
                break;
            default:
                break;
        }
    });

    if(msg !== "") {
        Swal.fire({
            title: "",
            icon: "info",
            text: msg
        });
    }

    return valid;

}

async function confirm(strMessage = 'Esta seguro de realizar la accion') {
    const confirm = await Swal.fire({
        text: strMessage,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'})
        .then((result) => {
            if(result.isConfirmed) return true;
            return false;
        });

    return confirm;
}