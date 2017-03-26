var app = {
  init: function() {
    app.addIcons();

    // app.autocomplete();

    // on écoute le clic sur le plus
    $('#add-cross').on('click',app.showForm);

    // on écoute le clic ailleurs
    $(app.defineNotForm()).on('click',app.hideForm);

    // on écoute la validation du form
    $('#add-form button').on('click',app.focusModal);
    $('.confirm-form').on('submit',app.addPost);

    // on écoute le clic sur les tags
    $('#main').on('click','.tag',app.displayFromTag);

    // on écoute la saisie recherche
    $('.search-field').on('keyup',app.search);

    // on écoute le clic sur le titre
    $('#page-title').on('click',app.reset);
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

  // autocomplete: function() {
  //   $('.search-field').autocomplete({
  //     source: function(){
  //       $.ajax(search.php, {
  //         dataType : 'json',
  //         success: function(){
  //
  //         }
  //       })
  //     },
  //   });
  //   // on écoute la recherche
  //
  // },
  //
  // search: function() {
  //   var $searchField = $(this);
  //   var toSearch = {
  //     search: $searchField.val(),
  //   };
  //
  //   var xhr = $.ajax('search.php', { method: 'GET', data: toSearch });
  //
  //   xhr
  //     .done(function(data){
  //       $searchField.val(data);
  //     })
  //     .fail();
  // },

  defineNotForm: function() {
    // on définit "ailleurs"
    var notFormSelector = 'body :not(#add-block)';
    notFormSelector += ':not(#add-cross)';
    notFormSelector += ':not(#add-form)';
    notFormSelector += ':not(input)';
    notFormSelector += ':not(textarea)';
    notFormSelector += ':not(button)';
    notFormSelector += ':not(#confirm)';

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

  focusModal: function() {
    console.log('focusModal');
    $('#password').trigger('focus');
    $('#password').focus();
  },

  addPost: function(evt) {
    // blocage envoi
    evt.preventDefault();

    $('#confirm').modal('hide');

    var dataToPost = {
      title: $('#form-title').val(),
      core: $('#form-core').val(),
      tags: $('#form-tags').val(),
      link1: $('#form-link1').val(),
      link2: $('#form-link2').val(),
      link3: $('#form-link3').val(),
      password: $('#password').val(),
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
        $('.alert-info')
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

  displayFromTag: function(evt) {
    evt.preventDefault();

    $('.loading')
      .removeClass('hidden');

    var tag = { tag: $(this).text() };

    var xhr = $.ajax('tag.php', { method: 'GET', data: tag });

    xhr
      .done(function(data){
        $('#main')
          .html(data);
        app.addIcons();
      })
      .always(function(){
        $('.loading')
          .addClass('hidden');
      });
  },

  search: function(evt) {
    // console.log(evt.keyCode);
    if (app.isValid(evt.keyCode)) {
      // affichage écran de chargement
      $('.loading')
      .removeClass('hidden');

      var search = { search: $(this).val() };

      var xhr = $.ajax('search.php', { method: 'GET', data: search });

      xhr
      .done(function(data){
        $('#main')
        .html(data);
        app.addIcons();
      })
      .always(function() {
        // masquage écran de chargement
        $('.loading')
        .addClass('hidden');
      });
    }
  },

  isValid: function(keyCode) {
    if (keyCode === 13 ||
        keyCode === 16 ||
        keyCode === 17 ||
        keyCode === 18 ||
        keyCode === 19 ||
        keyCode === 20 ||
        keyCode === 27 || // echap
        keyCode === 33 ||
        keyCode === 34 ||
        keyCode === 35 ||
        keyCode === 36 ||
        keyCode === 37 ||
        keyCode === 38 ||
        keyCode === 39 ||
        keyCode === 40 ||
        keyCode === 45 ||
        keyCode === 112 ||
        keyCode === 113 ||
        keyCode === 114 ||
        keyCode === 115 ||
        keyCode === 116 ||
        keyCode === 117 ||
        keyCode === 118 ||
        keyCode === 119 ||
        keyCode === 120 ||
        keyCode === 121 ||
        keyCode === 122 ||
        keyCode === 123 ||
        keyCode === 144 ||
        keyCode === 145 ||
        keyCode === 225) {
      return false;
    }
    return true;
  },

  reset: function() {
    // affichage écran de chargement
    $('.loading')
    .removeClass('hidden');

    // vidage input recherche
    $('.search-field').val('');

    var xhr = $.ajax('search.php');
    xhr
    .done(function(data){
      $('#main')
      .html(data);
      app.addIcons();
    })
    .always(function() {
      // masquage écran de chargement
      $('.loading')
        .addClass('hidden');
    });
  },
};

$(app.init);
