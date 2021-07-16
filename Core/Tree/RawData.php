<?php

namespace MillenniumFalcon\Core\Tree;

class RawData
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $parent;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string|null
     */
    public $url;

    /**
     * @var int
     */
    public $rank;

    /**
     * @var int
     */
    public $status;

    /**
     * @var string|null
     */
    public $template;

    /**
     * @var string|null
     */
    public $icon;

    /**
     * @var int
     */
    public $allowExtra;

    /**
     * @var int
     */
    public $maxParams;

    /**
     * @var int
     */
    public $type;

    /**
     * @var string
     */
    public $redirectTo;

    /**
     * @var int
     */
    public $closed;

    /**
     * @var string
     */
    public $extraInfo;

    /**
     * @var string
     */
    public $extra1;

    /**
     * @var string
     */
    public $extra2;

    /**
     * RawData constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->id = $options['id'] ?? null;
        $this->parent = $options['parent'] ?? null;
        $this->title = $options['title'] ?? null;
        $this->url = $options['url'] ?? null;
        $this->rank = $options['rank'] ?? null;
        $this->status = $options['status'] ?? null;
        $this->template = $options['template'] ?? null;
        $this->icon = $options['icon'] ?? null;
        $this->allowExtra = $options['allowExtra'] ?? null;
        $this->maxParams = $options['maxParams'] ?? null;
        $this->type = $options['type'] ?? null;
        $this->redirectTo = $options['redirectTo'] ?? null;
        $this->closed = $options['closed'] ?? null;
        $this->extraInfo = $options['extraInfo'] ?? null;
        $this->extra1 = $options['extra1'] ?? null;
        $this->extra2 = $options['extra2'] ?? null;
    }
}