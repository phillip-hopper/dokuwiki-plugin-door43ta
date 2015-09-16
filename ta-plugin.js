
function ta_plugin_script_loaded() {
    return true;
}

function initialize_ta_setup() {

    jQuery('#taCreateNowButton').on('click', function() {

        var div = jQuery('#ta-plugin-options-container');
        var src = jQuery('#selectTaSource').val();
        var dest = jQuery('#selectTaDestination').val();

        if (dest) {

            // find the iso code in the text
            var found = dest.match(/\([^\(\)]+\)$/);
            if (found && found.length === 1) {
                dest = found[0].replace(/\(|\)/g, '');
            }
        }

        // check data before submitting
        var msg = '';
        if (!src)
            msg += LANG.plugins['door43ta']['sourceRequired'] + '<br>\n';

        if (!dest)
            msg += LANG.plugins['door43ta']['destinationRequired'] + '<br>\n';

        if (msg) {
            div.find('#taCreateValidateMessage').html(msg).show();
            return;
        }
        else {
            div.find('#taCreateValidateMessage').html('&nbsp;').hide();
        }

        // disable the page so the user doesn't click anything while the server is processing the request
        disable_page();

        // now do it
        do_ta_create_operation(src, dest);
    });
}

/**
 *
 * @param src string
 * @param dest string
 */
function do_ta_create_operation(src, dest) {

    // ajax call to create/copy the files
    var url = DOKU_BASE + 'lib/exe/ajax.php';
    //var div = jQuery('#' + operations[0]);

    // the POST values
    var dataValues = {
        call: 'create_ta_now',
        sourceLang: src,
        destinationLang: dest
    };

    // the ajax settings
    var ajaxSettings = {
        type: 'POST',
        url: url,
        data: dataValues
    };

    // layout of object returned by the server
    //   data['result'] => 'OK' if success, anything else indicates failure
    //   data['msg']    => message to display to user
    jQuery.ajax(ajaxSettings).done(function (data) {

        var msg;
        var result = jQuery('#taCreateNowMessage');

        if (typeof data === 'string') {

            // most likely an error has occurred
            msg = data;
            result.attr('class', 'failure');
        }
        else {

            // the ajax call succeeded, display the results
            msg = data['htmlMessage'];
            if (data['result'] === 'OK')
                result.attr('class', 'success');
            else
                result.attr('class', 'failure');
        }

        result.html(msg).show();

        // re-enable the page now that we're finished
        enable_page();
    });
}
