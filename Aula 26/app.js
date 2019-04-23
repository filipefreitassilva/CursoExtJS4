Ext.onReady(function(){
	Ext.create('Ext.panel.Panel', {
		bodyPadding: 5,
		title: 'Autenticação',
		width: 300,
		heigth: 400,
		items: [{
        xtype: 'textfield',
        fieldLabel: 'Usuário'
    }, {
        xtype: 'textfield',
        fieldLabel: 'Senha',
        inputType: 'password'
    }],
    fbar: [
	  { xtype: 'button', text: 'Entrar', 
	  handler: function(){
			Ext.MessageBox.show({
     title:'Aviso!',
     msg: 'Sistema fora do ar!',
     
     icon: Ext.Msg.WARNING
});
		}},

	  { xtype: 'button', text: 'Ajuda' , 
	  handler: function(){
			Ext.MessageBox.show({
     title:'Aviso!',
     msg: 'Entre em contato com o suporte!',
     
     icon: Ext.Msg.QUESTION
});
		}} 
	],
		renderTo: 'panel'
	});

	
});