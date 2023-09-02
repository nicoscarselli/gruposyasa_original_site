$(function() {
    $('#news-form').validate({
        rules: {
            title: 'required',
            date: 'required',
            file: {
                extension: 'pdf'
            },
            image: {
                extension: 'jpg|png|jpeg|gif|bmp'
            }
        }
    });
});