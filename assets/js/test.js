Ext.onReady(function(){
	Ext.Loader.setConfig({enabled: true});
	Ext.Loader.setPath('Ext.ux', base_url+'assets/extjs/examples/ux');
	Ext.create('Ext.Viewport', {
			layout: 'border',
			items: [{
				layout: 'border',
				border: false,
				region:'center',
				items: [{
					xtype: 'form',
					id: 'formBukuTamu',
					url: base_url+'quran/bukuTamu/insert',
					region:'north',
					title:'Isi Buku Tamu',
					frame: true,
					split:true,
					collapsible: true,
					bodyStyle:'padding:5px 5px 0',
					fieldDefaults: {
						msgTarget: 'side',
						labelWidth: 75
					},
					defaultType: 'textfield',
					defaults: {
						anchor: '100%'
					},
					buttonAlign: 'center',
					items: [{
						fieldLabel: 'Nama',
						name: 'name',
						allowBlank:false
					}, {
						fieldLabel: 'Email',
						name: 'email',
						allowBlank:false,
						vtype:'email'
					}, {
						xtype: 'htmleditor',
						fieldLabel: 'Komentar',
						id: 'komentarField',
						allowBlank:false,
						name: 'text'
					}],
					buttons: [{
						text: 'Ubah Capcha'
					},{
						text: 'Kirim'
					},{
						text: 'Reset'
					}]
				},{
					xtype: 'grid',
					id:'gridBukuTamu',
					layout: 'fit',
					region:'center',
					title: 'Data Buku Tamu',
					// store: bukuTamuStore,
					loadMask: true,
					columns:[{
						text: "No.",
						xtype: 'rownumberer',
						width: 40
					},{
						text: "Tanggal/Waktu",
						width: 120,
						dataIndex: 'date',
						renderer : Ext.util.Format.dateRenderer('d M Y H:i:s')
					},{
						text: "Nama",
						dataIndex: 'name',
						width: 120
					},{
						text: "Email",
						dataIndex: 'email',
						width: 120,
						hidden : true
					},{
						text: "Isi Komentar",
						dataIndex: 'text',
						flex: 1
					}],
					bbar: Ext.create('Ext.PagingToolbar', {
						pageSize: 10,
						// store: bukuTamuStore,
						displayInfo: true,
						afterPageText: 'dari {0}',
						beforePageText: 'Halaman',
						displayMsg: 'Data {0} - {1} dari {2}',
						plugins: Ext.create('Ext.ux.ProgressBarPager', {})
					})
				}]
			},
		]
	});
});