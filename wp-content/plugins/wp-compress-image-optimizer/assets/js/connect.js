jQuery(document).ready(function ($) {


    function showProApiKey() {
        $('.wpc-pro-version-btn').on('click', function (e) {
            e.preventDefault();
            $('.wps-ic-selection-form').fadeOut(function () {
                $('.wps-ic-pro-form-field').show();
            });
            return false;
        });
    }


    function popupModes(data) {
        WPCSwal.fire({
            title: '',
            position: 'center',
            html: jQuery('#select-mode').html(),
            width: 1050,
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: true,
            customClass: {
                container: 'no-padding-popup-bottom-bg switch-legacy-popup',
            },
            onOpen: function () {
                var modes_popup = $('.swal2-container .ajax-settings-popup');

                if (data.liveMode == '1') {
                    $('.wpc-popup-options', modes_popup).show();
                    $('.wpc-popup-options .form-check-input', modes_popup).attr('checked', 'checked');
                }

                selectModesTrigger(data);
                hookCheckbox();
                saveMode(modes_popup);
            },
            onClose: function () {
                //openConfigurePopup(popup_modal);
            }
        });
    }

    function saveMode(modes_popup) {
        var save = $('.cdn-popup-save-btn', modes_popup);
        var loading = $('.cdn-popup-loading', modes_popup);
        var content = $('.cdn-popup-content', modes_popup);
        var nonce = $('input[name="wpc_save_mode_nonce"]', modes_popup).val();

        $(save).on('click', function (e) {
            e.preventDefault();
            $(content).hide();
            $(loading).show();

            var selected_mode = $('div.wpc-active', modes_popup).data('mode');
            var cdn = $('.form-check-input', modes_popup).prop('checked');

            $.post(wpc_ajaxVar.ajaxurl, {
                action: 'wps_ic_save_mode', mode: selected_mode, cdn: cdn, nonce: nonce, activation: true
            }, function (response) {
                if (response.success) {
                    window.location.reload();
                } else {
                    //error?
                }
            });

            return false;
        });
    }


    /**
     * Single Checkbox
     */
    function hookCheckbox() {
        $('label', '.swal2-content').on('click', function () {
            var parent = $(this).parent();
            var checkbox = $('input[type="checkbox"]', parent);
            $(checkbox).prop('checked', !$(checkbox).prop('checked'));
        });

        $('input[type="checkbox"]', '.swal2-content').on('change', function () {
            var checkbox = $(this);
            var beforeValue = $(checkbox).attr('checked');

            if (beforeValue == 'checked') {
                // It was already active, remove checked
                $(this).removeAttr('checked').prop('checked', false);
                $(parent).removeClass('active');
            } else {
                // It's not active, activate
                $(this).attr('checked', 'checked').prop('checked', true);
                $(parent).addClass('active');
            }
        });
    }


    function selectModesTrigger() {
        $('.wpc-popup-column', '.swal2-container').on('click', function (e) {
            e.preventDefault();

            var parent = $('.wpc-popup-columns', '.swal2-container');
            var selectBar = $('.wpc-select-bar .wpc-select-bar-inner', '.swal2-container');
            var selectBarValue = $(this).data('slider-bar');
            var modeSelect = $(this).data('mode');

            $(selectBar).removeClass('wpc-select-bar-width-1 wpc-select-bar-width-2 wpc-select-bar-width-3');
            $(selectBar).addClass('wpc-select-bar-width-' + selectBarValue);

            $('.wpc-popup-column', parent).removeClass('wpc-active');
            $(this).addClass('wpc-active');

            var checked = $('.form-check-input', '.wpc-popup-option-checkbox').is(':checked');

            if (modeSelect == 'safe') {
                // Safe mode - turn off CDN
                $('.form-check-input', '.wpc-popup-option-checkbox').removeAttr('checked').prop('checked', false);
            } else {
                if (!checked) {
                    $('.form-check-input', '.wpc-popup-option-checkbox').attr('checked', 'checked').prop('checked', true);
                }
            }

            return false;
        });
    }


    function liteConnectPopup() {
        WPCSwal.fire({
            title: '',
            showClass: {
                popup: 'in'
            },
            html: jQuery('.wps-ic-lite-connect-form').html(),
            width: 900,
            position: 'center',
            customClass: {
                container: 'in',
                popup: 'wps-ic-lite-connect-popup'
            },
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,
            onOpen: function () {

                showProApiKey();

                $('.wps-ic-connect-retry').on('click', function (e) {
                    e.preventDefault();
                    liteConnectPopup();
                    return false;
                });

                var swal_container = $('.swal2-container');
                var form = $('#wps-ic-connect-form', swal_container);
                var submitBtn = $('.wps-ic-submit-btn', swal_container);

                $('.wps-ic-lite-input-container', swal_container).on('click', function () {
                    $('.wps-ic-lite-input-container', swal_container).removeClass('wpc-error');
                });


                var form_container = $('.wps-lite-form-container', swal_container);
                var success_message = $('.wps-ic-success-message-container', swal_container);
                var error_message_container = $('.wps-ic-error-message-container', swal_container);
                var error_message_text = $('.wps-ic-invalid-apikey', swal_container);
                var unableToCommunicate = $('.wps-ic-unable-to-communicate', swal_container);
                var already_connected = $('.wps-ic-site-already-connected', swal_container);
                var success_message_text = $('.wps-ic-success-message-container-text', swal_container);
                var success_message_choice_text = $('.wps-ic-success-message-choice-container-text', swal_container);
                var success_message_buttons = $('.wps-ic-success-message-choice-container-text a', swal_container);
                var finishing = $('.wps-ic-finishing-container', swal_container);
                var loader = $('.wps-ic-loading-container', swal_container);
                var loaderLite = $('.wpc-loading-lite', swal_container);
                var tests = $('.wps-ic-tests-container', swal_container);
                var init = $('.wps-ic-init-container', swal_container);
                var left = $('.wps-lite-connect-left', swal_container);


                $('.wps-use-lite').on('click', function (e) {
                    e.preventDefault();

                    var nonce = $('input[name="nonce"]', swal_container).val();
                    var apikey = $('input[name="apikey"]', form_container).val();


                    $(init, swal_container).hide();
                    $(form_container).hide();
                    $(loader).hide();
                    $(loaderLite).show();


                    $.post(ajaxurl, {
                        action: 'wps_lite_connect',
                        nonce: nonce,
                        timeout: 20000
                    }, function (response) {
                        if (response.success) {
                            // Connect
                            $('.wps-ic-connect-inner').addClass('padded');
                            WPCSwal.close();
                            window.location.reload();
                        } else {
                            if (response.data.msg == 'api-issue') {
                                $(loaderLite).hide();
                                $(unableToCommunicate).show();
                            }
                        }
                    });

                    return false;
                });


                $('#wps-ic-connect-form', swal_container).on('submit', function (e) {

                    var nonce = $('input[name="nonce"]', swal_container).val();
                    var apikey = $('input[name="apikey"]', form_container).val();

                    if (apikey == '' || typeof apikey == "undefined") {
                        $('.wps-ic-lite-input-container', swal_container).addClass('wpc-error');
                        //$('.wps-ic-lite-input-field-error', swal_container).show();
                        return false;
                    }

                    $(already_connected).hide();
                    $(error_message_text).hide();
                    $(success_message_text).hide();
                    $(error_message_container).hide();
                    $(init, swal_container).hide();
                    $(form_container).hide();
                    $(loader).show();
                    $(left).show();
                    $(loaderLite).hide();
                    $(tests).hide();

                    $.post(ajaxurl, {
                        action: 'wps_ic_live_connect',
                        apikey: apikey,
                        nonce: nonce,
                        timeout: 60000
                    }, function (response) {
                        if (response.success) {
                            // Connect
                            $('.wps-ic-connect-inner').addClass('padded');
                            WPCSwal.close();

                            window.location.reload();
                        } else {

                            if (response.data.msg == 'site-already-connected') {
                                $(already_connected).show();
                                $(error_message_container).show();
                                $(error_message_text).hide();
                                $(success_message_choice_text).hide();
                                $(success_message_text).hide();
                                $(success_message).hide();
                                $(loader).hide();
                                $(tests).hide();
                            } else if (response.data.msg == 'api-issue') {
                                $(left).hide();
                                $(loader).hide();
                                $(loaderLite).hide();
                                $(unableToCommunicate).show();
                            } else {
                                $(error_message_text).show();
                                $(error_message_container).show();
                                $(success_message_text).hide();
                                $(success_message_choice_text).hide();
                                $(success_message).hide();
                                $(loader).hide();
                                $(tests).hide();
                            }

                            // $('.wps-ic-connect-retry', swal_container).bind('click');

                        }
                    });

                    return false;
                });

            }
        });
    }


    liteConnectPopup();

    $('.wpc-add-access-key-btn,.wpc-add-access-key-btn-pro').on('click', function (e) {
        e.preventDefault();
        liteConnectPopup();
        return false;
    });


});