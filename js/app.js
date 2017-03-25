var app = {
  init: function() {
    app.addIcons();

    // on écoute le clic sur la croix
    $('#add-cross').on('click',app.showForm);

    // on écoute le clic ailleurs
    $(app.defineNotForm()).on('click',app.hideForm);

    // on écoute la validation du form
    $('#add-form').on('submit',app.addPost);

  },

  addIcons: function() {
    // on récupère les liens externes (et ajoute un espace à la fin)
    var $extLinks = $('.post-ext-links a').append(' ');
    // on leur ajoute une icone
    $('<span>')
    .addClass('glyphicon glyphicon-share-alt')
    .attr('aria-hidden','true')
    .appendTo($extLinks);
  },

  defineNotForm: function() {
    // on définit "ailleurs"
    var notFormSelector = 'body :not(#add-block)';
    notFormSelector += ':not(#add-cross)';
    notFormSelector += ':not(#add-form)';
    notFormSelector += ':not(input)';
    notFormSelector += ':not(textarea)';
    notFormSelector += ':not(button)';
    notFormSelector += ':not(.captcha)';

    return notFormSelector;
  },

  showForm: function() {
    $('#add-block').addClass('showing');
    $('#add-cross').addClass('showing');
  },

  hideForm: function() {
    // console.info(this);
    if ($('#add-block.showing').length!=='') {
      $('#add-block').removeClass('showing');
      $('#add-cross').removeClass('showing');
    }
  },

  addPost: function(evt) {
    // blocage envoi
    evt.preventDefault();

    var dataToPost = {
      title: $('#form-title').val(),
      core: $('#form-core').val(),
      tags: $('#form-tags').val(),
      link1: $('#form-link1').val(),
      link2: $('#form-link2').val(),
      link3: $('#form-link3').val(),
    };
    var xhr = $.ajax('add.php', { method: 'POST', data: dataToPost });

    xhr
      .fail(function(obj) {
        $('.alert-danger')
          .html(obj.responseText)
          .removeClass('hidden')
          .hide()
          .fadeIn()
          .delay(2000)
          .fadeOut();
      })
      .done(function(data) {
        $('.alert-success')
          .text(data + ' Entrée bien  ajoutée')
          .removeClass('hidden')
          .hide()
          .fadeIn()
          .delay(2000)
          .fadeOut();
        $('#add-form input').val('');
        $('#add-form textarea').val('');
        $('#page-title').trigger('click');
      });
  },
};

$(app.init);
