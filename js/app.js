var app = {
  init: function() {
    // on écoute le clic sur la croix
    $('#add-cross').on('click',app.showForm);

    // on définit "ailleurs"
    var notFormSelector = 'body :not(#add-block)';
    notFormSelector += ':not(#add-cross)';
    notFormSelector += ':not(#add-form)';
    // on écoute le clic ailleurs
    $(notFormSelector).on('click',app.hideForm);
  },

  showForm: function() {
    console.info('showForm');
    $('#add-block').addClass('showing');
    $('#add-cross').addClass('showing');
  },

  hideForm: function() {
    console.info('hideForm');
    console.info(this);
    if ($('#add-block.showing').length!=='') {
      $('#add-block').removeClass('showing');
      $('#add-cross').removeClass('showing');
    }
  },
};

$(app.init);
