(function($){

	"use strict";

	var pluginName = 'dsgvoConfirm',
		PluginClass;


	/* Enter PluginOptions */
	$[pluginName+'Default'] = {
		form: 'form',
		submitButtton: 'form [type="sumbit"]',
		container: 'closest:.widget',
        title: 'Kurz zum Datenschutz',
        content: 'Mit dem Absenden des Formulares stimmst Du zu, dass Deine Angaben aus dem Kontaktformular zur Beantwortung Deiner Anfrage von Sioweb erhoben und verarbeitet werden. Die Daten werden nach abgeschlossener Bearbeitung Deiner Anfrage gelöscht.',
        button_accept: 'Absenden',
        button_abort: 'Abbrechen',
        invalid: function(element,selfObj,confirmObj) {},
        open: function(element,selfObj,confirmObj) {},
        added: function(selfObj,confirmObj) {},
        accept: function(selfObj,confirmObj) {},
        abort: function(selfObj,confirmObj) {},
    };
	

	PluginClass = function() {

		var selfObj = this;
		this.item = false;
		this.initOptions = new Object($[pluginName+'Default']);
		
		this.init = function(elem) {
			selfObj = this;

			this.elem = elem;
			this.item = $(this.elem);
			this.isHTML = selfObj.elem.tagName.toLowerCase() === 'html';

			this.valid = false;

            this.loaded();
        };
        
        this.modalPosition = function(confirmObj) {
            return {
                width: confirmObj.item.width(),
                height: confirmObj.item.height(),
                bottom: ($(window).height() - (confirmObj.item.offset().top - $(window).scrollTop() + 50)),
                left: confirmObj.item.offset().left - 20
            };
        };

		this.loaded = function() {
            selfObj.submitButtton.confirm({
                container: selfObj.container,
                title: selfObj.title,
                content: selfObj.content,
                button_accept: selfObj.button_accept,
                button_abort: selfObj.button_abort,
                abort: function(confirmObj) {
                    selfObj.abort(selfObj,confirmObj);
                },
                accept: function(confirmObj) {
					var $form = confirmObj.item.closest('form');
					$form.find('[type="checkbox"][name="dsgvo"]').attr('checked', true);
                    selfObj.accept(selfObj,confirmObj);
					$form[0].submit();
				},
				added: function(confirmObj) {
                    selfObj.added(selfObj,confirmObj);
					confirmObj.modal.css(selfObj.modalPosition(confirmObj));
				},
				open: function(confirmObj) {
					var $required = confirmObj.item.closest('form').find('[required]'),
						valid = true;
					
					$required.each(function() {
						if($(this).val() === '') {
							valid = false;
                            selfObj.invalid(this,selfObj,confirmObj);
						}
					});

					if(!valid) {
						return false;
					}
                    
                    selfObj.open(this,selfObj,confirmObj);
					confirmObj.modal.css(selfObj.modalPosition(confirmObj));

					return true;
				}
            });
		};
	};

	$[pluginName] = $.fn[pluginName] = function(settings) {
		var element = typeof this === 'function'?$('html'):this,
			newData = arguments[1]||{},
			returnElement = [];
				
		returnElement[0] = element.each(function(k,i) {
			var pluginClass = $.data(this, pluginName);

			if(!settings || typeof settings === 'object' || settings === 'init') {

				if(!pluginClass) {
					if(settings === 'init') {
						settings = arguments[1] || {};
					}
					pluginClass = new PluginClass();

					var newOptions = new Object(pluginClass.initOptions);

					/* Space to reset some standart options */

					/***/
					if(settings) {
						newOptions = $.extend(true,{},newOptions,settings);
					}
					pluginClass = $.extend(newOptions,pluginClass);
					/** Initialisieren. */
					this[pluginName] = pluginClass;
					pluginClass.init(this);
					if(element.prop('tagName').toLowerCase() !== 'html') {
						$.data(this, pluginName, pluginClass);
					}
				} else {
					pluginClass.init(this,1);
					if(element.prop('tagName').toLowerCase() !== 'html') {
						$.data(this, pluginName, pluginClass);
					}
				}
			} else if(!pluginClass) {
				return;
			} else if(pluginClass[settings]) {
				var method = settings;
				returnElement[1] = pluginClass[method](newData);
			} else {
				return;
			}
		});

		if(returnElement[1] !== undefined) {
			return returnElement[1];
		}
		
		return returnElement[0];
	};
})(jQuery);