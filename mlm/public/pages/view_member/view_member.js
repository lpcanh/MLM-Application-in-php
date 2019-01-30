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
            text: {
                name: 'testing root'
            },
            image: "/public/hiten/img/malory.png",
            children: [
                {
                    text: {
                        name: 'testing 1'
                    },
                    image: "/public/hiten/img/lana.png",
                    collapsed: true,
                    children: [
                        {
                            text: {
                                name: 'testing 2'
                            },
                            image: "/public/hiten/img/figgs.png"
                        }
                    ]
                },
                {
                    text: {
                        name: 'testing 3'
                    },
                    image: "/public/hiten/img/sterling.png",
                    childrenDropLevel: 1,
                    children: [
                        {
                            text: {
                                name: 'testing 4'
                            },
                            image: "/public/hiten/img/woodhouse.png"
                        }
                    ]
                },
                {
                    pseudo: true,
                    children: [
                        {
                            text: {
                                name: 'testing 5'
                            },
                            image: "/public/hiten/img/cheryl.png"
                        },
                        {
                            text: {
                                name: 'testing 6'
                            },
                            image: "/public/hiten/img/pam.png"
                        }
                    ]
                }
            ]
        }
    };
    $(function () {
        $('#tree-switch').bootstrapToggle({
            on: 'Binary',
            off: 'Geneology'
        }).change(function() {
            var type = ($(this).prop('checked')) ? 'binary' : 'geneology';
            buildTree(MemberID, type);
        });

        console.log('Page loaded! with MemberId: ' + MemberID);
        buildTree(MemberID, 'binary');
    });

    function buildTree(id, type){
        var binary = ($(this).prop('checked')) ? 'binary' : 'geneology';
        $.get('/v3/member-net-sale-tree-json?id=' + id + '&type=' + type).then(function(resp){
            console.log(resp);
            chart_config.nodeStructure = resp;
            var tree = new Treant(chart_config);
        });
    }
})(window);