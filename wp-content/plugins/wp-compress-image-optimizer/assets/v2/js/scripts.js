jQuery(document).ready(function ($) {
    check_settings();

    var links = $('.ajax-run-critical'); //We can add data-status to links to know which ones need to be run?
    var processed_links = 0;
    var process_all = 0;

    function process_next_link(){
        links[processed_links].click();
        if (processed_links < links.length-1) {
            processed_links = processed_links + 1;
        } else {
            process_all = 0;
        }
    }

    $('.ajax-run-critical-all').on('click', function (e) {
        e.preventDefault();
        process_all = 1;
        console.log(process_all)
        process_next_link();
    });

    $('.ajax-run-critical').on('click', function (e) {
        e.preventDefault();
        var pageID = $(this).data('page-id');

        var link = this;
        var status = $('#status_'+pageID);
        var assets_count =  $('#assets_'+pageID);
        link.text = 'In Progress';
        $.post(ajaxurl, {
            action: 'wps_ic_critical_get_assets',
            pageID: pageID,
            wps_ic_nonce: wpc_ajaxVar.nonce
        }, function (response) {
            var files = JSON.parse(response.data);

            assets_count.html(files.img+' image, '+files.js+' JS and '+files.css+' CSS files found.');

            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    action: 'wps_ic_critical_run',
                    pageID: pageID,
                    wps_ic_nonce: wpc_ajaxVar.nonce
                },
                timeout: 0, //ms
                error: function (jqXHR, textStatus, errorThrown) {
                    link.text = 'Error';
                },
                success: function (jqXHR, textStatus, errorThrown) {
                    link.text = 'Done';
                    status.html('Done');
                }
            });

                if ( process_all === 1 ){
                    process_next_link();
                }
            //});

        });

        return false;
    });




    $('#optimizationLevel').on('change', function (e) {
        e.preventDefault();

        $('.action-buttons').fadeOut(500, function () {
            $('.save-button').fadeIn(500);
        });

        return false;
    });


    $('.wpc-ic-settings-v2-checkbox').on('change', function (e) {
        e.preventDefault();

        var parent = $(this).parents('.option-item');
        var beforeValue = $(this).attr('checked');
        var optionName = $(this).data('option-name');
        var newValue = 1;

        if (beforeValue == 'checked') {
            // It was already active, remove checked
            $(this).removeAttr('checked');
            $('.circle-check', parent).removeClass('active');
        } else {
            // It's not active, activate
            $(this).attr('checked', 'checked');
            $('.circle-check', parent).addClass('active');
        }

        $('.action-buttons').fadeOut(500, function () {
            $('.save-button').fadeIn(500);
        });
        check_settings();

        return false;
    });


    $('.wpc-ic-settings-v2-checkbox-ajax-save').on('change', function (e) {
        e.preventDefault();

        var parent = $(this).parents('.option-item');
        var beforeValue = $(this).attr('checked');
        var optionName = $(this).data('option-name');
        var newValue = 1;

        if (beforeValue == 'checked') {
            // It was already active, remove checked
            $(this).removeAttr('checked');
            newValue = 0;
        } else {
            // It's not active, activate
            $(this).attr('checked', 'checked');
        }

        $.post(ajaxurl, {
            action: 'wps_ic_ajax_v2_checkbox',
            optionName: optionName,
            optionValue: newValue,
            wps_ic_nonce: wpc_ajaxVar.nonce
        }, function (response) {
            if (response.data.newValue == '1') {
                $('.circle-check', parent).addClass('active');
            } else {
                $('.circle-check', parent).removeClass('active');
            }
        });

        return false;
    });

    //Setting modes change
    $('.dropdown-item').on('click', function(e){
        e.preventDefault();
        var mode = $(this).data('mode');
        var changed = false;
        var beforeValue;
        $('.dropdown-toggle > span')[0].innerText = this.innerText;

        $('.wpc-ic-settings-v2-checkbox').each(function(i, checkbox) {
            beforeValue = $(checkbox).prop('checked');
            if ($(checkbox).data(mode) == 1) {
                $(checkbox).prop("checked", true);
            } else {
                $(checkbox).prop("checked", false);
            }
            if (beforeValue != $(checkbox).prop('checked')){
                changed = true;
            }
        });

        if (changed === true){
            $('.action-buttons').fadeOut(500, function () {
                $('.save-button').fadeIn(500);
            });
        }
    });

    //goes trough all settings to see if current selection is custom/recommended/safe
    function check_settings() {
        var safe = true;
        var recommended = true;
        $('.wpc-ic-settings-v2-checkbox').each(function (i, checkbox) {
            if ($(checkbox).data('safe') != $(checkbox).prop('checked')) {
                safe = false;
            }
            if ($(checkbox).data('recommended') != $(checkbox).prop('checked')) {
                recommended = false;
            }
        });

        if ($('.dropdown-toggle > span').length) {
            if (safe) {
                $('.dropdown-toggle > span')[0].innerText = 'Safe mode';
            } else if (recommended) {
                $('.dropdown-toggle > span')[0].innerText = 'Recommended mode';
            } else {
                $('.dropdown-toggle > span')[0].innerText = 'Custom mode';
            }
        }
    }


});