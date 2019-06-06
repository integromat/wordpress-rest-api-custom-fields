$ = jQuery;
$(document).ready(function () {

    $imapieTabs = $("#imapie_tabs").tabs();

    $('#imapie_tabs #submit').click(function (e) {
        $('.imapie_settings_container').addClass('wait');

        $.when(
            $.post('options.php', $('#impaie_form_post').serialize()),
            $.post('options.php', $('#impaie_form_user').serialize()),
            $.post('options.php', $('#impaie_form_comment').serialize()),
            $.post('options.php', $('#impaie_form_term').serialize())

        ).done(function(a1, a2, a3, a4) {
            $('.imapie_settings_container').removeClass('wait');
        });

        return false;
        e.preventDefault()
    })


    $('.uncheck_all').click(function (e) {
        uncheckAllStatus = $(this).attr('data-status');

        if (uncheckAllStatus == 0) {
            $(this).attr('data-status', 1);
        } else {
            $(this).attr('data-status', 0);
        }

        $(this).closest('form').find('input[type="checkbox"]').each(function () {
            if (uncheckAllStatus == 0) {
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        })
        return false;
        e.preventDefault()
    })


})

