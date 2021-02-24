<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tallere Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $fecha
 * @property \Cake\I18n\FrozenTime $hora_inicio
 * @property \Cake\I18n\FrozenTime $hora_fin
 * @property string $descripcion
 * @property string $photo
 * @property string $photo_dir
 * @property string $nombre_expositor
 * @property int $cod_pago
 * @property int $curso_id
 *
 * @property \App\Model\Entity\Curso $curso
 */
class Tallere extends Entity
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
        'fecha' => true,
        'hora_inicio' => true,
        'hora_fin' => true,
        'descripcion' => true,
        'photo' => true,
        'photo_dir' => false,
        'nombre_expositor' => true,
        'cod_pago' => true,
        'curso_id' => true,
        'url' => true,
        'curso' => true
    ];
}
