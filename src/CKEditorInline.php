<?php

namespace chuzzlik\ckeditor;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;


class CKEditorInline extends Widget
{
    use CKEditorTrait;

    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var string
     */
    public $tag = 'div';
    /**
     * @var bool disables creating the inline editor automatically for elements with contenteditable attribute
     * set to the true. Defaults to true.
     */
    public $disableAutoInline = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        $this->options['contenteditable'] = 'true';

        parent::init();

        $this->initOptions();

        echo Html::beginTag($this->tag, $this->options);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::endTag($this->tag);

        $this->registerPlugin();
    }

    /**
     * Registers CKEditor plugin
     * @codeCoverageIgnore
     */
    protected function registerPlugin()
    {
        $js = [];

        $view = $this->getView();

        CKEditorAsset::register($view);

        $id = $this->options['id'];

        $options = $this->clientOptions !== false && !empty($this->clientOptions)
            ? Json::encode($this->clientOptions)
            : '{}';

        if ($this->disableAutoInline) {
            $js[] = "CKEDITOR.disableAutoInline = true;";
        }
        $js[] = "CKEDITOR.inline('$id', $options);";

        if (isset($this->clientOptions['filebrowserUploadUrl'])) {
            $js[] = "chuzzlik.ckEditorWidget.registerCsrfImageUploadHandler();";
        }

        $view->registerJs(implode("\n", $js));
    }
}
