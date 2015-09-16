<!--
* Name: ta_options.html
* Description: The html and javascript that implements the UI for the Options plugin.
*
* This comment block will be removed by the plugin before rendering.
*
* Author: Phil Hopper
* Date:   2015-09-08
-->
<div id="ta-plugin-options-container">
    <style>
        #ta-plugin-options-container div { margin-bottom: 6px; }
        #ta-plugin-options-container p { display: none; margin: 6px 0 18px 24px; }
        #ta-plugin-options-container label { margin-left: 6px; }
        #ta-plugin-options-container input[type=checkbox] { margin-left: 6px; }
        #ta-plugin-options-container .success { color: #050; }
        #ta-plugin-options-container .failure { color: #900; }
        }
    </style>
    <div>
        <label for="selectTaSource">@sourceLabel@</label>
        <select id="selectTaSource">
            <option value="">Select One</option>
            <option value="en">English (en)</option>
        </select>
    </div>
    <div>
        <label for="selectTaDestination">@destinationLabel@</label>
<?php
/* @var $translation helper_plugin_door43translation */
$translation = &plugin_load('helper','door43translation');
if ($translation) echo $translation->renderAutoCompleteTextBox('selectTaDestination', 'selectTaDestination', 'width: 250px;');
?>
    </div>
    <div>
        <p id="taCreateNowMessage" class="success">&nbsp;</p>
    </div>
    <div id="ta-vol1-div" data-operation="create_ta_vol1" style="padding-top: 6px;">
        <input type="checkbox" id="ta-vol1" checked="checked"><label for="ta-vol1">@checkboxVol1@</label>
        <p id="taVol1Message" class="success">&nbsp;</p>
    </div>
    <div id="ta-vol2-div" data-operation="create_ta_vol2">
        <input type="checkbox" id="ta-vol2" checked="checked"><label for="ta-vol2">@checkboxVol2@</label>
        <p id="taVol2Message" class="success">&nbsp;</p>
    </div>
    <div id="ta-workbench-div" data-operation="create_ta_workbench">
        <input type="checkbox" id="ta-workbench" checked="checked"><label for="ta-workbench">@checkboxWorkbench@</label>
        <p id="taWorkbenchMessage" class="success">&nbsp;</p>
    </div>
    <div style="padding-top: 12px;">
        <button id="taCreateNowButton">@createButtonText@</button>
        <p id="taCreateValidateMessage" class="failure">&nbsp;</p>
    </div>
    <script type="text/javascript">

        // load the ta-plugin.js script file
        if (typeof ta_plugin_script_loaded !== 'function') {
            jQuery.getScript('@DOKU_BASE@lib/plugins/door43ta/ta-plugin.js', function() { initialize_ta_setup(); });
        }
        else {
            initialize_ta_setup();
        }
    </script>
</div>
