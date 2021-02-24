<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cursos Model
 *
 * @property \App\Model\Table\PlanesTable|\Cake\ORM\Association\BelongsTo $Planes
 * @property \App\Model\Table\AnunciosTable|\Cake\ORM\Association\HasMany $Anuncios
 * @property \App\Model\Table\TalleresTable|\Cake\ORM\Association\HasMany $Talleres
 * @property \App\Model\Table\PagosTable|\Cake\ORM\Association\BelongsToMany $Pagos
 *
 * @method \App\Model\Entity\Curso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Curso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Curso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Curso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Curso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Curso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Curso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CursosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cursos');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Planes', [
            'foreignKey' => 'id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('Anuncios', [
            'foreignKey' => 'curso_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('Talleres', [
            'foreignKey' => 'curso_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('Pagos', [
            'foreignKey' => 'curso_id',
            'targetForeignKey' => 'pago_id',
            'joinTable' => 'cursos_pagos'
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'photo' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [   // Define the prefix of your thumbnail
                        'w' => 800, // Width
                        'h' => 400, // Height
                        'jpeg_quality'  => 100
                    ]
                ],
                'thumbnailMethod' => 'gd'   // Options are Imagick or Gd
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nombre')
            ->notEmpty('nombre', 'No se puede dejar vacio!')
            ->add('nombre', [
                'length' => [
                    'rule' => ['minLength', 3],
                    'message' => 'El nombre del curso debe tener al menos 3 caracteres!',
                ],
                'validFormat' => [
                    'rule' => ['custom','/^[0-9a-zA-Z áéíóúÁÉÍÓÚñÑ.]+$/'],
                    'message' => 'Por favor solo ingrese letras y numeros!'
                ],
                'unique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'Este curso ya ha sido creado']
            ]);

        $validator
            ->requirePresence('descripcion', 'create')
            ->allowEmpty('descripcion')
            ->add('descripcion', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'El descripcion del curso debe tener al menos 10 caracteres!',
                ],
            ]);

        $validator
            ->requirePresence('duracion', 'create')
            ->notEmpty('duracion','No se puede dejar vacio!')
            ->add('duracion', [
                
                'validFormat' => [
                    'rule' => ['custom','/^[0-9a-zA-Z ]+$/'],
                    'message' => 'Por favor solo ingrese letras y numeros!'
                ],
                'length' => [
                    'rule' => ['minLength', 5],
                    'message' => 'La duración tener al menos 5 caracteres!',
                ],
            ]);

        $validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules')
            // Set the thumbnail resize dimensions
            ->add('photo', 'proffer', [
                'rule' => ['dimensions', [
                    'min' => ['w' => 100, 'h' => 100],
                    'max' => ['w' => 1500, 'h' => 1500]
                ]],
                'message' => 'La imagen no tiene dimensiones correctas(Max 1500*1500 Min 100*100).',
                'provider' => 'proffer'
            ])
            ->add('photo','extension',[
                'rule' => ['extension',['jepg','png','jpg']],
                'message' => 'La imagen no tiene la extensión correcta'
            ])
            ->add('photo','fileSize',[
                'rule' => ['fileSize','<=','1MB'],
                'message' => 'La imagen no debe exceder 1MB'
            ])
            ->add('photo','mimeTye',[
                'rule' => ['mimeType',['image/jpeg','image/png']],
                'message' => 'La imagen no tiene formato correcto'
            ])

            ->allowEmpty('photo', 'update');

       $validator
            ->requirePresence('plane_id', 'create')
            ->notEmpty('plane_id','No se puede dejar vacio!');
        
  



        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['plane_id'],'Este plan esta asignado a otro curso, elije otro!'));

        return $rules;
    }
}
