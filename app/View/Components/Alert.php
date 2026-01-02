<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public string $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public string $message;

    /**
     * Whether the alert is dismissible.
     *
     * @var bool
     */
    public bool $dismissible;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $message
     * @param bool $dismissible
     */
    public function __construct(string $type = 'success', string $message = '', bool $dismissible = true)
    {
        $this->type = $type;
        $this->message = $message;
        $this->dismissible = $dismissible;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
