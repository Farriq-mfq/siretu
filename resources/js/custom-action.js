import { Ziggy } from './ziggy.js';
import { route } from 'ziggy-js'

// custom actions add personil
DataTable.ext.buttons.addPersonil = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-plus"></i> ' + "Tambah personil";
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('personil-create', undefined, undefined, Ziggy))
    }
};
