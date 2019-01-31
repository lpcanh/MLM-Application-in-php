(function (w) {
    var chart_config = {
        chart: {
            container: "#tree-member-view",

            animateOnInit: true,

            node: {
                collapsable: true
            },
            animation: {
                nodeAnimation: "easeOutBounce",
                nodeSpeed: 700,
                connectorsAnimation: "bounce",
                connectorsSpeed: 700
            }
        },
        nodeStructure: {
        }
    };
    var binaryTreeEls;
    var tableTreeEls;
    $(function () {
        binaryTreeEls = $('#tree-member-view');
        tableTreeEls = $("#treegrid");
        $('#tree-switch').bootstrapToggle({
            on: 'Binary',
            off: 'Geneology'
        }).change(function() {
            //var type = ($(this).prop('checked')) ? 'binary' : 'geneology';
            //buildTree(MemberID, type);
            if($(this).prop('checked')){
                tableTreeEls.addClass('hide');
                binaryTreeEls.removeClass('hide');
            } else {
                tableTreeEls.removeClass('hide');
                binaryTreeEls.addClass('hide');
            }
        });

        console.log('Page loaded! with MemberId: ' + MemberID);
        buildTree(MemberID, 'binary');

        $("#treegrid").fancytree({
            extensions: ["table"],
            checkbox: false,
            table: {
                indentation: 20,      // indent 20px per node level
                nodeColumnIdx: 0,     // render the node title into the 2nd column
                checkboxColumnIdx: 0  // render the checkboxes into the 1st column
            },
            icon: function(event, data) {
                return 'fa fa-user-o yellow';
                // Exit without returning a value: continue with default processing.
            },
            clickFolderMode: 3,
            source: {
                url: BaseUrl + '/v3/member-net-sale-treetable-json?id=' + MemberID
            },
            lazyLoad: function(event, data) {
                data.result = {url: "ajax-sub2.json"}
            },
            renderColumns: function(event, data) {
                var node = data.node,
                    nodeData = node.data,
                    $tdList = $(node.tr).find(">td");
                // (index #0 is rendered by fancytree by adding the checkbox)
                /*var nameColumn = $('<span><i class="fa fa-user-o" aria-hidden="true"></i>' + nodeData.text.name + '</span>');
                nameColumn.on('click', function(){

                });
                $tdList.eq(0).empty().append(nameColumn);*/
                $tdList.eq(1).text('OK');
                $tdList.eq(2).text('A.B.C.D (sample)');
                $tdList.eq(3).text('Level (sample)');
                $tdList.eq(4).text('A (sample)');
                // Rendered by row template:
//        $tdList.eq(4).html("<input type='checkbox' name='like' value='" + node.key + "'>");
            },
            click: function(event, data){
                // A node was activated: display its title:
                var node = data.node;
                console.log(node);
                //node.setExpanded(true);
            },
        });
        /* Handle custom checkbox clicks */
        $("#treegrid").on("click", "input[name=like]", function(e){
            var node = $.ui.fancytree.getNode(e),
                $input = $(e.target);

            e.stopPropagation();  // prevent fancytree activate for this row
            console.log(node);
        });
    });

    function buildTree(id, type){
        var binary = ($(this).prop('checked')) ? 'binary' : 'geneology';
        $.get(BaseUrl + '/v3/member-net-sale-tree-json?id=' + id + '&type=' + type).then(function(resp){
            console.log(resp);
            chart_config.nodeStructure = resp;
            var tree = new Treant(chart_config);
        });
    }


})(window);