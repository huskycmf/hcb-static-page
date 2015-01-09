define([
    "dojo/_base/declare",
    "dojo/_base/array",
    "hc-backend/widget/ContentLocalization/widget/Form",
    "hc-backend/form/_HasPageFieldsMixin",
    "dijit/_WidgetsInTemplateMixin",
    "hc-backend/config",
    "dojo/text!./templates/Form.html",
    "dojo/i18n!../../nls/Package",
    "dijit/form/TextBox",
    "dijit/form/Textarea",
    "dojo-common/form/BusyButton",
    "dijit/form/ValidationTextBox",
    "hc-backend/Editor"
], function(declare, array, Form, _HasPageFieldsMixin, _WidgetsInTemplateMixin, config,
            template, translation) {

    return declare([ Form, _HasPageFieldsMixin, _WidgetsInTemplateMixin ], {
        //  summary:
        //      Form widget for adding page to the CMS database

        filebrowserUploadUrl: '',

        templateString: template,

        // _t: [const] Object
        //      Contains dictionary with translations
        _t: translation
    });
});
