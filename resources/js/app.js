import 'laravel-datatables-vite';
import nProgress from 'nprogress';
import 'nprogress/nprogress.css'
// import select2 from 'select2'
nProgress.configure({
    showSpinner: false,
})

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
    $(document).ajaxStart(function () {
        nProgress.start();
    });

    $(document).ajaxStop(function () {
        nProgress.done();
    });

    // window.select2 = select2
    // const select2comp = $(document).find("#select2")
    // $("#select2").select2()

})



document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.sent', (message, component) => {
        nProgress.start();
    })

    Livewire.hook('message.processed', (message, component) => {
        nProgress.done();
    })
});
