# Bulk Upload
[OwnCloud](https://owncloud.org) app allowing users to upload large files by transparently splitting them into small chunks. 
Built using [resumable.js](https://github.com/23/resumable.js) and ownCloud's built-in WebDAV chunking API.
Uses the HTML5 file upload API, which requires a somewhat recent browser such as Firefox 4+ and Chrome 11+.

## Disclaimer
At the moment, this is an alpha quality prototype, use at your own risk.

## Parameters
Currently, the following parameters are hardcoded in the resumable.js defaults section
 * 10 MB chunk size (chunkSize)
 * up to 4 simultaneous upload streams (simultaneousUploads)
 * up to 4 retries on non-permanent server errors (maxChunkRetries)

## Installing
Place this app in **owncloud/apps/**

