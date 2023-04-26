$(document).ready(() => {
    $('.updateButton').click(function() {
        // alert($(this).val())
        var data = $(this).val().split('~')

        $('#updateId').val(data[0])
        $('#itemCategory').val(data[1])
        $('#itemName').val(data[2])
        $('#itemPrice').val(data[3])
        $('#itemNumber').val(data[4])
        $('$itemCategory').text(data[5])
    })
});


