<?php
namespace Drupal\fresh_time\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class StatForm extends FormBase {

  public function getFormId() {
    return 'fresh_time_stat_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    if ($form_state->has('page_number') && $form_state->get('page_number') == 2){
      return $this->formPageTwo($form, $form_state);
    }

    $form_state->set('page_number', 1);

    $form['user_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#placeholder' => 'Enter your , please',
      '#required' => TRUE,
      '#default_value' => $form_state->getValue('user_name', 'Alex'),
    ];
      $form['user_name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Name'),
          '#placeholder' => 'Enter your name',
          '#required' => TRUE,
          '#default_value' => $form_state->getValue('user_name', 'Alex'),
      ];
      $form['user_name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Name'),
          '#placeholder' => 'Enter your name',
          '#required' => TRUE,
          '#default_value' => $form_state->getValue('user_name', 'Alex'),
      ];
    $form['profession'] = [
      '#type' => 'radios',
      '#title' => $this->t('Profession'),
      '#options' => [
        'student' => $this->t('student'),
        'doctor' => $this->t('doctor'),
        'developer' => $this->t('developer'),
        'president' => $this->t('president'),
      ],
      '#default_value' => $form_state->getValue('profession', 'student'),
    ];

    $form['experience'] = [
      '#type' => 'number',
      '#title' => $this->t('Experience'),
      '#default_value' => $form_state->getValue('experience', ''),
      '#states' => [
        'invisible' => [
          ':input[name="profession"]' => ['value' => 'student'],
        ],
      ],
    ];
    $form['date-birth'] = [
      '#type' => 'date',
      '#title' => $this->t('Your BD'),
      '#date_input_format' => 'd.m.Y',
      '#date_year_range' => '1900:2018',
      //      '#required' => TRUE,
    ];
    $form['age-wrapper'] = [
      '#type' => 'container',
      '#attributes' => ['id' => 'age-wrapper'],
    ];
    $form['age-wrapper']['age'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Age'),
      '#default_value' => $form_state->getValue('age', ''),
      '#ajax' => [
        'callback' => '::checkAge',
        'event' => 'change',
        'wrapper' => 'age-wrapper',
      ],
    ];
    $form['default'] = [
      '#type' => 'button',
      '#value' => $this->t('Default values'),
      '#attributes' => ['onclick' => 'this.form.reset(); return false;'],
    ];
    $form['reset'] = [
      '#type' => 'button',
      '#value' => $this->t('Reset'),
      '#attributes' => [
        'id' => 'reset',
      ],
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    $form['next'] = [
      '#type' => 'submit',
      '#value' => $this->t('Next step'),
      '#submit' => ['::nextStep'],
    ];
    $age = $form_state->getValue('age');
    if ($age < 18) {
      $form['age-wrapper']['age']['#description'] = $this->t('You are too young, mr(s)!');
    }
  return $form;
  }

  public function nextStep(array &$form, FormStateInterface $form_state){
    $form_state
      ->set('page_values', [
        'user_name' => $form_state->getValue('user_name'),
        'profession' => $form_state->getValue('profession'),
        'age' => $form_state->getValue('age'),
        'experience' => $form_state->getValue('experience'),
      ])
      ->set('page_number', 2)
      ->setRebuild(TRUE);
  }

  public function formPageTwo(array &$form, FormStateInterface $form_state){
    $form['file'] = [
      '#type' => 'file',
      '#title' => t('Choose a file'),
      '#title_display' => 'invisible',
    ];
    $form['phone'] = [
      '#type' => 'textfield',
      '#title' => 'Phone number',
      '#default_value' => '+380',
    ];
    $form['captcha'] = [
      '#type' => 'captcha',
      '#captcha_type' => 'recaptcha/reCAPTCHA'
    ];
    $form['back'] = [
      '#type' => 'submit',
      '#value' => $this->t('Back'),
      '#submit' => ['::previous'],
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }

  public function previous(array &$form, FormStateInterface $form_state){
    $form_state
      ->setValues($form_state->get('page_values'))
      ->set('page_number', 1)
      ->setRebuild(TRUE);
  }


  public function submitForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message( $key . ': ' . $value);
    }
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $data = $form_state->getValues();
    $adult = strtotime('+18 years', strtotime($data['date-birth']));
    $currentTimestamp = time();
    if($adult > $currentTimestamp) {
      $form_state->setErrorByName('date-birth', $this->t('U are too young, mommyboy!'));
    }
    if (isset($data['profession']) && $data['profession'] == 'president' && $data['experience'] > 4) {
      $form_state->setErrorByName('experience', $this->t('Вибачте, але ми живемо не в Росii'));
    }
  }

  public function checkAge(&$form, FormStateInterface $form_state) {
    return $form['age-wrapper'];
  }

}