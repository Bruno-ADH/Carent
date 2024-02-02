$(document).ready(function () {
    $('#btn-save').on('click', function () {

        $('.errorSearching').addClass('d-none');

        let formData = new FormData(document.getElementById('availabityForm'))
        let serializedData = {}

        for (let [key, value] of formData.entries()) {
            serializedData[key] = value
        }
        serializedData['_token'] = $('meta[name="csrf-token"]').attr('content')

        $.ajax({
            type: "POST",
            url: '/check-availability',
            data: serializedData,
            success: function (response) {
                $('#result').html(response);
            },
            error: function (error) {
                let obj = error.responseJSON.errors
                for (const key in obj) {
                    if (Object.hasOwnProperty.call(obj, key)) {
                        if (key === $(`input[name="${key}"]`).attr('name')) {
                            const element = obj[key].join('<br>')
                            $(`input[name="${key}"]`).parent().next().text(element).removeClass('d-none')
                        }
                    }
                }
            }
        })
    })
})
