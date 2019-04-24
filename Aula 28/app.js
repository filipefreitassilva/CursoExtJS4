Ext.onReady(function(){
	//iniciando o Quicktip para o tooltip
	Ext.tip.QuickTipManager.init();

	Ext.create('Ext.Button', {
    text: 'Padrão - link',
    tooltip: 'esse botão tem um tooltip',
    href: 'https://globoesporte.globo.com',
    renderTo: 'btn1',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
    text: 'Médio',
    disabled: true,
    renderTo: 'btn2',
    scale: 'medium',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
    text: 'Grande',
    renderTo: 'btn3',
    scale: 'large',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
	iconCls: 'add',
    renderTo: 'btn4',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
	iconCls: 'add',
    renderTo: 'btn5',
    scale: 'medium',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
	iconCls: 'add',
    renderTo: 'btn6',
    scale: 'large',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
	text: 'Pequeno',
	iconCls: 'add',
	iconAlign: 'top', // colocar a posição do icone
    renderTo: 'btn7',
    menu      : [
        {text: 'Item 1'},
        {text: 'Item 2'},
        {text: 'Item 3'},
        {text: 'Item 4'}
    ],
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
	text: 'Médio',
	iconCls: 'add',
    renderTo: 'btn8',
    scale: 'medium',
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	Ext.create('Ext.Button', {
	text: 'Grande',
	iconCls: 'add',
    renderTo: 'btn9',
    scale: 'large',
    enableToggle: true,
    handler: function() {
        alert('Você clicou no botão!')
    }
	});

	// display a dropdown menu:
Ext.create('Ext.button.Split', {
    renderTo: 'btn10',
    text: 'Options',
    iconCls: 'add',
    menu: new Ext.menu.Menu({
        items: [
            // these will render as dropdown menu items when the arrow is clicked:
            {text: 'Item 1', handler: function(){ alert("Item 1 clicked"); }},
            {text: 'Item 2', handler: function(){ alert("Item 2 clicked"); }}
        ]
    })
});

Ext.create('Ext.button.Cycle', {
    showText: true,
    prependText: 'View as ',
    renderTo: 'btn11',
    menu: {
        id: 'view-type-menu',
        items: [{
            text: 'text only',
            iconCls: 'view-text',
            checked: true
        },{
            text: 'HTML',
            iconCls: 'view-html'
        }]
    },
    changeHandler: function(cycleBtn, activeItem) {
        Ext.Msg.alert('Change View', activeItem.text);
    }
});

});