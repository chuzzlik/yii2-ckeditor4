<?php

namespace chuzzlik\ckeditor;

use yii\web\AssetBundle;


class CKEditorWidgetAsset extends AssetBundle
{
    public $sourcePath = '@vendor/chuzzlik/yii2-ckeditor4/src/assets/';

    public $depends = [
        'chuzzlik\ckeditor\CKEditorAsset'
    ];

    public $js = [
        'chuzzlik-ckeditor.widget.js'
    ];
}
