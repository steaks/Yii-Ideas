var UserView = function() {
  this.VM = UserViewVM;
  var newElement = document.createElement('p');
  $('#ModelProperties').append(newElement);
}
$(document).ready(function() {
  var userView = new UserView();
});


