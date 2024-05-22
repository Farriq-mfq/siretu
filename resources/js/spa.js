
import Turbolinks from 'turbolinks';
// start turbolinks SPA

Turbolinks.SnapshotRenderer.prototype.assignNewBody = function () {
    var newBody = this.newBody;
    $('.layout-container').children().remove()
    window.scrollTo(0, 0);
    $(".layout-container ").html(newBody.querySelector('.layout-container'))
};

Turbolinks.start()
