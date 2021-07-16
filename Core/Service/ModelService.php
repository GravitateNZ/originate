<?php

namespace MillenniumFalcon\Core\Service;

use MillenniumFalcon\Core\ORM\_Model;

class ModelService
{
    /**
     * DbService constructor.
     * @param \Doctrine\DBAL\Connection $connection
     */
    public function __construct(\Doctrine\DBAL\Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $className
     * @param $field
     * @param $value
     * @return mixed
     */
    public function getByField($className, $field, $value)
    {
        return $this->data($className, array(
            'whereSql' => "m.$field = ?",
            'params' => array($value),
            'oneOrNull' => 1,
        ));
    }

    /**
     * @param $className
     * @param $id
     * @return mixed
     */
    public function getById($className, $id)
    {
        return $this->getByField($className, 'id', $id);
    }

    /**
     * @param $className
     * @param $slug
     * @return mixed
     */
    public function getBySlug($className, $slug)
    {
        return $this->getByField($className, 'slug', $slug);
    }

    /**
     * @param $pdo
     * @param array $options
     * @return mixed
     */
    public function active($pdo, $options = array())
    {
        if (isset($options['whereSql'])) {
            $options['whereSql'] .= ($options['whereSql'] ? ' AND ' : '') . 'm.status = 1';
        } else {
            $options['whereSql'] = 'm.status = 1';
        }
        return $this->data($pdo, $options);
    }

    /**
     * @param $className
     * @param array $options
     * @return mixed
     */
    public function data($className, $options = array())
    {
        $pdo = $this->connection;
        $fullClassName = static::fullClass($pdo, $className);
        return $fullClassName::data($pdo, $options);
    }

    /**
     * @param $className
     * @return string
     */
    static public function fullClass($pdo, $className)
    {
        if ($className == '_Model') {
            return "\\MillenniumFalcon\\Core\\ORM\\_Model";
        }

        //temporary solution
        $appClass = "\\App\\ORM\\{$className}";
        $cmsClass = "\\MillenniumFalcon\\Core\\ORM\\{$className}";
        if (class_exists($appClass)) {
            return $appClass;
        } elseif (class_exists($cmsClass)) {
            return $cmsClass;
        }

//        throw new \Exception($className . ' can not be found');
    }
}