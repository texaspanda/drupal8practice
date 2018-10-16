<?php
namespace Drupal\myplugs\Services;

use Drupal\user\Entity\User;

/**
 * Class ActiveUsers
 *
 * @package Drupal\myplugs\Services
 */
class ActiveUsers
{
    /**
     * @return array
     * return array of names and uids of users who was active last 30 minutes
     */
    public function usersList()
    {
        $query = \Drupal::entityQuery('user')->execute();
        $users = \Drupal\user\Entity\User::loadMultiple($query);
        $activeUsers = [];

        foreach ($users as $user) {
            $currentTime = time();
            $accessTime = $user->getLastAccessedTime();
            if (($currentTime - $accessTime) <= 1800) {
                $uid = $user->get('uid')->value;
                $activeUsers["$uid"]['name'] = $user->getUsername();
                $activeUsers["$uid"]['uid'] = $user->get('uid')->value;
            }
        }
        return $activeUsers;
    }
}