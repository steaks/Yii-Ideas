var UserView = function() {
  this.VM = UserViewVM;
  
  $('#ModelProperties').append(document.createElement('p').text(this.VM.PropertyBoundToJavascript));
}
$(document).ready(function() {
  var userView = new UserView();
});


