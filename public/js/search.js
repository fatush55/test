$(function () {
    let documents = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            wildcard: '%QUERY',
            url:  path + '/search/typeahead?query=%QUERY',
            filter: function (documents) {

                return $.map(documents,function (doc) {
                    return {
                        doc_id: doc.id,
                        doc_title: doc.title,
                    }
                })
            }
        }
    });

    documents.initialize();

    $('#typeahead').typeahead({
        highlight: true
    },{
        name: 'product',
        display: 'product_title',
        limit: 10,
        source: documents.ttAdapter(),
        templates: {
            suggestion: function (data) {
                return `
                <div>
                    <span>` + data.doc_title + `</span>
                </div>
                `
            }
        }
    });

    $('#typeahead').bind('typeahead:select', function (ev, suggestion) {
        console.log(encodeURIComponent(suggestion.title));
        window.location = path + '/search/?s=' + encodeURIComponent(suggestion.doc_title)
    });

});