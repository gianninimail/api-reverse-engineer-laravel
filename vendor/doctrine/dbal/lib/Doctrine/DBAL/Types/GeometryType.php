<?php

namespace Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class for database column "geometry".
 *
 * @author Rauni Lillemets
 */
class GeometryType extends Type {
    
    const GEOMETRY = 'geometry';
    const SRID = 3301;
    
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        return 'geometry';
    }

    //Should create WKT object from WKT string. (or leave as WKT string)
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        return $value; //+
    }

    //Should create WKT string from WKT object. (or leave as WKT string)
    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
        return $value; //+
    }
    
    public function getName() {
        return self::GEOMETRY;
    }
    
    public function canRequireSQLConversion() {
        return true;
    }

    //Should give WKT
    public function convertToPHPValueSQL($sqlExpr, $platform) {
        return 'ST_AsText(\''.$sqlExpr.'\') '; //+
    }

    //Should create WKB
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform) {
        return 'ST_GeomFromText(\''.$sqlExpr.'\', '.self::SRID.')'; //+
    }
}