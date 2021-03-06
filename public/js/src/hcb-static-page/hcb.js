define([
    "dojo/_base/declare",
    'hc-backend/layout/main/content/package',
    "dojo/i18n!./nls/Package",
    'xstyle/css!./css/common.css'
], function(declare, _Package, translation) {

    return declare("StaticPagePackage", [ _Package ], {
        // summary:
        //      Clients package will provide user to manage web site clients
        title: translation['packageTitle'],
        iconClass: 'static-pageIcon'
    });
});
