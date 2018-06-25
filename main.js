$(function () {
    function am(meth) {
        var ae = $('#pta').val();
        $.post('index.php', { 'action': meth, 'value': ae }, function (data) {
            $('#pta').val(data);
        }, 'json')
    };
    $('#pen').click(function () { am('encode'); });
    $('#pde').click(function () { am('decode'); });
});