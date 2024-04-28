import 'laravel-datatables-vite';
import nProgress from 'nprogress';
import 'nprogress/nprogress.css'
import Turbolinks from 'turbolinks';
import select2 from 'select2';
import 'select2/dist/css/select2.css';
import { menu } from './menu'
import './custom-action'
// start turbolinks SPA
Turbolinks.start()
// configure np progress
nProgress.configure({
    showSpinner: false,
})

if (Turbolinks.supported) {

    document.addEventListener('turbolinks:load', () => {

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

        })
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

    document.addEventListener('turbolinks:visit', () => {
        $('.dataTables_wrapper').children().remove()
        $('.dataTables_wrapper').html(`<div class="spinner-border text-primary" role="status">
       <span class="visually-hidden">Loading...</span>
     </div>`)
    })

    Livewire.on('to_route', url => {
        Turbolinks.visit(url, { action: 'replace' })
    })
    Livewire.on('reload', () => {
        $('.dataTable').DataTable().ajax.reload();
        $('.modal').modal('hide')
        $('.modal-backdrop').remove()
    })

}


