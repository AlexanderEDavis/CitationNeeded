(function newBib() {
    'use strict';
    var dialogButton = document.querySelector('#btnNewBib');
    var dialog = document.querySelector('#dialogNewBib');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
    dialog.querySelector('button:not([disabled])')
    .addEventListener('click', function() {
      dialog.close();
    });
  }());

(function openBib() {
'use strict';
var dialogButton = document.querySelector('#btnOpenBib');
var dialog = document.querySelector('#dialogOpenBib');
if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
dialogButton.addEventListener('click', function() {
    dialog.showModal();
});
dialog.querySelector('button:not([disabled])')
.addEventListener('click', function() {
    dialog.close();
});
}());