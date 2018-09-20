<?php

namespace Drupal\fresh_time\Services;



class WhatDay {

  public function isDayOff($date = 'today') {
//    dump($date);
    $config = \Drupal::config('fresh_time.settings');
    $timestamp = strtotime($date);
    $currentLanguage = \Drupal::languageManager()->getCurrentLanguage()->getName();
    $today = format_date($timestamp, $type='custom', $format='D', $timezone=\Drupal::currentUser()->getTimeZone(), $langcode='EN');
    if (strtotime($today)) {
      if ($currentLanguage == 'English') {
        if ((in_array($today, $config->get('ENG_WEEKEND'))) == TRUE) {
          $result = 'Stay home today, spend time with yo family!';
          $message = [
            '#markup' => $result,
          ];
        }
        else {
          $result = 'Hurry up! Today is working day!' . "<br>" . "<img src='https://www.wikihow.com/images/thumb/1/12/Work-Two-Part-Time-Jobs-Instead-of-One-Full-Time-Job-Step-3-Version-3.jpg/aid1654694-v4-728px-Work-Two-Part-Time-Jobs-Instead-of-One-Full-Time-Job-Step-3-Version-3.jpg'>";
          $message = [
            '#markup' => $result,
          ];
        }
      }

      else {

        if (in_array($today, $config->get('RU_WEEKEND')) == TRUE) {
          $result = 'Сегодня выходной :3' . "<br>" . "<img src='https://lantorg.com/files/pictures/blogs/Dlya_statey/11_1_hol2.jpg'>";
          $message = [
            '#markup' => $result,
          ];
        }
        else {
          $result = 'Поспеши! Сегодня рабочий день!' . "<br>" . "<img src='https://www.wikihow.com/images/thumb/1/12/Work-Two-Part-Time-Jobs-Instead-of-One-Full-Time-Job-Step-3-Version-3.jpg/aid1654694-v4-728px-Work-Two-Part-Time-Jobs-Instead-of-One-Full-Time-Job-Step-3-Version-3.jpg'>";
          $message = [
            '#markup' => $result,
          ];
        }
      }
    }
    else {
      $result = 'Wrong date format! Error logged in logger';
      $message = [
        '#markup'=> $result,
        ];
      \Drupal::logger('fresh_time')->error('Wrong date format');
    }
    return $message;
  }
}