$(function () {
  // Disparition de la sidebar lorsque la taille de l'écran est <992px
  var taille = window.innerWidth;
  var sidebar = $("#sidebar");
  if (taille <= 992) {
    sidebar.hide();
  };
  // Listener sur l'event resize
  $(window).resize(function () {
    var new_taille = window.innerWidth;
    if (new_taille <= 992) {
      sidebar.hide();
    } else {
      sidebar.show();
    }
  });

  // Lorsque l'on passe la souris sur un dropdown l'event click est déclenché en même temps
  $('.dropright').hover(function(){
    $('.dropdown-toggle', this).trigger('click');
  });

});
