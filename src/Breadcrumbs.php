<?php


namespace floor12\Breadcrumbs;


class Breadcrumbs
{
    const HTML_OL = '<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="%s" id="%s">%s</ol>';
    const HTML_LI = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">%s</li>';
    const HTML_A = '<a data-pjax="0" itemprop="item" href="%s">%s</a>';
    const HTML_SPAN = '<span itemprop="name">%s</span>';
    const HTML_META_POSITION = '<meta itemprop="position" content="%d">';

    protected $cssClass = 'f12-breadcrumbs';
    protected $mainId = 'f12-breadcrumbs';
    protected $elements = [];

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function addElement(string $name, string $url = null): self
    {
        if ($url)
            $this->elements[$url] = $name;
        else
            array_push($this->elements, $name);
        return $this;
    }

    public function getHtml(): ?string
    {
        if (\count($this->elements) === 0) {
            return null;
        }
        $renderedElements = [];
        $position = 0;
        foreach ($this->elements as $url => $name) {
            $position++;
            $element = sprintf(self::HTML_SPAN, $name) . sprintf(self::HTML_META_POSITION, $position);
            if (!is_numeric($url)) {
                $element = sprintf(self::HTML_A, $url, $element);
            }
            $renderedElements[] = sprintf(self::HTML_LI, $element);
        }

        return sprintf(
            self::HTML_OL,
            $this->cssClass,
            $this->mainId,
            implode($renderedElements)
        );
    }

    public function setCssClass(string $cssClass): self
    {
        $this->cssClass = $cssClass;
        return $this;
    }

    public function setMainId(string $mainId): self
    {
        $this->mainId = $mainId;
        return $this;
    }

    public function getElements(): array
    {
        return $this->elements;
    }
}
