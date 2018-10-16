<?php

namespace Drupal\myplugs\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'paragraph_formatter_widget_type' widget.
 *
 * @FieldWidget(
 *   id = "paragraph_formatter_widget_type",
 *   label = @Translation("Paragraph formatter widget type"),
 *   field_types = {
 *     "paragraph_formatter",
 *     "entity_reference"
 *   }
 * )
 */

class ParagraphFormatterWidgetType extends WidgetBase {

  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
//    $element += [
//      '#type' => 'fieldset',
//      //      '#element_validate' => [
//      //        [$this, 'validate'],
//      //      ],
//    ];
    $parts = [
      'image' => t('Image'),
      'text' => t('Text'),
    ];
    foreach ($parts as $key => $part) {
      if ($key == 'image') {
        $element[$key] = [
          '#type' => 'managed_file',
//          '#upload_location' => 'public://images/',
//          '#placeholder' => $part,
          '#title' => 'Image for ParagraphFormatter',
        ];
      }
      if ($key == 'text') {
        $element[$key] = [
          '#type' => 'textfield',
          '#size' => '1111',
//          '#placeholder' => $part,
          '#title' => 'Text for ParagraphFormatter',
        ];
      }
    }
    return $element;
  }
}

//  public function validate()
//}



///**
// * {@inheritdoc}
// */
//public static function defaultSettings() {
//  return [
//      'size' => 60,
//      'placeholder' => '',
//    ] + parent::defaultSettings();
//}
//
///**
// * {@inheritdoc}
// */
//public function settingsForm(array $form, FormStateInterface $form_state) {
//  $elements = [];
//
//  $elements['size'] = [
//    '#type' => 'number',
//    '#title' => t('Size of textfield'),
//    '#default_value' => $this->getSetting('size'),
//    '#required' => TRUE,
//    '#min' => 1,
//  ];
//  $elements['placeholder'] = [
//    '#type' => 'textfield',
//    '#title' => t('Placeholder'),
//    '#default_value' => $this->getSetting('placeholder'),
//    '#description' => t('Text that will be shown inside the field until a value is entered. This hint is usually a sample value or a brief description of the expected format.'),
//  ];
//
//  return $elements;
//}
//
///**
// * {@inheritdoc}
// */
//public function settingsSummary() {
//  $summary = [];
//
//  $summary[] = t('Textfield size: @size', ['@size' => $this->getSetting('size')]);
//  if (!empty($this->getSetting('placeholder'))) {
//    $summary[] = t('Placeholder: @placeholder', ['@placeholder' => $this->getSetting('placeholder')]);
//  }
//
//  return $summary;
//}