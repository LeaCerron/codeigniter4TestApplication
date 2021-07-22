$('#roll').on('click', function() {
    let max = 0;
    $('#dice').html('');
    for (let i = 0; i < parseInt($('#amount').val()); i++) {
        num = Math.floor(Math.random() * $('#max').val()) + parseInt($('#min').val())
        $('#dice').append('<span class="badge bg-secondary m-1">' + num + '</span>')
        max += num
    }
    $('#result').html(max);
})