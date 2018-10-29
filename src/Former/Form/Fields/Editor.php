<?php
namespace Former\Form\Fields;

use Former\Traits\Field;

/**
 * Textarea fields
 */
class Editor extends Field
{
    /**
     * The textarea's element
     *
     * @var string
     */
    protected $element = 'textarea';

    /**
     * The textarea's self-closing state
     *
     * @var boolean
     */

    protected $isSelfClosing = false;

    public function render()
    {
        $this->rel('editor');

        if (!defined('EDITOR_JS')) {
            echo \Html::script(asset('plugins/ckeditor/ckeditor.js'));
            define('EDITOR_JS', 1);
        }

        return parent::render();
    }
}