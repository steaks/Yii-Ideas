var UserView = function() {
  this.VM = UserViewVM;
  var newElement = document.createElement('p') = this.VM.PropertyBoundToJavascript;
  $('#ModelProperties').append(newElement);
}
$(document).ready(function() {
  var userView = new UserView();
});


