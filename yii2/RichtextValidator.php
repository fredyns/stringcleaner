<?php

namespace fredyns\stringcleaner\yii2;

use yii\validators\Validator;
use yii\validators\ValidationAsset;
use fredyns\stringcleaner\StringCleaner;

/**
 * apply plain text filter in Yii2 Framework
 */
class RichtextValidator extends Validator
{

    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->{$attribute};

        if (is_string($value)) {
            $model->{$attribute} = StringCleaner::forRTF($value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        ValidationAsset::register($view);
        $options = $this->getClientOptions($model, $attribute);

        return 'value = yii.validation.trim($form, attribute, '.json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE).', value);';
    }

}
