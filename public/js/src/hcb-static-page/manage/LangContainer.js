define([
    "dojo/_base/declare",
    "hc-backend/widget/ContentLocalization/Container",
    "hc-backend/widget/ContentLocalization/LangContainer",
    "./widget/Form",
    "hcb-static-page/store/StaticPageStore"
], function(declare, Container, LangContainer, Form, StaticPageStore) {

    return declare([LangContainer], {
        formWidget: Form,
        store: StaticPageStore
    });
});
