# Bulk Upload
OwnCloud app allowing users to upload large files by transparently splitting them into small chunks. 
Built using https://github.com/23/resumable.js and ownCloud's built-in WebDAV chunking API.
Uses the HTML5 file upload API, which requires a somewhat recent browser such as Firefox 4+ and Chrome 11+.

## Parameters
Currently, the following parameters are hardcoded in the resumable.js defaults section
 * 10 MB chunk size (chunkSize)
 * up to 4 simultaneous upload streams (simultaneousUploads)
 * up to 4 retries on non-permanent server errors (maxChunkRetries)

## Disclaimer
At the moment, this is an alpha quality prototype, use at your own risk.

## Installing
Place this app in **owncloud/apps/**

