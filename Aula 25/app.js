Ext.onReady(function(){
	
	Ext.create('Ext.Button', {
		text: 'Alerta',
		renderTo: 'btnAlert',
		handler: function(){
			Ext.MessageBox.alert('Alerta', 'Simples Alerta', function(btn){
				console.log('Apertou o botão: '+ btn);
			});
		}
	});

	Ext.create('Ext.Button', {
		text: 'Confirmação',
		renderTo: 'btnConfirm',
		handler: function(){
			Ext.MessageBox.confirm('Confirmação', 'Deseja mesmo deletar o registro?', function(btn){
				if (btn == 'yes'){

					console.log('apertou sim!');
				} else {

					console.log('apertou não!');
				} 
			});
		}
	});

	Ext.create('Ext.Button', {
		text: 'prompt',
		renderTo: 'btnPrompt',
		handler: function(){
			Ext.MessageBox.prompt('Nome', 'Digite o seu nome:', function(btn, text){
   					 if (btn == 'ok'){
        		Ext.MessageBox.alert('Alerta', 'Seja Bem-Vindo, '+ text);
    }
});
		}
	});


	Ext.create('Ext.Button', {
		text: 'Button Personalizado',
		renderTo: 'btnStyle',
		handler: function(){
			Ext.MessageBox.show({
     title:'Salvou as alterações?',
     msg: 'Você está fechando o sistema sem salvar as alterações. Deseja salvar as alterações?',
     
     icon: 'icon-bad'
});
		}
	});
			});