var app = {
  init: function() {
    // on écoute le clic sur la croix
    $('#add-cross').on('click',app.showForm);

    // on définit "ailleurs"
    var notFormSelector = 'body :not(#add-block)';
    notFormSelector += ':not(#add-cross)';
    notFormSelector += ':not(#add-form)';
    notFormSelector += ':not(input)';
    notFormSelector += ':not(textarea)';
    notFormSelector += ':not(button)';
    notFormSelector += ':not(.captcha)';
    // on écoute le clic ailleurs
    $(notFormSelector).on('click',app.hideForm);

    // on récupère les liens externes (et ajoute un espace à la fin)
    var $extLinks = $('.post-ext-links a').append(' ');
    // on leur ajoute une icone
    $('<span>')
      .addClass('glyphicon glyphicon-share-alt')
      .attr('aria-hidden','true')
      .appendTo($extLinks);
  },

  showForm: function() {
    console.info('showForm');
    $('#add-block').addClass('showing');
    $('#add-cross').addClass('showing');
  },

  hideForm: function() {
    console.info('hideForm');
    // console.info(this);
    if ($('#add-block.showing').length!=='') {
      $('#add-block').removeClass('showing');
      $('#add-cross').removeClass('showing');
    }
  },
};

$(app.init);
