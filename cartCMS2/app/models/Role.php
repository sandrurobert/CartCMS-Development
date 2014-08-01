<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

  protected $table = 'roles';

  /**
   * Find By Name
   * @param  [type] $query [description]
   * @param  [type] $name  [description]
   * @return [type]        [description]
   */
  public static function findByName($name)
  {
    return self::where('name', '=', $name)->first();
  }
}