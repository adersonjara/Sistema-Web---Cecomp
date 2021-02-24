<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anuncio Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $url
 * @property int $curso_id
 * @property string $photo
 * @property string $photo_dir
 *
 * @property \App\Model\Entity\Curso $curso
 */
class Anuncio extends Entity
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
        'url' => true,
        'curso_id' => true,
        'photo' => true,
        'photo_dir' => false,
        'created' => true,
        'modified' => true,
        'curso' => true
    ];
}
