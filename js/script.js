/**
 * ownCloud - bulkupload
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Florian Kaiser <florian.kaiser@mpcdf.mpg.de>
 * @copyright Florian Kaiser 2015
 */

(function($, OC) {

    function formatBytes(bytes, decimals) {
        if (bytes == 0) return '0 Byte';
        var k = 1000;
        var dm = decimals + 1 || 3;
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        var i = Math.floor(Math.log(bytes) / Math.log(k));
        return (bytes / Math.pow(k, i)).toPrecision(dm) + ' ' + sizes[i];
    }

    var target = function(params) {
        var paramsToObject = function(params) {
            var obj = {};
            params.forEach(function(param) {
                var parts = param.split("=");
                Object.defineProperty(obj, parts[0], {
                    __proto__: null,
                    value: parts[1]
                });
            });
            return obj;
        }

        var params = paramsToObject(params);

        var base = "/remote.php/webdav/bulkupload/";
        var url = base + params["resumableFilename"] + "-chunking-" + params["resumableIdentifier"] + "-" + params["resumableTotalChunks"] + "-" + (params["resumableChunkNumber"] - 1);
        return url;
    };

    var generateUniqueIdentifier = function(file) {
        /* 
           For now, we just use a random integer as the id.
           The ownCloud client does it like this:   
           * take the current epoch and shift 8 bits up to keep the least bits.
           * than add the milliseconds, again shift by 8
           * and finally add the least 8 bit of the inode of the file.
        */
        var min = 0;
        var max = 2147483647;
        return Math.floor(Math.random() * (max - min + 1) + min);
    };

    var headers = {
        "OC-Chunked": "1",
        "Dummy": "0",
        /* add second dummy element so that JavaScript doesn't complain */
    }

    var r = new Resumable({
        target: target,
        headers: headers,
        generateUniqueIdentifier: generateUniqueIdentifier,
        method: "octet",
        chunkSize: 10 * 1024 * 1024,
        /* 10 MiB */
        testChunks: false,
        withCredentials: true,
    });





    $(document).ready(function() {

        if (!r.support) {
            $("#droptarget").text("Your browser is not supported. Bulk upload works with recent versions of Mozilla Firefox and Google Chrome.");
            return;
        }

        r.assignBrowse(document.getElementById('browseButton'));
        r.assignDrop(document.getElementById('dropTarget'));

        $("#progressbar").click(function() {
            if (r.isUploading()) {
                r.pause();
                $("#progressbar-label").text("paused");
            } else {
                r.upload();
            }
        });

        r.on('fileAdded', function(obj, event) {
            r.upload();
            var formattedSize = formatBytes(obj.size);
            var text = $("#filelist").html();
            text = text + "<br>" + obj.relativePath + " (" + formattedSize + ")";
            obj.size
            $("#filelist").html(text);
        });
        r.on('progress', function() {
            var percent = Math.floor(r.progress() * 100);
            $("#progressbar").progressbar({
                value: percent
            });
            $("#progressbar-label").text(percent + " %");
        });
        r.on('fileError', function(file, message) {
            if (r.errorCode == 507) {
                OC.dialogs.alert("Insufficient storage", "Error");
                return;
            }
            try {
                $xml = $($.parseXML(message));
                $msg = $xml.find("message").text();
            } catch (err) {
                /* cannot parse message from server, display generic error */
                $msg = "An unknown error occured.";
            }
            OC.dialogs.alert($msg, "Error");
        });

    });

})(jQuery, OC);