<?php

namespace Pug\Filter;

use NodejsPhpFallback\Less as LessWrapper;

class Less extends AbstractFilter
{
    protected $tag = 'style';
    protected $textType = 'css';

    public function replaceVariable($matches)
    {
        return '~"' . addcslashes($matches[0], '"') . '"';
    }

    public function parse($code)
    {
        $code = preg_replace('/#\{\$?(.*?)\}/', '<?php echo $$1; ?>', $code);
        $code = preg_replace_callback(
            '/<\?php.*\?>/',
            array($this, 'replaceVariable'),
            $code
        );

        return new LessWrapper($code);
    }
}
