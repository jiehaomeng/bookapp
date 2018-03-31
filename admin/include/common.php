<?php

foreach (Array('_GET', '_POST', '_COOKIE') as $_request) {
    foreach ($$_request as $_k => $_v) {
        ${$_k} = $_v;
    }
}