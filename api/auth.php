<?php
/**
 * Verify the authentication state of the user. If the user is not authenticated
 * this request ends, an continue otherwise.
 * 
 */

$API_SECRET = "HiltonApiCode123"; // The internal API token

if ($_REQUEST['api_secret'] != $API_SECRET) {
    echo "Access dennied.";
    die;
}