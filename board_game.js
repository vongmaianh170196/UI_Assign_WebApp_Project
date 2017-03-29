/**
 * Created by nguyenlinh on 29/03/2017.
 */
$('.picked').hide();



$(document).ready(function(){

    $('.player-cards').click(function(){
        $('.picked').show();
        console.log($(this).val());
    });

});




$(".flips").click(function(){
    var href = this.href;
    $.ajax({
        url: '',
        type: 'POST',
        data: { target: href },
        success: function (success) {
            setTimeout(function (){

            }, 1000)
        }
    });
})
