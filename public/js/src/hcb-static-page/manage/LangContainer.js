define([
    "../../../../../../../../public/vendor/dojo/_base/declare",
    "dojo/_base/lang",
    "dojo/_base/array",
    "./service/Saver",
    "hcb-blog/store/Posts",
    "hc-backend/layout/main/content/_LangContainerMixin"
], function(declare, lang, array, SaverService, PostsStore, _LangContainerMixin) {

    return declare([ _LangContainerMixin ], {

        tabWidget: null,
        saveService: null,

        postCreate: function () {
            try {
                this.saveService = new SaverService({polyglotCollectionStore: PostsStore});
                this.saveService.on('created', lang.hitch(this, 'onEntryRefreshed'));
                this.saveService.on('updated', lang.hitch(this, 'onEntryRefreshed'));

                this.own(this.saveService);
                this.inherited(arguments);
            } catch (e) {
                console.error(this.declaredClass, arguments, e);
                throw e;
            }
        },

        getChildForLang: function (langIdentifier, langTitle) {
            try {
                return new this.tabWidget({title: langTitle || langIdentifier,
                                           lang: langIdentifier,
                                           saveService: this.saveService,
                                           router: this.router});
            } catch (e) {
                console.error(this.declaredClass, arguments, e);
                throw e;
            }
        }
    });
});
