$(()=>{

    $('body').on('click', '.doc-show', function () {
        const id = $(this).data('id');

        $.ajax({
            url:'/document/show',
            type: 'POST',
            data: {id:id},
            success: function (res) {
                show(res);
            },
            error: function (res) {
            }
        });

        function show(date) {
            $('.modal-content').html(date);
        }
    })

});