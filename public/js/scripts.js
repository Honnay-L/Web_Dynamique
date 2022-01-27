$(document).ready(() => {
    $('a.js-like').click(e => {
        e.preventDefault();
        $.get(e.currentTarget.href, res => {
            $(e.currentTarget).find('span').text(res.likes);
                var i = $(e.currentTarget).find('i.bi-hand-thumbs-up-fill');
                var i2 = $(e.currentTarget).find('i.bi-hand-thumbs-up');
            if(i){
                i.addClass('bi-hand-thumbs-up');
                i.removeClass('bi-hand-thumbs-up-fill');
            }
            if(i2){
                i2.removeClass('bi-hand-thumbs-up');
                i2.addClass('bi-hand-thumbs-up-fill');
            }

            }
        )
    })
});