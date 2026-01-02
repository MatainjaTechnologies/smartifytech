<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormField extends Component
{
    /**
     * The field name.
     *
     * @var string
     */
    public string $name;

    /**
     * The field label.
     *
     * @var string
     */
    public string $label;

    /**
     * The field type.
     *
     * @var string
     */
    public string $type;

    /**
     * The field value.
     *
     * @var mixed
     */
    public $value;

    /**
     * Whether the field is required.
     *
     * @var bool
     */
    public bool $required;

    /**
     * The field placeholder.
     *
     * @var string|null
     */
    public ?string $placeholder;

    /**
     * The field options (for select/checkbox).
     *
     * @var array
     */
    public array $options;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $type
     * @param mixed $value
     * @param bool $required
     * @param string|null $placeholder
     * @param array $options
     */
    public function __construct(
        string $name,
        string $label,
        string $type = 'text',
        $value = null,
        bool $required = false,
        ?string $placeholder = null,
        array $options = []
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-field');
    }
}
