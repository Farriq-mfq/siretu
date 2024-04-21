import 'laravel-datatables-vite';


$(document).ready(function () {
    const form = $("#form-delete-button")
    $(document).on("click", "#delete_confirmation", function () {
        const dataUrl = $(this).data('action')
        $("#modal-delete-confirmation").modal("show")
        form.attr('action', dataUrl)
    })
    $('#modal-delete-confirmation').on('hidden.bs.modal', function (e) {
        form.removeAttr('action')
    })
})
