Ext.define('CursoExtJS4.classe.Usuario', {
			nome: '',
			senha: '',
			//criando o construtor
			constructor: function(options){
				Ext.apply(this, options || {});

				console.log('construtor foi chamado!');
			}
		});

