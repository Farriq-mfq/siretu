import 'laravel-datatables-vite';
import nProgress from 'nprogress';
import 'nprogress/nprogress.css'
import Turbolinks from 'turbolinks';
import select2 from 'select2';
import 'select2/dist/css/select2.css';
import { menu } from './menu'
import './actions'
import './spa'
import Swal from 'sweetalert2';
// configure np progress
nProgress.configure({
    showSpinner: false,
})

if (Turbolinks.supported) {

    document.addEventListener('turbolinks:load', () => {

        // $(document).ready(function () {
        //     const form = $("#form-delete-button")
        //     $(document).on("click", "#delete_confirmation", function () {
        //         const dataUrl = $(this).data('action')
        //         $("#modal-delete-confirmation").modal("show")
        //         form.attr('action', dataUrl)
        //     })
        //     $('#modal-delete-confirmation').on('hidden.bs.modal', function (e) {
        //         form.removeAttr('action')
        //     })
        //     $(document).ajaxStart(function () {
        //         nProgress.start();
        //     });

        //     $(document).ajaxStop(function () {
        //         nProgress.done();
        //     });

        // })
        // load menu
        menu()

        select2($);

        function initSelect2() {
            $(`.select2`).select2({
                theme: 'bootstrap-5',
            });
        }

        initSelect2()

        $('.select2').change(function () {
            Livewire.dispatch('select2', { val: $(this).val() });
        })
        Livewire.on('select2-hydrate', function () {
            initSelect2()
        });
    });

    Livewire.on('to_route', url => {
        Turbolinks.visit(url, { action: 'replace' })
        // window.location.href = url
    })
    Livewire.on('reload', () => {
        $('.dataTable').DataTable().ajax.reload();
        $('.modal').modal('hide')
        $('.modal-backdrop').remove()
        Livewire.dispatch('$refresh')
    })


    Livewire.on('confirmation', (data) => {
        Swal.fire({
            title: data[0].title ?? "Konfirmasi",
            text: data[0].text ?? "Yakin ingin melakukan aksi ini ?",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary ms-1"
            },
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: data[0].confirmButtonText ?? "Yakin",
            cancelButtonText: data[0].confirmButtonText ?? "Batalkan"
        }).then((result) => {
            if (result.isConfirmed) {
                if (data[0].data) {
                    Livewire.dispatch(data[0].event, data[0].data)
                } else {
                    Livewire.dispatch(data[0].event)
                }
            }
        });
    })

}
