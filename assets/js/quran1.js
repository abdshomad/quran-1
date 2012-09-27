Ext.onReady(function(){
	Ext.tip.QuickTipManager.init();
    //loading message-----------------------
    var loadingMask = Ext.get('loading-mask');
    var loading = Ext.get('loading');
    //  Hide loading message
    loading.fadeOut({
        duration: 0.2, 
        remove: true
    });
    //  Hide loading mask
    loadingMask.setOpacity(0.9);
    loadingMask.shift({
        xy: loading.getXY(),
        width: loading.getWidth(),
        height: loading.getHeight(),
        remove: true,
        duration: 1,
        opacity: 0.1,
        easing: 'bounceOut'
    });
    //end loading message-----------------------
    var layoutExamples = [];
    Ext.Object.each(getAllLayouts(), function(name, example){
        layoutExamples.push(example);
    });

    var contentPanel = {
        id: 'content-panel',
        region: 'center',
        layout: 'card',
        margins: '2 5 5 0',
        activeItem: 0,
        border: false,
        items: layoutExamples
    };
	
    var menuStore = Ext.create('Ext.data.TreeStore', {
		root: {
			expanded: true,
			text: "Menu",
			children: [
				{ text: "Menu Utama", expanded: true, children: [
						{ text: "Al-Qur'an Digital", leaf: true ,id:'start'},
						{ text: "Tentang (*)", leaf: true ,id:'tentang'}
					]
				},
				{ text: "Menu Lainnya", children: [
						{ text: "Buku Tamu", leaf: true ,id:'bukutamu'},
						{ text: "Download", leaf: true ,id:'download'},
						//{ text: "API", leaf: true ,id:'api'},
						{ text: "Referensi", leaf: true ,id:'reff'},
						// { text: "Artikel Islami <sup>(*baru*)</sup>", leaf: true ,id:'artikel'}
						{ text: "Al-Qur'an Berdasarkan Topik <sup>(*beta testing*)</sup>", leaf: true ,id:'topik'}
					]
				},
				{ text: "Statistik", children: [
						{ text: "Pengunjung", leaf: true ,id:'pengunjung'}
					]
				},
				{ text: "Hosting Gratis", leaf: true ,id:'hosting'}
			]
		}
    });

    var treePanel = Ext.create('Ext.tree.Panel', {
        id: 'tree-panel',
        region:'center',
        split: true,
        border: false,
        minSize: 150,
        rootVisible: false,
        autoScroll: true,
        store: menuStore
    });
	
    var detailsPanel = {
        id: 'details-panel',
        title: 'Facebook Page',
        region: 'south',
        // frame: true,
		height: 300,
        border: false,
        autoScroll: true,
        margins: '0 0 0 0',
        html: '<center><a href="https://www.facebook.com/pages/Al-Quran-Digital-Indonesian-Translation/138205322915167" target="_TOP" title="Al-Qur&#039;an Digital Indonesian Translation"><img src="https://badge.facebook.com/badge/138205322915167.1837.672375535.png" style="border: 0px;" /></a><br/><a href="http://www.facebook.com/business/dashboard/" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" title="Make your own badge!">Promote Your Page Too</a></center>',
        bbar: Ext.create('Ext.ux.StatusBar', {
            
            items: [clock]
        }),
        listeners: {
            render: {
                fn: function(){
                    Ext.fly(clock.getEl().parent()).addCls('x-status-text-panel').createChild({
                        cls:'spacer'
                    });
                    Ext.TaskManager.start({
                        run: function(){
                            Ext.fly(clock.getEl()).update(Ext.Date.format(new Date(), 'H:i:s'));
                        },
                        interval: 1000
                    });
                },
                delay: 100
            }
        }
    };

    treePanel.getSelectionModel().on('select', function(selModel, record) {
        if (record.get('leaf')) {
            Ext.getCmp('content-panel').layout.setActiveItem(record.getId() + '-panel');
        }
    });
    Ext.create('Ext.container.Viewport', {
        layout: 'border',
        items: [
		{
            xtype: 'box',
            region:'north',
			border: false,
			height: 48,
			contentEl: 'north-div'
        },{
            layout: 'border',
            title: 'Menu',
            id: 'layout-browser',
            region:'west',
            split:true,
            collapsible: true,
            margins: '2 0 5 5',
            width: 220,
            minSize: 100,
            maxSize: 500,
            items: [treePanel, detailsPanel]
        },
        contentPanel,
        {
			region: 'south',
			collapsible: true,
			split: true,
			height: 50,
			minHeight: 30,
			id: 'kataMutiaraText',
			title: 'Kata Mutiara',
			//contentEl: 'south-div'
			// items: [
				// new Ext.create('Ext.ux.SimpleIFrame', {
					// border: false,
					// src: base_url+'quran/gads',
				// })
			// ],
			listeners: {
				render: {
					fn: function(){
						Ext.TaskManager.start({
							run: function(){
								dynamicPanel = new Ext.Component({
									loader: {
										url: base_url+'quran/getRandomKataMutiara',
										renderer: 'html',
										loadMask: true,
										autoLoad: true,
										scripts: true
									}
								});
								Ext.getCmp('kataMutiaraText').removeAll();
								Ext.getCmp('kataMutiaraText').add(dynamicPanel);
							},
							interval: 60000
						});
					},
					delay: 100
				}
			}
        }
        ],
        renderTo: Ext.getBody()
    });
    randomAyat();
	Ext.create('Ext.tip.ToolTip', {
		target: 'cocokanCheck',
		anchor: 'top',
		anchorOffset: 110,
		autoHide : false,
		closable : true,
		html: 'Check pilihan ini jika pencarian ingin disesuaikan dengan seluruh kata pada kolom pencarian'
	});
});