<?php
namespace Themosis\Field\Fields;

use Themosis\Core\DataContainer;
use Themosis\View\ViewFactory;

abstract class FieldBuilder extends DataContainer
{
    /**
     * The field properties.
     *
     * @var array
     */
    protected $properties;

    /**
     * The type of the input handling the value.
     *
     * @var string
     */
    protected $type;

    /**
     * A view instance
     * @var ViewFactory
     */
    protected $view;

    /**
     * FieldBuilder instance
     *
     * @param array $properties Field instance properties.
     * @param ViewFactory $view
     */
    public function __construct(array $properties, ViewFactory $view)
    {
        $this->properties = $properties;
        $this->view = $view;
        $this->setId();
        $this->setClass();
        $this->setTitle();
    }

    /**
     * Method to override in the child class to define
     * its input type property.
     *
     * @return void
     */
    protected function fieldType()
    {
        $this->type = '';
    }

    /**
     * Set a default class attribute if not defined.
     *
     * @return void
     */
    protected function setClass()
    {
        $this['class'] = isset($this['class']) ? $this['class'] : 'field-'.$this['name'];
    }

    /**
     * Set a default ID attribute if not defined.
     *
     * @return void
     */
    protected function setId()
    {
        $this['id'] = isset($this['id']) ? $this['id'] : $this['name'].'-id';
    }

    /**
     * Set a default label title, display text if not defined.
     *
     * @return void
     */
    protected function setTitle()
    {
        $this['title'] = isset($this['title']) ? ucfirst($this['title']) : ucfirst($this['name']);
    }

    /**
     * Method that return the field input type.
     *
     * @return string
     */
    public function getFieldType()
    {
        return $this->type;
    }

} 