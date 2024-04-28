const Ziggy = {"url":"http:\/\/127.0.0.1:8000","port":null,"defaults":{},"routes":{"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"],"parameters":["key","tags"]},"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"livewire.update":{"uri":"livewire\/update","methods":["POST"]},"livewire.upload-file":{"uri":"livewire\/upload-file","methods":["POST"]},"livewire.preview-file":{"uri":"livewire\/preview-file\/{filename}","methods":["GET","HEAD"],"parameters":["filename"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"dashboard":{"uri":"\/","methods":["GET","HEAD"]},"presensi":{"uri":"presensi\/{show?}\/{personil?}","methods":["GET","HEAD"],"parameters":["show","personil"]},"ijin-guru":{"uri":"ijin\/guru","methods":["GET","HEAD"]},"jurnal":{"uri":"jurnal","methods":["GET","HEAD"]},"personil":{"uri":"personil","methods":["GET","HEAD"]},"personil-create":{"uri":"personil\/create","methods":["GET","HEAD"]},"personil-import":{"uri":"personil\/import","methods":["GET","HEAD"]},"wifi":{"uri":"wifi","methods":["GET","HEAD"]},"kelompok":{"uri":"kelompok","methods":["GET","HEAD"]},"about":{"uri":"about","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["DELETE"]},"login":{"uri":"login","methods":["GET","HEAD"]},"login.action":{"uri":"login","methods":["POST"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
