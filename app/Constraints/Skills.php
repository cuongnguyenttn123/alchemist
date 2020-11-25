<?php


namespace App\Constraints;


class Skills
{
  protected static $skills = [
    [
      'name' => 'Attitude',
      'icon' => 'svg-icons/Rating/thumbs-up.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 0,
      'type' => 'seeker'
    ],
    [
      'name' => 'Timely Payment',
      'icon' => 'svg-icons/JobCard/star-icon.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 4260,
      'type' => 'seeker'
    ],
    [
      'name' => 'Communication',
      'icon' => 'svg-icons/Rating/chat.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 160,
      'type' => 'seeker'
    ],
    [
      'name' => 'Scope Management',
      'icon' => 'svg-icons/Rating/testing.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 5265,
      'type' => 'seeker'
    ],
    [
      'name' => 'Professionalism',
      'icon' => 'svg-icons/Rating/portfolio.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 750,
      'type' => 'seeker'
    ],
    [
      'name' => 'Recommended',
      'icon' => 'svg-icons/Rating/thumbs-up.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 750,
      'type' => 'alchemist'
    ],
    [
      'name' => 'Work Quality',
      'icon' => 'svg-icons/JobCard/star-icon.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 750,
      'type' => 'alchemist'
    ],
    [
      'name' => 'Communication',
      'icon' => 'svg-icons/Rating/chat.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 750,
      'type' => 'alchemist'
    ],
    [
      'name' => 'Organisation',
      'icon' => 'svg-icons/Rating/testing.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 750,
      'type' => 'alchemist'
    ],
    [
      'name' => 'Professionalism',
      'icon' => 'svg-icons/Rating/portfolio.svg',
      'rate' => 4.9,
      'unit' => 'SBP',
      'value' => 750,
      'type' => 'alchemist'
    ],
  ];

  public static function all()
  {
    return self::$skills;
  }

  public static function where($col, $value)
  {
    return array_filter(self::$skills, function ($skill) use ($col, $value) {
      return $skill[$col] == $value;
    });
  }
}
