
import Turbolinks from 'turbolinks';
// start turbolinks SPA

Turbolinks.SnapshotRenderer.prototype.assignNewBody = function () {
    var newBody = this.newBody;
    $('.layout-container').children().remove()
    $(".layout-container ").html(newBody.querySelector('.layout-container'))
};



Turbolinks.start()
