<?php
namespace Former\Form\Fields;

use Former\Helpers;
use Former\Traits\Field;
use Illuminate\Container\Container;

class DateTimepicker extends Field
{
    protected $injectedProperties = array('type', 'name', 'value');

    public function __construct(Container $app, $type, $name, $label, $value, $attributes)
    {
        parent::__construct($app, 'text', $name, $label, $value, $attributes);

        if (is_array($this->value)) {
            $values = array();
            foreach ($this->value as $value) {
                $values[] = is_object($value) ? $value->__toString() : $value;
            }

            if (isset($values)) {
                $this->value = implode(', ', $values);
            }
        }
    }

    public function render()
    {
        $this->rel('datetimepicker');
        $this->style('width:150px');
        $this->maxlength(16);

        $input = parent::render();

        return $input;
    }
}