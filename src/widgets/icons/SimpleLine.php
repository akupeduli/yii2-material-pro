<?php

namespace akupeduli\material\widgets\icons;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class SimpleLine extends Core
{
    public function __construct($name, array $options = [])
    {
        $this->prefixCss = "icon-{$name}";
        parent::__construct(null, $options);
    }
}
