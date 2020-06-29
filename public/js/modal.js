
$(document).ready(function() {
 
    $("#openModal").click(function() {
      $('#formModal').modal('show');
      console.log('ok');
    });
 
    $("#closeModal").click(function(e) {
        e.preventDefault();
      $('#formModal').modal('hide');
        console.log('non');
    });
});