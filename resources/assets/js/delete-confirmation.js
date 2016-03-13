$('#delete-confirmation').on('show.bs.modal', function (event) {
    button = $(event.relatedTarget)
    $(this).find('form').attr('action', delete_url + button.data('id'))
})