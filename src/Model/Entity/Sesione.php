<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sesione Entity
 *
 * @property int $id
 * @property string $tema
 * @property string $descripcion
 * @property int $plane_id
 *
 * @property \App\Model\Entity\Plane $plane
 * @property \App\Model\Entity\Subsesione[] $subsesiones
 */
class Sesione extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tema' => true,
        'descripcion' => true,
        'plane_id' => true,
        'plane' => true,
        'subsesiones' => true
    ];
}
