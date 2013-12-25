var Editor = (function () {

    function Editor(element, options) {
        this.options = {
            editorClass: 'editable',
            editableElement: 'div'
        };

        this.element = element;
        this.options = $.extend(this.options, options);
        this.editor = null;
        this.form = null;
        this.hiddenInput = null;

        this.initialise();

        if (this.options.placeholder) {
            this.setPlaceholder(this.options.placeholder);
        }
    };

    Editor.prototype.initialise = function() {
        this.editor = document.createElement(this.options.editableElement);
        this.editor = $(this.editor);

        this.editor.attr('contenteditable', 'true');
        this.editor.addClass(this.options.editorClass);

        this.element.replaceWith(this.editor);

        this.editor.focus();

        this.form = this.editor.closest('form');
        this.hiddenInput = $('<input>').attr({
            type: 'hidden',
            name: this.options.inputName,
            value: this.getValue()
        });

        this.hiddenInput.appendTo(this.form);

        this.registerListeners();
    };

    Editor.prototype.registerListeners = function () {
        this.editor.keydown($.proxy(function() {
            if (this.editor.html() == this.options.placeholder) {
                this.editor.html(null);
                this.editor.css('color', '#000');
            }
        }, this));

        this.form.submit($.proxy(function () {
            this.hiddenInput.attr('value', this.getValue());
        }, this));
    };

    Editor.prototype.setPlaceholder = function(placeholder) {
        this.editor.html(placeholder);
        this.editor.css('color', '#888');
    };

    Editor.prototype.getValue = function() {
        return this.editor.html();
    }

    return Editor;

})();
