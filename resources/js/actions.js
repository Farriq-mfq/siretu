import { route } from 'ziggy-js'

// custom actions add personil
DataTable.ext.buttons.addPersonil = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-plus"></i> ' + "Tambah personil";
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('personil-create', undefined, undefined, Ziggy))
        // window.location.href = route('personil-create', undefined, undefined, Ziggy)
    }
};
DataTable.ext.buttons.importPersonil = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-upload"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('personil-import', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};

DataTable.ext.buttons.importSiswa = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-upload"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('siswa-import', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};

DataTable.ext.buttons.addSiswa = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-plus"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('siswa-reset', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};
DataTable.ext.buttons.risetSiswa = {
    className: 'btn btn-danger',
    text: function (dt) {
        return '<i class="bi bi-screwdriver"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('siswa-reset', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};
DataTable.ext.buttons.resetPersonil = {
    className: 'btn btn-danger',
    text: function (dt) {
        return '<i class="bi bi-screwdriver"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('personil-reset', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};
DataTable.ext.buttons.resetKelas = {
    className: 'btn btn-danger',
    text: function (dt) {
        return '<i class="bi bi-screwdriver"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('kelas-reset', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};

DataTable.ext.buttons.importKelas = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-upload"></i> ';
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('kelas-import', undefined, undefined, Ziggy))
        // window.location.href = route('personil-import', undefined, undefined, Ziggy)
    }
};
DataTable.ext.buttons.addKelas = {
    className: 'btn btn-primary',
    text: function (dt) {
        return '<i class="bi bi-plus"></i> ' + "Tambah personil";
    },

    action: function (e, dt, button, config) {
        Turbolinks.visit(route('kelas-create', undefined, undefined, Ziggy))
        // window.location.href = route('personil-create', undefined, undefined, Ziggy)
    }
};
