var UserView = function() {
  this.VM = UserViewVM;
  var newElement = $(document.createElement('p'));
  newElement.addClass('Red');
  newElement.text(this.VM.PropertyBoundToJavascript);
  $('#ModelProperties').append(newElement);
}
$(document).ready(function() {
  var userView = new UserView();
});


