<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Curso Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $duracion
 * @property string $photo
 * @property string $photo_dir
 * @property int $plane_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Plane $plane
 * @property \App\Model\Entity\Anuncio[] $anuncios
 * @property \App\Model\Entity\Tallere[] $talleres
 * @property \App\Model\Entity\Pago[] $pagos
 */
class Curso extends Entity
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
        'nombre' => true,
        'descripcion' => true,
        'duracion' => true,
        'photo' => true,
        'photo_dir' => false,
        'plane_id' => true,
        'created' => true,
        'modified' => true,
        'plane' => true,
        'anuncios' => true,
        'talleres' => true,
        'pagos' => true
    ];
}
